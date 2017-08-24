<?php

App::uses('AppController', 'Controller');

/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Orders'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Paginator->settings = [
            'order' => "{$this->Order->alias}.id desc"
        ];

        $this->Order->recursive = 0;
        $this->set('orders', $this->Paginator->paginate());

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Orders'),
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
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->Order->recursive = 2;
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('order', $this->Order->find('first', $options));

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Orders'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'index',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('View'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array('post', 'put'))) {

            /**
             * para liberar a edição, é preciso
             *  - fazer validações quanto a situação do pedido
             *  - checar quais campos devem permanecer na tela de edição
             *  - alterar o estoque do produto e dos componentes (recursivamente)
             */
            $this->Flash->error("O recurso de edição de pedidos está em desenvolvimento!");
            return $this->redirect(array('action' => 'orders_board'));

            if ($this->Order->save($this->request->data)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(array('action' => 'orders_board'));
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);
        }
        $users = $this->Order->User->find('list');
        $products = $this->Order->Product->find('list');
        $stages = $this->Order->Stage->find('list');
        $bills = $this->Order->Bill->find('list');
        $statusOrders = $this->Order->StatusOrder->find('list');
        $this->set(compact('users', 'products', 'stages', 'bills', 'statusOrders'));

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Orders'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'index',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Edit'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function cancel($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }

        $this->request->allowMethod('post', 'delete');
        if ($this->Order->cancel()) {
            $this->Flash->success(__('The order has been canceled.'));
        } else {

            if ($this->Order->error) {
                $this->Flash->error($this->Order->error);
            } else {
                $this->Flash->error(__('The order could not be canceled. Please, try again.'));
            }
        }

        return $this->redirect($this->referer());
    }

    public function orders_board() {

        $title = __('Orders Board');
        $this->set('title', $title);
        $this->set('activeOrdersBoard', 'active');

        $startDate = date("d/m/Y", strtotime("yesterday"));
        $endDate = date('d/m/Y');

        $this->set('pendingOrders', $this->Order->getOrdersByPaymentStatus(null, null, [1], $startDate, $endDate));
        $this->set('completedOrders', $this->Order->getOrdersByPaymentStatus(null, null, [2], $startDate, $endDate));
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => $title,
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    public function add_order() {
        $title = __('Add Order');
        $this->set('title', $title);
        $this->set('activeOrdersBoard', 'active');

        if ($this->request->is('post')) {

            if (!isset($this->request['data'])) {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }

            if (!isset($this->request['data']['table_id']) || $this->request['data']['table_id'] == "") {
                return $this->Flash->error(__('Invalid table'));
            }

            $table_id = $this->request['data']['table_id'];

            foreach ($this->request['data']['products'] as $subcategoryId => $arrProducts) {
                foreach ($arrProducts as $productId => $quantity) {
                    if ($quantity <= 0) {
                        continue;
                    }

                    $this->Order->Product->Subcategory->recursive = -1;
                    $subcategory = $this->Order->Product->Subcategory->findById($subcategoryId);

                    $this->Order->Product->Subcategory->Stage->recursive = -1;
                    $stage = $this->Order->Product->Subcategory->Stage->findById($subcategory['Subcategory']['stage_id']);

                    $usuarioLogado = CakeSession::read("Auth");

                    $this->Order->Table->id = $table_id;
                    $bill = $this->Order->Table->getCurrentBill();
                    if (empty($bill)) {
                        $bill = $this->Order->Table->createBill();
                    }

                    $data = ['Order' => [
                            'user_id' => $usuarioLogado['User']['id'],
                            'product_id' => $productId,
                            'quantity' => $quantity,
                            'table_id' => $table_id,
                            'bill_id' => $bill['Bill']['id'],
                            'status_order_id' => '1',
                            'stage_id' => $stage['Stage']['id'],
                            'observation' => ''
                    ]];

                    $this->Order->create();
                    $newOrder = $this->Order->save($data);

                    //different of Canceled
                    if ($stage['Stage']['id'] != 5) {
                        $this->Order->id = $newOrder['Order']['id'];
                        $this->Order->finishItems();
                    }
                }
            }

            $this->Flash->success(__('Done!'));
            return $this->redirect(['controller' => 'orders', 'action' => 'orders_board']);
        } else {

            $arrAllTables = $this->Order->Bill->Table->getAllTables();

            $arrFullMenu = $this->Order->Product->Subcategory->Category->getMenuAvaliableToOrder();

            $this->set('arrAllTables', array_chunk($arrAllTables, 4));
            $this->set('arrFullMenu', $arrFullMenu);

            $this->set('arrayBreadCrumb', [
                0 => [
                    'label' => __('Orders'),
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => 'orders_board',
                        'params' => []
                    ]
                ],
                1 => [
                    'label' => $title,
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => $this->params['action'],
                        'params' => []
                    ]
                ]
            ]);
        }
    }

    public function kitchen_orders() {
        $title = __('Kitchen Orders');
        $this->set('title', $title);
        $this->set('activeKitchen', 'active');

        $arrStages = $this->Order->Stage->getKitchenStages();
        $this->set('arrKitchenStages', $arrStages);

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Orders'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'orders_board',
                    'params' => []
                ]
            ],
            1 => [
                'label' => $title,
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    public function getOrdersByStage($stageId = null) {
        $this->autoRender = false;
        $this->Order->Stage->id = $stageId;
        return $this->Order->Stage->getOrders();
    }

    public function update_sequence() {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {

            try {
                $message = 'Pedido alterado com sucesso!';
                $class = 'alert-success';
                $icon = 'fa-check-circle';

                $arrStageOrders = $this->request->data['orders'];

                foreach ($arrStageOrders as $stageId => $arrOrders) {

                    $i = 1;
                    foreach ($arrOrders as $orderId => $newStage) {
                        $this->Order->id = $orderId;
                        $this->Order->saveField('kitchen_order', $i);
                        $this->Order->saveField('stage_id', $newStage);
                        $this->Order->saveField('modified', date('Y-m-d H:i:s'));
                        $i++;
                    }
                }
            } catch (Exception $exc) {
                $message = $exc->getMessage();
                $class = 'alert-danger';
                $icon = 'fa-exclamation-triangle';
            }

            $this->set('message', $message);
            $this->set('class', $class);
            $this->set('icon', $icon);

            $this->render('ajax/update-sequence-ajax-response', 'ajax');
        }
    }

    public function order_wizard($tableId = null) {
        $title = __('Order Wizard');
        $this->set('title', $title);
        $this->set('activeOrdersBoard', 'active');

        if ($this->request->is('post')) {
            if (!isset($this->request['data'])) {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }

            if (!isset($this->request['data']['table_id']) || $this->request['data']['table_id'] == "") {
                return $this->Flash->error(__('Invalid table'));
            }

            $table_id = $this->request['data']['table_id'];

            foreach ($this->request['data']['products'] as $subcategoryId => $arrProducts) {
                foreach ($arrProducts as $productId => $quantity) {
                    if ($quantity <= 0) {
                        continue;
                    }

                    for ($i = 1; $i <= $quantity; $i++) {

                        $this->Order->Product->Subcategory->recursive = -1;
                        $subcategory = $this->Order->Product->Subcategory->findById($subcategoryId);

                        $this->Order->Product->Subcategory->Stage->recursive = -1;
                        $stage = $this->Order->Product->Subcategory->Stage->findById($subcategory['Subcategory']['stage_id']);

                        $usuarioLogado = CakeSession::read("Auth");

                        $this->Order->Table->id = $table_id;
                        $bill = $this->Order->Table->getCurrentBill();
                        if (empty($bill)) {
                            $bill = $this->Order->Table->createBill();
                        }

                        $data = ['Order' => [
                                'user_id' => $usuarioLogado['User']['id'],
                                'product_id' => $productId,
                                'quantity' => 1,
                                'table_id' => $table_id,
                                'bill_id' => $bill['Bill']['id'],
                                'stage_id' => '4',
                                'stage_id' => $stage['Stage']['id'],
                                'status_order_id' => '1',
                                'observation' => ''
                        ]];

                        $this->Order->create();
                        $newOrder = $this->Order->save($data);

                        //different of Canceled
                        if ($stage['Stage']['id'] != 5) {
                            $this->Order->id = $newOrder['Order']['id'];
                            $this->Order->finishItems();
                        }
                    }
                }
            }

            $this->Flash->success(__('OK! The Order has been done'));

            if (isset($this->request['data']['table_selected_id']) && $this->request['data']['table_selected_id'] != "") {
                return $this->redirect(['controller' => 'tables', 'action' => 'table_details', $this->request['data']['table_selected_id']]);
            } else {
                return $this->redirect(['controller' => 'orders', 'action' => 'orders_board']);
            }
        } else {
            $arrAllTables = $this->Order->Bill->Table->getAllTables();
            $arrFullMenu = $this->Order->Product->Subcategory->Category->getMenuAvaliableToOrder();
            $this->set('arrAllTables', array_chunk($arrAllTables, 4));
            $this->set('arrFullMenu', $arrFullMenu);

            if ($tableId && !$this->Order->Table->exists($tableId)) {
                throw new NotFoundException(__('Invalid table'));
            }
            $this->Order->Table->recursive = -1;
            $this->set('tableSelected', $this->Order->Table->findById($tableId));

            $this->set('arrayBreadCrumb', [
                0 => [
                    'label' => $title,
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => $this->params['action'],
                        'params' => []
                    ]
                ]
            ]);
        }
    }

}
