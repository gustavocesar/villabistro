<?php

App::uses('AppController', 'Controller');

/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 */
class PaymentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Payments'));
        
        $this->Security->unlockedActions = [
            'add',
            'edit',
            'delete',
            'list_orders'
        ];
    }

    public function beforeRender() {
        parent::beforeRender();
        $this->layout = 'modal';
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Payment->recursive = 0;
        $this->set('payments', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Payment->exists($id)) {
            throw new NotFoundException(__('Invalid payment'));
        }
        $options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
        $this->set('payment', $this->Payment->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($tableId = null, $stringOrders = null) {

        if (!$this->Payment->Table->exists($tableId)) {
            throw new NotFoundException(__('Invalid table'));
        }

        $arrOrderId = array_filter(explode(';', $stringOrders));

        $this->Payment->Order->recursive = 0;
        $orders = $this->Payment->Order->find('all', [
            'conditions' => ["{$this->Payment->Order->alias}.id" => $arrOrderId]
        ]);

        $this->Payment->Table->recursive = -1;
        $table = $this->Payment->Table->findById($tableId);

        $this->layout = 'modal';

        if ($this->request->is('post')) {
            $this->autoRender = false;

            $this->Payment->create();

            $newPayment = $this->Payment->save($this->request->data);

            if ($newPayment) {

                foreach ($orders as $order) {
                    $this->Payment->Order->id = $order['Order']['id'];
                    $this->Payment->Order->saveField('payment_id', $newPayment['Payment']['id']);
                    $this->Payment->Order->saveField('status_order_id', 2);
                }

                $this->Payment->Bill->id = $newPayment['Payment']['bill_id'];
                $this->Payment->Bill->close();

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The payment has been saved.')
                ]));
            } else {

                if (!$this->Payment->error) {
                    $this->Payment->error = __('The payment could not be saved. Please, try again.');
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->Payment->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {
            $this->set('table', $table);
            $this->set('stringOrders', $stringOrders);

            $this->set('orders', $orders);
            $this->set('paymentMethods', $this->Payment->PaymentMethod->find('list', [
                'conditions' => [
                    "{$this->Payment->PaymentMethod->alias}.status_payment_method_id" => 1
                ],
                'order' => [
                    "{$this->Payment->PaymentMethod->alias}.sequence" => "ASC"
                ]
            ]));
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Payment->exists($id)) {
            throw new NotFoundException(__('Invalid payment'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Payment->save($this->request->data)) {
                $this->Flash->success(__('The payment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The payment could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
            $this->request->data = $this->Payment->find('first', $options);
        }
        $tables = $this->Payment->Table->find('list');
        $this->set(compact('tables'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Payment->id = $id;
        if (!$this->Payment->exists()) {
            throw new NotFoundException(__('Invalid payment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Payment->delete()) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function list_orders($tableId = null) {
        if (!$this->Payment->Table->exists($tableId)) {
            throw new NotFoundException(__('Invalid table'));
        }

        $this->Payment->Table->id = $tableId;
        $this->Payment->Table->recursive = -1;
        $table = $this->Payment->Table->findById($tableId);

        $bill = $this->Payment->Table->getCurrentBill();
        $billId = isset($bill['Bill']) ? $bill['Bill']['id'] : null;

        $this->set('table', $table);

        $this->Payment->Order->recursive = 0;
        $this->set('pendingOrders', $this->Payment->Order->getOrdersByPaymentStatus($tableId, $billId, [1]));
        $this->set('completedOrders', $this->Payment->Order->getOrdersByPaymentStatus($tableId, $billId, [2]));
        
        if ($billId) {
            $payments = $this->Payment->getPaymentsByTable($tableId, $billId);
        } else {
            $payments = [];
        }
        $this->set('payments', $payments);
    }

}
