<?php

App::uses('AppController', 'Controller');

/**
 * Addresses Controller
 *
 * @property Address $Address
 * @property PaginatorComponent $Paginator
 */
class AddressesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'modal';
        $this->set('title', __('Addresses'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index($userId = null) {

        if (!$this->Address->User->exists($userId)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $this->Address->recursive = 0;
        $this->set('userId', $userId);
        $this->set('addresses', $this->Address->find('all', [
                    'conditions' => [
                        "{$this->Address->alias}.user_id" => $userId
                    ]
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
        if (!$this->Address->exists($id)) {
            throw new NotFoundException(__('Invalid address'));
        }
        $options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
        $this->set('address', $this->Address->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($userId = null) {

        if (!$this->Address->User->exists($userId)) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post')) {
            $this->autoRender = false;

            $this->Address->create();

            if (!empty($this->request->data) && $this->Address->save($this->request->data)) {

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The address has been saved.')
                ]));
            } else {

                if (!$this->Address->error) {
                    $this->Address->error = __('The address could not be saved. Please, try again.');
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->Address->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {

            $statusAddresses = $this->Address->StatusAddress->find('list');
            $states = $this->Address->State->find('list');
            $publicPlaces = $this->Address->PublicPlace->find('list');
            $this->set(compact('users', 'statusAddresses', 'states', 'publicPlaces'));

            $this->set('userId', $userId);
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
        if (!$this->Address->exists($id)) {
            throw new NotFoundException(__('Invalid address'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if (!empty($this->request->data) && $this->Address->save($this->request->data)) {

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The address has been saved.')
                ]));
            } else {

                if (!$this->Address->error) {
                    $this->Address->error = __('The address could not be saved. Please, try again.');
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->Address->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {
            $options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
            $this->request->data = $this->Address->find('first', $options);
            
            $statusAddresses = $this->Address->StatusAddress->find('list');
            $states = $this->Address->State->find('list');
            $publicPlaces = $this->Address->PublicPlace->find('list');
            $this->set(compact('users', 'statusAddresses', 'states', 'publicPlaces'));
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

        $this->autoRender = false;

        $this->Address->id = $id;
        if (!$this->Address->exists()) {
            throw new NotFoundException(__('Invalid address'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Address->inactivate()) {
            $this->response->body(json_encode([
                'success' => true,
                'message' => __('The address has been inactivated.')
            ]));
        } else {
            if (!$this->Address->error) {
                $this->Address->error = __('The address could not be inactivated. Please, try again.');
            }

            $this->response->body(json_encode([
                'success' => false,
                'message' => $this->Address->error
            ]));
        }
    }

}
