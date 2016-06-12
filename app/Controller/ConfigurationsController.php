<?php

App::uses('AppController', 'Controller');

class ConfigurationsController extends AppController {

    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Configurations'));
        $this->set('activeConfigurations', 'active');

        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Configurations'),
                'link' => [
                    'controller' => 'configurations',
                    'action' => 'configurations',
                    'params' => []
                ]
            ]
        ]);
    }

    public function index() {}

}
