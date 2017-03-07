<?php

App::uses('AppController', 'Controller');

class ChartsController extends AppController {

    public $components = ['Paginator'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Charts'));
        $this->set('activeConfigurations', 'active');
    }

    public function index() {
    }

    public function weekly_stock() {
        $this->set('title', __('Weekly stock'));
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Charts'),
                'link' => [
                    'controller' => 'charts',
                    'action' => '/',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Weekly stock'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

}
