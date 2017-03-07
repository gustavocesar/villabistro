<?php

App::uses('AppController', 'Controller');

/**
 * Subcategories Controller
 *
 * @property Subcategory $Subcategory
 * @property PaginatorComponent $Paginator
 */
class SubcategoriesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Subcategories'));
        $this->set('activeConfigurations', 'active');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Subcategory->recursive = 0;
        $this->set('subcategories', $this->Subcategory->find('all', [
            'order' => "{$this->Subcategory->alias}.id asc"
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
                'label' => __('Subcategories'),
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
        if (!$this->Subcategory->exists($id)) {
            throw new NotFoundException(__('Invalid subcategory'));
        }
        $this->Subcategory->recursive = 2;
        $options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
        $this->set('subcategory', $this->Subcategory->find('first', $options));

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
                'label' => __('Subcategories'),
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
            $this->Subcategory->create();
            if ($this->Subcategory->save($this->request->data)) {
                $this->Flash->success(__('The subcategory has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Subcategory->Category->find('list');
        $stages = $this->Subcategory->Stage->find('list');
        $this->set(compact('categories', 'stages'));

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
                'label' => __('Subcategories'),
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
        if (!$this->Subcategory->exists($id)) {
            throw new NotFoundException(__('Invalid subcategory'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Subcategory->save($this->request->data)) {
                $this->Flash->success(__('The subcategory has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
            $this->request->data = $this->Subcategory->find('first', $options);
        }
        $categories = $this->Subcategory->Category->find('list');
        $stages = $this->Subcategory->Stage->find('list');
        $this->set(compact('categories', 'stages'));

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
                'label' => __('Subcategories'),
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

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Subcategory->id = $id;
        if (!$this->Subcategory->exists()) {
            throw new NotFoundException(__('Invalid subcategory'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Subcategory->delete()) {
            $this->Flash->success(__('The subcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The subcategory could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
