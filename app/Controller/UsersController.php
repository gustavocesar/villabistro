<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Paginator'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Users'));
        $this->set('activeConfigurations', 'active');
    }

    public function login() {
        $this->layout = 'auth';
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {
                //$this->Auth->user('status')

                if ($this->Auth->user('status') != 'Ativo') {
                    $this->Auth->logout();
                    $this->Flash->error(__('This User has been inactivated!'));
                }

                Cache::clear();

                //avoid "Permission Denied" messages at login
                $this->Session->delete('Message.auth');

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password was incorrect.'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function initDB() {
        $this->Session->delete('Permissions');

        $group = $this->User->Group;

        /**
         * 1 - Administrador
         */
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        
        /**
         * 2 - Cozinha
         */
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers');

        $this->Acl->deny($group, 'controllers/orders/cancel');
        

        /**
         * 3 - Atendimento
         */
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers');
        
        $this->Acl->deny($group, 'controllers/orders/cancel');

//        $this->Acl->allow($group, 'controllers/bills');
//        $this->Acl->allow($group, 'controllers/pages/home');
//        $this->Acl->allow($group, 'controllers/configurations/index');
//
//        $this->Acl->allow($group, 'controllers/users/index');
//        $this->Acl->allow($group, 'controllers/users/view');
//        $this->Acl->allow($group, 'controllers/users/login');
//        $this->Acl->allow($group, 'controllers/users/logout');
//
//        $this->Acl->allow($group, 'controllers/orders/add_order');

        echo "all done";
        exit;
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all', [
            'order' => "{$this->User->alias}.id asc"
        ]));

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Users'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index2() {
        $this->Paginator->settings = [
            'order' => "{$this->User->alias}.id asc"
        ];

        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Users'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Users'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
                    'params' => []
                ]
            ],
            2 => [
                'label' => __('View'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {

                if (!$this->User->error) {
                    $this->User->error = __('The user could not be saved. Please, try again.');
                }

                $this->Flash->error($this->User->error);
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Users'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
                    'params' => []
                ]
            ],
            2 => [
                'label' => __('Add'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {

                if (!$this->User->error) {
                    $this->User->error = __('The user could not be saved. Please, try again.');
                }

                $this->Flash->error($this->User->error);
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Users'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => '/',
                    'params' => []
                ]
            ],
            2 => [
                'label' => __('Edit'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
