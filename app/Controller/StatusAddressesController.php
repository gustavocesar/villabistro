<?php
App::uses('AppController', 'Controller');
/**
 * StatusAddresses Controller
 *
 * @property StatusAddress $StatusAddress
 * @property PaginatorComponent $Paginator
 */
class StatusAddressesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('StatusAddresses'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StatusAddress->recursive = 0;
		$this->set('statusAddresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusAddress->exists($id)) {
			throw new NotFoundException(__('Invalid status address'));
		}
		$options = array('conditions' => array('StatusAddress.' . $this->StatusAddress->primaryKey => $id));
		$this->set('statusAddress', $this->StatusAddress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusAddress->create();
			if ($this->StatusAddress->save($this->request->data)) {
				$this->Flash->success(__('The status address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status address could not be saved. Please, try again.'));
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
		if (!$this->StatusAddress->exists($id)) {
			throw new NotFoundException(__('Invalid status address'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusAddress->save($this->request->data)) {
				$this->Flash->success(__('The status address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusAddress.' . $this->StatusAddress->primaryKey => $id));
			$this->request->data = $this->StatusAddress->find('first', $options);
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
		$this->StatusAddress->id = $id;
		if (!$this->StatusAddress->exists()) {
			throw new NotFoundException(__('Invalid status address'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StatusAddress->delete()) {
			$this->Flash->success(__('The status address has been deleted.'));
		} else {
			$this->Flash->error(__('The status address could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
