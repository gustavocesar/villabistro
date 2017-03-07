<?php
App::uses('AppController', 'Controller');
/**
 * PublicPlaces Controller
 *
 * @property PublicPlace $PublicPlace
 * @property PaginatorComponent $Paginator
 */
class PublicPlacesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('PublicPlaces'));
	} 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PublicPlace->recursive = 0;
        $this->set('publicPlaces', $this->PublicPlace->find('all', [
            'order' => "{$this->PublicPlace->alias}.id asc"
        ]));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PublicPlace->exists($id)) {
			throw new NotFoundException(__('Invalid public place'));
		}
		$options = array('conditions' => array('PublicPlace.' . $this->PublicPlace->primaryKey => $id));
		$this->set('publicPlace', $this->PublicPlace->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PublicPlace->create();
			if ($this->PublicPlace->save($this->request->data)) {
				$this->Flash->success(__('The public place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The public place could not be saved. Please, try again.'));
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
		if (!$this->PublicPlace->exists($id)) {
			throw new NotFoundException(__('Invalid public place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PublicPlace->save($this->request->data)) {
				$this->Flash->success(__('The public place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The public place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PublicPlace.' . $this->PublicPlace->primaryKey => $id));
			$this->request->data = $this->PublicPlace->find('first', $options);
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
		$this->PublicPlace->id = $id;
		if (!$this->PublicPlace->exists()) {
			throw new NotFoundException(__('Invalid public place'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PublicPlace->delete()) {
			$this->Flash->success(__('The public place has been deleted.'));
		} else {
			$this->Flash->error(__('The public place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
