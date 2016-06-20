<?php

App::uses('AppController', 'Controller');

/**
 * Suppliers Controller
 *
 * @property Supplier $Supplier
 * @property PaginatorComponent $Paginator
 */
class SuppliersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Suppliers'));
        $this->set('activeConfigurations', 'active');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Paginator->settings = [
            'order' => "{$this->Supplier->alias}.id asc"
        ];

        $this->Supplier->recursive = 0;
        $this->set('suppliers', $this->Paginator->paginate());

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
                'label' => __('Suppliers'),
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
        if (!$this->Supplier->exists($id)) {
            throw new NotFoundException(__('Invalid supplier'));
        }
        $this->Supplier->recursive = 2;
        $options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
        $this->set('supplier', $this->Supplier->find('first', $options));

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
                'label' => __('Suppliers'),
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
            $this->Supplier->create();
            if ($this->Supplier->save($this->request->data)) {
                $this->Flash->success(__('The supplier has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
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
                'label' => __('Suppliers'),
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
        if (!$this->Supplier->exists($id)) {
            throw new NotFoundException(__('Invalid supplier'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Supplier->save($this->request->data)) {
                $this->Flash->success(__('The supplier has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
            $this->request->data = $this->Supplier->find('first', $options);

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
                    'label' => __('Suppliers'),
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
        $this->Supplier->id = $id;
        if (!$this->Supplier->exists()) {
            throw new NotFoundException(__('Invalid supplier'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Supplier->delete()) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
