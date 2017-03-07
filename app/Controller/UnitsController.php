<?php

App::uses('AppController', 'Controller');

/**
 * Units Controller
 *
 * @property Unit $Unit
 * @property PaginatorComponent $Paginator
 */
class UnitsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Units'));
        $this->set('activeConfigurations', 'active');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Unit->recursive = 0;
        $this->set('units', $this->Unit->find('all', [
            'order' => "{$this->Unit->alias}.id asc"
        ]));

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
                'label' => __('Units'),
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
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->Unit->recursive = 2;
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $this->set('unit', $this->Unit->find('first', $options));

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
                'label' => __('Units'),
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
            $this->Unit->create();
            if ($this->Unit->save($this->request->data)) {
                $this->Flash->success(__('The unit has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The unit could not be saved. Please, try again.'));
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
                'label' => __('Units'),
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
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Unit->save($this->request->data)) {
                $this->Flash->success(__('The unit has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The unit could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
            $this->request->data = $this->Unit->find('first', $options);

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
                    'label' => __('Units'),
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
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Unit->delete()) {
            $this->Flash->success(__('The unit has been deleted.'));
        } else {
            $this->Flash->error(__('The unit could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
