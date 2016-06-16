<?php

App::uses('AppController', 'Controller');

/**
 * Tables Controller
 *
 * @property Table $Table
 * @property PaginatorComponent $Paginator
 */
class TablesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Tables'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Table->recursive = 0;
        $this->set('tables', $this->Paginator->paginate());

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Tables'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
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
        if (!$this->Table->exists($id)) {
            throw new NotFoundException(__('Invalid table'));
        }
        $this->Table->recursive = 2;
        $options = array('conditions' => array('Table.' . $this->Table->primaryKey => $id));
        $this->set('table', $this->Table->find('first', $options));

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Tables'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
                    'params' => []
                ]
            ],
            2 => [
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
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Table->create();
            if ($this->Table->save($this->request->data)) {
                $this->Flash->success(__('The table has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The table could not be saved. Please, try again.'));
            }
        }

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Tables'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
                    'params' => []
                ]
            ],
            2 => [
                'label' => __('Add'),
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
        if (!$this->Table->exists($id)) {
            throw new NotFoundException(__('Invalid table'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Table->save($this->request->data)) {
                $this->Flash->success(__('The table has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The table could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Table.' . $this->Table->primaryKey => $id));
            $this->request->data = $this->Table->find('first', $options);

            $this->set('arrayBreadCrumb', [
                0 => [
                    'label' => __('Configurations'),
                    'link' => [
                        'controller' => 'configurations',
                        'action' => '/',
                        'params' => []
                    ]
                ],
                1 => [
                    'label' => __('Tables'),
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => '/',
                        'params' => []
                    ]
                ],
                2 => [
                    'label' => __('Edit'),
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => $this->params['action'],
                        'params' => []
                    ]
                ]
            ]);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Table->id = $id;
        if (!$this->Table->exists()) {
            throw new NotFoundException(__('Invalid table'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Table->delete()) {
            $this->Flash->success(__('The table has been deleted.'));
        } else {
            $this->Flash->error(__('The table could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function tables_board() {
        $title = __('Tables Board');
        $this->set('title', $title);
        $this->set('activeTables', 'active');

        $arrAllTables = $this->Table->getAllTables();
        $this->set('arrAllTables', array_chunk($arrAllTables, 4));

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

    public function table_details($id) {
        $this->set('activeTables', 'active');

        $this->Table->id = $id;
        $table = $this->Table->find('first', [
            'conditions' => ['id' => $id],
        ]);

        if (empty($table)) {
            throw new NotFoundException(__('Invalid table'));
        }

        if ($table['Table']['balcony'] == 'Sim') {
            $title = $table['Table']['name'];
        } else {
            $title = __('Table') . ' ' . $table['Table']['name'];
        }
        $this->set('title', $title);

        $this->set('table', $table);
        $this->Table->Order->recursive = 0;
        $this->set('ordersByTable', $this->Table->Order->getOrdersByPaymentStatus($id));

        $this->Table->id = $id;
        $bill = $this->Table->getCurrentBill();
        $this->set('currentBill', $bill);

        $payments = [];
        if (isset($bill['Bill']['id'])) {
            $this->Table->Bill->Payment->recursive = 0;
            $payments = $this->Table->Bill->Payment->find('all', [
                'conditions' => [
                    "{$this->Table->Bill->Payment->alias}.bill_id" => $bill['Bill']['id']
                ]
            ]);
        }
        $this->set('payments', $payments);

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Tables Board'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'tables_board',
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

    public function history($id) {
        $this->set('activeTables', 'active');

        $this->Table->id = $id;
        $table = $this->Table->find('first', [
            'conditions' => ['id' => $id],
        ]);

        if (empty($table)) {
            throw new NotFoundException(__('Invalid table'));
        }

        if ($table['Table']['balcony'] == 'Sim') {
            $title = $table['Table']['name'];
        } else {
            $title = __('Table') . ' ' . $table['Table']['name'];
        }
        
        $this->set('title', __('History')." - ".$title);

        $this->set('table', $table);

        $this->Table->id = $id;
        $this->set('items', $this->Table->getHistory());
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Tables Board'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'tables_board',
                    'params' => []
                ]
            ],
            1 => [
                'label' => $title,
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'table_details',
                    'params' => [$id]
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

    public function close_table($id) {
        $this->set('activeTables', 'active');

        $this->Table->recursive = 1;
        $table = $this->Table->findById($id);

        if (empty($table)) {
            throw new NotFoundException(__('Invalid table'));
        }

        if ($table['Table']['balcony'] == 'Sim') {
            $title = $table['Table']['name'];
        } else {
            $title = __('Table') . ' ' . $table['Table']['name'];
        }
        $this->set('title', $title);

        $this->set('table', $table);

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Tables Board'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'tables_board',
                    'params' => []
                ]
            ],
            1 => [
                'label' => $title,
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'table_details',
                    'params' => [$id]
                ]
            ],
            2 => [
                'label' => __('Close'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    public function change_table($id) {
        $this->layout = 'modal';

        $this->Table->recursive = 1;
        $table = $this->Table->findById($id);

        if (empty($table)) {
            throw new NotFoundException(__('Invalid table'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->autoRender = false;

            $origin  = $this->request->data['Table']['id'];
            $destiny = $this->request->data['Table']['table_id'];

            try {
                $this->Table->id = $origin;
                $openBills = $this->Table->getBills(Configure::read('Status.pendent'));
                foreach ($openBills as $bill) {
                    
                    //changes the table
                    $this->Table->Bill->id = $bill['Bill']['id'];
                    if ($this->Table->Bill->exists()) {
                        $this->Table->Bill->saveField('table_id', $destiny);
                    }
                    
                    //changes the orders to the new table
                    $this->Table->Order->recursive = 0;
                    $orders = $this->Table->Order->find('all', [
                        'conditions' => ["{$this->Table->Order->alias}.bill_id" => $bill['Bill']['id']],
                    ]);
                    foreach ($orders as $order) {
                        $this->Table->Order->id = $order['Order']['id'];
                        if ($this->Table->Order->exists()) {
                            $this->Table->Order->saveField('table_id', $destiny);
                        }
                    }
                    
                    //changes the payments to the new table
                    $this->Table->Bill->Payment->recursive = 0;
                    $payments = $this->Table->Order->Payment->find('all', [
                        'conditions' => ["{$this->Table->Order->Payment->alias}.bill_id" => $bill['Bill']['id']],
                    ]);
                    foreach ($payments as $payment) {
                        $this->Table->Order->Payment->id = $payment['Payment']['id'];
                        if ($this->Table->Order->Payment->exists()) {
                            $this->Table->Order->Payment->saveField('table_id', $destiny);
                        }
                    }

                }

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The Table has been changed')
                ]));
                
            } catch (Exception $ex) {
                if (!$this->Table->Bill->error) {
                    $this->Table->Bill->error = __('Error changing Table').": " . $ex->getMessage();
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->Table->Bill->error
                ]));
            }

        } else {
            if ($table['Table']['balcony'] == 'Sim') {
                $title = $table['Table']['name'];
            } else {
                $title = __('Table') . ' ' . $table['Table']['name'];
            }
            $this->set('title', $title);
            
            $this->set('table', $table);

            $this->Table->displayField = 'name';
            $tables = $this->Table->find('list', []);
            $this->set('tables', $tables);
        }
    }

    public function getBills($tableId, $statusBillId = null) {
        $this->autoRender = false;

        if (!$this->Table->exists($tableId)) {
            throw new NotFoundException(__('Invalid table'));
        }

        $this->Table->id = $tableId;
        return $this->Table->getBills($statusBillId);
    }

}
