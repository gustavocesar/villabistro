<?php
App::uses('AppController', 'Controller');
/**
 * StatusOrders Controller
 *
 * @property StatusOrder $StatusOrder
 * @property PaginatorComponent $Paginator
 */
class StatusOrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('StatusOrders'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StatusOrder->recursive = 0;
		$this->set('statusOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusOrder->exists($id)) {
			throw new NotFoundException(__('Invalid status order'));
		}
		$options = array('conditions' => array('StatusOrder.' . $this->StatusOrder->primaryKey => $id));
		$this->set('statusOrder', $this->StatusOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusOrder->create();
			if ($this->StatusOrder->save($this->request->data)) {
				$this->Flash->success(__('The status order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status order could not be saved. Please, try again.'));
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
		if (!$this->StatusOrder->exists($id)) {
			throw new NotFoundException(__('Invalid status order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusOrder->save($this->request->data)) {
				$this->Flash->success(__('The status order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusOrder.' . $this->StatusOrder->primaryKey => $id));
			$this->request->data = $this->StatusOrder->find('first', $options);
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
		$this->StatusOrder->id = $id;
		if (!$this->StatusOrder->exists()) {
			throw new NotFoundException(__('Invalid status order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StatusOrder->delete()) {
			$this->Flash->success(__('The status order has been deleted.'));
		} else {
			$this->Flash->error(__('The status order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
