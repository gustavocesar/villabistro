<?php

App::uses('AppController', 'Controller');

/**
 * ManualAdjustments Controller
 *
 * @property ManualAdjustment $ManualAdjustment
 * @property PaginatorComponent $Paginator
 */
class ManualAdjustmentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('ManualAdjustments'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ManualAdjustment->recursive = 0;
        $this->set('manualAdjustments', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ManualAdjustment->exists($id)) {
            throw new NotFoundException(__('Invalid manual adjustment'));
        }
        $options = array('conditions' => array('ManualAdjustment.' . $this->ManualAdjustment->primaryKey => $id));
        $this->set('manualAdjustment', $this->ManualAdjustment->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ManualAdjustment->create();
            if ($this->ManualAdjustment->save($this->request->data)) {
                $this->Flash->success(__('The manual adjustment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The manual adjustment could not be saved. Please, try again.'));
            }
        }
        $locations = $this->ManualAdjustment->Location->find('list');
        $this->set(compact('locations'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->ManualAdjustment->exists($id)) {
            throw new NotFoundException(__('Invalid manual adjustment'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ManualAdjustment->save($this->request->data)) {
                $this->Flash->success(__('The manual adjustment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The manual adjustment could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ManualAdjustment.' . $this->ManualAdjustment->primaryKey => $id));
            $this->request->data = $this->ManualAdjustment->find('first', $options);
        }
        $locations = $this->ManualAdjustment->Location->find('list');
        $this->set(compact('locations'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->ManualAdjustment->id = $id;
        if (!$this->ManualAdjustment->exists()) {
            throw new NotFoundException(__('Invalid manual adjustment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ManualAdjustment->delete()) {
            $this->Flash->success(__('The manual adjustment has been deleted.'));
        } else {
            $this->Flash->error(__('The manual adjustment could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
