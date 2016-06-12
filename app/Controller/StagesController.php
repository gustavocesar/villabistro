<?php

App::uses('AppController', 'Controller');

/**
 * Stages Controller
 *
 * @property Stage $Stage
 * @property PaginatorComponent $Paginator
 */
class StagesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Stages'));
        $this->set('activeConfigurations', 'active');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Stage->recursive = 0;
        $this->set('stages', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }
        $this->Stage->recursive = 2;
        $options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
        $this->set('stage', $this->Stage->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Stage->create();
            if ($this->Stage->save($this->request->data)) {
                $this->Flash->success(__('The stage has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The stage could not be saved. Please, try again.'));
            }
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
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException(__('Invalid stage'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Stage->save($this->request->data)) {
                $this->Flash->success(__('The stage has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The stage could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
            $this->request->data = $this->Stage->find('first', $options);
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
        $this->Stage->id = $id;
        if (!$this->Stage->exists()) {
            throw new NotFoundException(__('Invalid stage'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Stage->delete()) {
            $this->Flash->success(__('The stage has been deleted.'));
        } else {
            $this->Flash->error(__('The stage could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
