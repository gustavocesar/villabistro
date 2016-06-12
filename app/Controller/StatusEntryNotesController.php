<?php
App::uses('AppController', 'Controller');
/**
 * StatusEntryNotes Controller
 *
 * @property StatusEntryNote $StatusEntryNote
 * @property PaginatorComponent $Paginator
 */
class StatusEntryNotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('StatusEntryNotes'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StatusEntryNote->recursive = 0;
		$this->set('statusEntryNotes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusEntryNote->exists($id)) {
			throw new NotFoundException(__('Invalid status entry note'));
		}
		$options = array('conditions' => array('StatusEntryNote.' . $this->StatusEntryNote->primaryKey => $id));
		$this->set('statusEntryNote', $this->StatusEntryNote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusEntryNote->create();
			if ($this->StatusEntryNote->save($this->request->data)) {
				$this->Flash->success(__('The status entry note has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status entry note could not be saved. Please, try again.'));
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
		if (!$this->StatusEntryNote->exists($id)) {
			throw new NotFoundException(__('Invalid status entry note'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusEntryNote->save($this->request->data)) {
				$this->Flash->success(__('The status entry note has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The status entry note could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusEntryNote.' . $this->StatusEntryNote->primaryKey => $id));
			$this->request->data = $this->StatusEntryNote->find('first', $options);
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
		$this->StatusEntryNote->id = $id;
		if (!$this->StatusEntryNote->exists()) {
			throw new NotFoundException(__('Invalid status entry note'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StatusEntryNote->delete()) {
			$this->Flash->success(__('The status entry note has been deleted.'));
		} else {
			$this->Flash->error(__('The status entry note could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
