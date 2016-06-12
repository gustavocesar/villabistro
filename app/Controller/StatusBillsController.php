<?php
App::uses('AppController', 'Controller');
/**
 * StatusBills Controller
 *
 * @property StatusBill $StatusBill
 * @property PaginatorComponent $Paginator
 */
class StatusBillsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('StatusBills'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StatusBill->recursive = 0;
		$this->set('statusBills', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusBill->exists($id)) {
			throw new NotFoundException(__('Invalid status bill'));
		}
		$options = array('conditions' => array('StatusBill.' . $this->StatusBill->primaryKey => $id));
		$this->set('statusBill', $this->StatusBill->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusBill->create();
			if ($this->StatusBill->save($this->request->data)) {
				$this->Flash->success(__('The status bill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status bill could not be saved. Please, try again.'));
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
		if (!$this->StatusBill->exists($id)) {
			throw new NotFoundException(__('Invalid status bill'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusBill->save($this->request->data)) {
				$this->Flash->success(__('The status bill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status bill could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusBill.' . $this->StatusBill->primaryKey => $id));
			$this->request->data = $this->StatusBill->find('first', $options);
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
		$this->StatusBill->id = $id;
		if (!$this->StatusBill->exists()) {
			throw new NotFoundException(__('Invalid status bill'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StatusBill->delete()) {
			$this->Flash->success(__('The status bill has been deleted.'));
		} else {
			$this->Flash->error(__('The status bill could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
