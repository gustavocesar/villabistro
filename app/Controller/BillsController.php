<?php

App::uses('AppController', 'Controller');

/**
 * Bills Controller
 *
 * @property Bill $Bill
 * @property PaginatorComponent $Paginator
 */
class BillsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Bills'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Bill->recursive = 0;
        $this->set('bills', $this->Paginator->paginate());
    }
    
    public function history($tableId = null) {
        $this->set('activeTables', 'active');
        
        if (!$this->Bill->Table->exists($tableId)) {
            throw new NotFoundException(__('Invalid table'));
        }
        
        $this->Bill->Table->recursive = 0;
        $this->Bill->Table->id = $tableId;
        $table = $this->Bill->Table->find('first', [
            'conditions' => ['id' => $tableId],
        ]);
        
        if ($table['Table']['balcony'] == 'Sim') {
            $title = $table['Table']['name'];
        } else {
            $title = __('Table') . ' ' . $table['Table']['name'];
        }

        $this->set('title', __('History') . " - " . $title);
        
        $this->Paginator->settings = array(
            'conditions' => [
                "{$this->Bill->Table->alias}.id" => $tableId
            ],
            'order' => ["{$this->Bill->alias}.id" => 'DESC']
        );
        
        $this->Bill->recursive = 0;
        $this->set('bills', $this->Paginator->paginate());
        $this->set('table', $table);
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Tables Board'),
                'link' => [
                    'controller' => 'tables',
                    'action' => 'tables_board',
                    'params' => []
                ]
            ],
            1 => [
                'label' => $title,
                'link' => [
                    'controller' => 'tables',
                    'action' => 'table_details',
                    'params' => [$tableId]
                ]
            ],
            2 => [
                'label' => __('History'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Bill->exists($id)) {
            throw new NotFoundException(__('Invalid bill'));
        }
        $this->Bill->recursive = 2;
        $options = array('conditions' => array('Bill.' . $this->Bill->primaryKey => $id));
        $this->set('bill', $this->Bill->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Bill->create();
            if ($this->Bill->save($this->request->data)) {
                $this->Flash->success(__('The bill has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The bill could not be saved. Please, try again.'));
            }
        }
        $statusBills = $this->Bill->StatusBill->find('list');
        $tables = $this->Bill->Table->find('list');
        $this->set(compact('statusBills', 'tables'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Bill->exists($id)) {
            throw new NotFoundException(__('Invalid bill'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Bill->save($this->request->data)) {
                $this->Flash->success(__('The bill has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The bill could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Bill.' . $this->Bill->primaryKey => $id));
            $this->request->data = $this->Bill->find('first', $options);
        }
        $statusBills = $this->Bill->StatusBill->find('list');
        $tables = $this->Bill->Table->find('list');
        $this->set(compact('statusBills', 'tables'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Bill->id = $id;
        if (!$this->Bill->exists()) {
            throw new NotFoundException(__('Invalid bill'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Bill->delete()) {
            $this->Flash->success(__('The bill has been deleted.'));
        } else {
            $this->Flash->error(__('The bill could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function print_bill($billId = null) {
        if (!$this->Bill->exists($billId)) {
            throw new NotFoundException(__('Invalid bill'));
        }

        $this->layout = 'pdf';

        $this->Bill->recursive = 0;
        $bill = $this->Bill->find('first', [
            'conditions' => ["{$this->Bill->alias}.id" => $billId],
        ]);

        $this->set('bill', $bill);

        $group = [
            'Order.product_id',
            'Order.status_order_id'
        ];

        $this->Bill->Payment->Order->recursive = 0;
        $this->set('pendingOrders', $this->Bill->Payment->Order->getOrdersByPaymentStatus(null, $billId, [1], $group));
        $this->set('completedOrders', $this->Bill->Payment->Order->getOrdersByPaymentStatus(null, $billId, [2], $group));
        $this->set('payments', $this->Bill->Payment->getPaymentsByTable(null, $billId));
    }

}
