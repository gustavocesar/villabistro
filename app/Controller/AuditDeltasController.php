<?php
App::uses('AppController', 'Controller');
/**
 * AuditDeltas Controller
 *
 * @property AuditDelta $AuditDelta
 * @property PaginatorComponent $Paginator
 */
class AuditDeltasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('AuditDeltas'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AuditDelta->recursive = 0;
		$this->set('auditDeltas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuditDelta->exists($id)) {
			throw new NotFoundException(__('Invalid audit delta'));
		}
		$options = array('conditions' => array('AuditDelta.' . $this->AuditDelta->primaryKey => $id));
		$this->set('auditDelta', $this->AuditDelta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuditDelta->create();
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Flash->success(__('The audit delta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The audit delta could not be saved. Please, try again.'));
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
		if (!$this->AuditDelta->exists($id)) {
			throw new NotFoundException(__('Invalid audit delta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Flash->success(__('The audit delta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The audit delta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuditDelta.' . $this->AuditDelta->primaryKey => $id));
			$this->request->data = $this->AuditDelta->find('first', $options);
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
		$this->AuditDelta->id = $id;
		if (!$this->AuditDelta->exists()) {
			throw new NotFoundException(__('Invalid audit delta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AuditDelta->delete()) {
			$this->Flash->success(__('The audit delta has been deleted.'));
		} else {
			$this->Flash->error(__('The audit delta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
