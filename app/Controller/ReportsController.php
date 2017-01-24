<?php

App::uses('AppController', 'Controller');

class ReportsController extends AppController {

    public $components = ['Paginator'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Reports'));
        $this->set('activeReports', 'active');
    }

    public function index() {

    }

    public function sales_period() {

        if ($this->request->is('post')) {
            $this->layout = 'pdf';
            $this->render('/Reports/print/sales_period');
        } else {

            $this->set('title', __('Sales by Period'));

            $this->set('arrayBreadCrumb', [
                0 => [
                    'label' => __('Reports'),
                    'link' => [
                        'controller' => 'reports',
                        'action' => '/',
                        'params' => []
                    ]
                ],
                1 => [
                    'label' => __('Sales by Period'),
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
