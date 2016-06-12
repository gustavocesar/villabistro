<?php

App::uses('AppController', 'Controller');

/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Categories'));
        $this->set('activeConfigurations', 'active');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Category->recursive = 0;
        $this->set('categories', $this->Paginator->paginate());

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
                'label' => __('Categories'),
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
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->Category->recursive = 2;
        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
        $this->set('category', $this->Category->find('first', $options));

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
                'label' => __('Categories'),
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
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        } else {
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
                    'label' => __('Categories'),
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
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);

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
                    'label' => __('Categories'),
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
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Category->delete()) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
