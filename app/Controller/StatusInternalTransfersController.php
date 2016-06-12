<?php
App::uses('AppController', 'Controller');
/**
 * StatusInternalTransfers Controller
 *
 * @property StatusInternalTransfer $StatusInternalTransfer
 * @property PaginatorComponent $Paginator
 */
class StatusInternalTransfersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('StatusInternalTransfers'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StatusInternalTransfer->recursive = 0;
		$this->set('statusInternalTransfers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusInternalTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid status internal transfer'));
		}
		$options = array('conditions' => array('StatusInternalTransfer.' . $this->StatusInternalTransfer->primaryKey => $id));
		$this->set('statusInternalTransfer', $this->StatusInternalTransfer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusInternalTransfer->create();
			if ($this->StatusInternalTransfer->save($this->request->data)) {
				$this->Flash->success(__('The status internal transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status internal transfer could not be saved. Please, try again.'));
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
		if (!$this->StatusInternalTransfer->exists($id)) {
			throw new NotFoundException(__('Invalid status internal transfer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusInternalTransfer->save($this->request->data)) {
				$this->Flash->success(__('The status internal transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status internal transfer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusInternalTransfer.' . $this->StatusInternalTransfer->primaryKey => $id));
			$this->request->data = $this->StatusInternalTransfer->find('first', $options);
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
		$this->StatusInternalTransfer->id = $id;
		if (!$this->StatusInternalTransfer->exists()) {
			throw new NotFoundException(__('Invalid status internal transfer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StatusInternalTransfer->delete()) {
			$this->Flash->success(__('The status internal transfer has been deleted.'));
		} else {
			$this->Flash->error(__('The status internal transfer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
