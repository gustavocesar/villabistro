<?php
App::uses('AppController', 'Controller');
class RoutinesController extends AppController {

    public $components = ['Paginator'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Routines'));
        $this->set('activeConfigurations', 'active');
    }

    public function index() {
    }

    public function inactivate_all_products() {

        $this->set('title', __('Inactivate All Products'));

        if ($this->request->is('post')) {
            $this->loadModel('Products');
            $this->Products->query('update products set status="Inativo" where status="Ativo"');

            return $this->redirect(array('controller' => 'products', 'action' => 'index'));
        } else {

            $this->set('arrayBreadCrumb', [
                0 => [
                    'label' => __('Routines'),
                    'link' => [
                        'controller' => 'routines',
                        'action' => '/',
                        'params' => []
                    ]
                ],
                1 => [
                    'label' => __('Inactivate All Products'),
                    'link' => [
                        'controller' => $this->params['controller'],
                        'action' => $this->params['action'],
                        'params' => []
                    ]
                ]
            ]);
        }
    }
}
