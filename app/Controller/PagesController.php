<?php

App::uses('AppController', 'Controller');

/**
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class PagesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    public function beforeRender() {
        parent::beforeRender();
        $this->layout = 'admin';
        $this->set('activeHome', 'active');
    }

    public function home() {
        $this->set('title', __('Start Page'));
        $this->set('arrayBreadCrumb', []);
    }

    public function documentation() {
        $this->set('title', __('Documentation'));
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Documentation'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

}
