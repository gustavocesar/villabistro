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
    public $components = [
        'Paginator',
        'Recaptcha.Recaptcha'
    ];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Users'));
        $this->set('activeConfigurations', 'active');
    }

    public function login() {
        $this->layout = 'auth';
        if ($this->request->is('post')) {

//            if (!$this->Recaptcha->verify()) {
//                $this->Flash->error(__('Robot! ' . $this->Recaptcha->error));
//                $this->Auth->logout();
//                return $this->redirect($this->Auth->redirectUrl());
//            }

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

        $this->Acl->deny($group, 'controllers/Orders/cancel');
        

        /**
         * 3 - Atendimento
         */
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Pages/home');

        $this->Acl->allow($group, 'controllers/Configurations/index');
        $this->Acl->allow($group, 'controllers/Users/index');
        $this->Acl->allow($group, 'controllers/Users/view');
        $this->Acl->allow($group, 'controllers/Users/edit');
        $this->Acl->allow($group, 'controllers/Users/login');
        $this->Acl->allow($group, 'controllers/Users/logout');
        
        $this->Acl->allow($group, 'controllers/Bills');
        $this->Acl->allow($group, 'controllers/Addresses');
        $this->Acl->allow($group, 'controllers/Tables/tables_board');
        $this->Acl->allow($group, 'controllers/Tables/table_details');
        $this->Acl->allow($group, 'controllers/Tables/close_table');
        $this->Acl->deny($group, 'controllers/Tables/change_table');
        
        $this->Acl->allow($group, 'controllers/Payments/add');
        $this->Acl->allow($group, 'controllers/Payments/list_orders');

        $this->Acl->allow($group, 'controllers/Orders/add_order');
        $this->Acl->allow($group, 'controllers/Orders/order_wizard');

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
        
        $this->User->recursive = 0;
        $options = [
            'conditions' => ['User.' . $this->User->primaryKey => $id],
        ];
        
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
