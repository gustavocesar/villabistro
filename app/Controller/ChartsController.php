<?php

App::uses('AppController', 'Controller');

class ChartsController extends AppController {

    public $components = ['Paginator'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Configurations'));
    }

    public function index() {
    }

}
