<?php
App::uses('AppController', 'Controller');

/**
 * Audits Controller
 *
 * @property Audit $Audit
 * @property PaginatorComponent $Paginator
 */
class AuditsController extends AppController {

    public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title', __('Audits'));
	}

    public function beforeRender() {
        parent::beforeRender();
        $this->layout = 'audit-modal';
    }

    /**
     * index method
     *
     * @return void
     */
	public function index($model=null, $id=null) {
        if (!$model || !$id) {
            throw new NotFoundException(__('Invalid record!'));
        }

        $this->Paginator->settings = [
            'conditions' => [
                "{$this->Audit->alias}.model = " => $model,
                "{$this->Audit->alias}.entity_id = " => $id
            ],
        ];

		$this->Audit->recursive = 1;
		$this->set('audits', $this->Paginator->paginate());
	}

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
	public function view($id = null) {
		if (!$this->Audit->exists($id)) {
			throw new NotFoundException(__('Invalid audit'));
		}
		$options = array('conditions' => array('Audit.' . $this->Audit->primaryKey => $id));
		$this->set('audit', $this->Audit->find('first', $options));
	}
}
