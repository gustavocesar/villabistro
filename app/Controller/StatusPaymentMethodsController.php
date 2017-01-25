<?php
App::uses('AppController', 'Controller');
/**
 * StatusPaymentMethods Controller
 *
 * @property StatusPaymentMethod $StatusPaymentMethod
 * @property PaginatorComponent $Paginator
 */
class StatusPaymentMethodsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('StatusPaymentMethods'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StatusPaymentMethod->recursive = 0;
		$this->set('statusPaymentMethods', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusPaymentMethod->exists($id)) {
			throw new NotFoundException(__('Invalid status payment method'));
		}
		$options = array('conditions' => array('StatusPaymentMethod.' . $this->StatusPaymentMethod->primaryKey => $id));
		$this->set('statusPaymentMethod', $this->StatusPaymentMethod->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusPaymentMethod->create();
			if ($this->StatusPaymentMethod->save($this->request->data)) {
				$this->Flash->success(__('The status payment method has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status payment method could not be saved. Please, try again.'));
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
		if (!$this->StatusPaymentMethod->exists($id)) {
			throw new NotFoundException(__('Invalid status payment method'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusPaymentMethod->save($this->request->data)) {
				$this->Flash->success(__('The status payment method has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status payment method could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusPaymentMethod.' . $this->StatusPaymentMethod->primaryKey => $id));
			$this->request->data = $this->StatusPaymentMethod->find('first', $options);
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
		$this->StatusPaymentMethod->id = $id;
		if (!$this->StatusPaymentMethod->exists()) {
			throw new NotFoundException(__('Invalid status payment method'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StatusPaymentMethod->delete()) {
			$this->Flash->success(__('The status payment method has been deleted.'));
		} else {
			$this->Flash->error(__('The status payment method could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
