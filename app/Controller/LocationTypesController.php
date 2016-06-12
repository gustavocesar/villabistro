<?php
App::uses('AppController', 'Controller');
/**
 * LocationTypes Controller
 *
 * @property LocationType $LocationType
 * @property PaginatorComponent $Paginator
 */
class LocationTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('LocationTypes'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LocationType->recursive = 0;
		$this->set('locationTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LocationType->exists($id)) {
			throw new NotFoundException(__('Invalid location type'));
		}
		$options = array('conditions' => array('LocationType.' . $this->LocationType->primaryKey => $id));
		$this->set('locationType', $this->LocationType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LocationType->create();
			if ($this->LocationType->save($this->request->data)) {
				$this->Flash->success(__('The location type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The location type could not be saved. Please, try again.'));
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
		if (!$this->LocationType->exists($id)) {
			throw new NotFoundException(__('Invalid location type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LocationType->save($this->request->data)) {
				$this->Flash->success(__('The location type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The location type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LocationType.' . $this->LocationType->primaryKey => $id));
			$this->request->data = $this->LocationType->find('first', $options);
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
		$this->LocationType->id = $id;
		if (!$this->LocationType->exists()) {
			throw new NotFoundException(__('Invalid location type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LocationType->delete()) {
			$this->Flash->success(__('The location type has been deleted.'));
		} else {
			$this->Flash->error(__('The location type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
