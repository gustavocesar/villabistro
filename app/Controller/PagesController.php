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
        $this->set('title', __('Start Page'));
    }

    public function beforeRender() {
        parent::beforeRender();
        $this->layout = 'admin';
        $this->set('title', __('Start Page'));
        $this->set('activeHome', 'active');
    }

    public function home() {
        $this->set('arrayBreadCrumb', []);
    }

}
