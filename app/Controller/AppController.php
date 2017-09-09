<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $helpers = [
        'Html', 'Form', 'Session', 'Flash', 'MyFormat', 'Cache',
        'Js' => ['Jquery']
    ];
    
    public $components = [
//        'DebugKit.Toolbar',
        'Flash',
        'Session',
        'Acl',
        'Auth' => [
            'userModel' => 'Users',
            'authError' => 'Permissão Negada',
            'authorize' => [
                'Actions' => ['actionPath' => 'controllers']
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
//                    'scope' => [
//                        'User.status' => 'Ativo'
//                    ]
                ]
            ]
        ],
        'Security' => [
            'csrfExpires' => '+1 hour',
            'csrfUseOnce' => false,
            'unlockedActions' => [
                'index',
                'delete',
                'update_sequence',
                'add_order',
                'order_wizard',
                'list_orders',
                'add',
                'change_table',
                'location_by_zip_code'
            ]
        ],
    ];

    public function beforeFilter() {

        $defaultLayout = 'admin';

        try {
            $connection = ConnectionManager::getDataSource('default');
            $connected = $connection->connect();
        } catch (Exception $connectionError) {
            $defaultLayout = 'error';
            $errorMsg = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')) {
                $attributes = $connectionError->getAttributes();
            }
        }

        $this->layout = $defaultLayout;
        $this->set('title', __('Home'));
        $this->set('controller', $this->request->params['controller']);
        $this->set('action', $this->request->params['action']);
        
        $this->set('activeHome', '');
        $this->set('activeOrdersBoard', '');
        $this->set('activeTables', '');
        $this->set('activeKitchen', '');
        $this->set('activeConfigurations', '');
        $this->set('activeCharts', '');
        $this->set('activeReports', '');

        //Configure AuthComponent
        $this->Auth->loginAction = [
            'controller' => 'users',
            'action' => 'login'
        ];
        $this->Auth->logoutRedirect = [
            'controller' => 'users',
            'action' => 'login'
        ];
        $this->Auth->loginRedirect = [
            'controller' => 'pages',
            'action' => 'home'
        ];

        $this->Auth->allow('initDB');

        $this->Auth->allow('modal');

        if (!empty($this->request->data) && empty($this->request->data[$this->Auth->userModel])) {
            $user['User']['id'] = $this->Auth->user('id');
            $this->request->data[$this->Auth->userModel] = $user;
        }
        
        pr($_SERVER);
        $this->set('isProduction', true);
    }

    public function beforeRender() {
        parent::beforeRender();
    }
    
}
