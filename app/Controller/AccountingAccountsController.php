<?php
App::uses('AppController', 'Controller');
/**
 * AccountingAccounts Controller
 *
 * @property AccountingAccount $AccountingAccount
 * @property PaginatorComponent $Paginator
 */
class AccountingAccountsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('AccountingAccounts'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AccountingAccount->recursive = 0;
		$this->set('accountingAccounts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AccountingAccount->exists($id)) {
			throw new NotFoundException(__('Invalid accounting account'));
		}
		$options = array('conditions' => array('AccountingAccount.' . $this->AccountingAccount->primaryKey => $id));
		$this->set('accountingAccount', $this->AccountingAccount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccountingAccount->create();
			if ($this->AccountingAccount->save($this->request->data)) {
				$this->Flash->success(__('The accounting account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The accounting account could not be saved. Please, try again.'));
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
		if (!$this->AccountingAccount->exists($id)) {
			throw new NotFoundException(__('Invalid accounting account'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AccountingAccount->save($this->request->data)) {
				$this->Flash->success(__('The accounting account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The accounting account could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AccountingAccount.' . $this->AccountingAccount->primaryKey => $id));
			$this->request->data = $this->AccountingAccount->find('first', $options);
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
		$this->AccountingAccount->id = $id;
		if (!$this->AccountingAccount->exists()) {
			throw new NotFoundException(__('Invalid accounting account'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AccountingAccount->delete()) {
			$this->Flash->success(__('The accounting account has been deleted.'));
		} else {
			$this->Flash->error(__('The accounting account could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
