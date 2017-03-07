<?php

App::uses('AppController', 'Controller');

/**
 * InternalTransfers Controller
 *
 * @property InternalTransfer $InternalTransfer
 * @property PaginatorComponent $Paginator
 */
class InternalTransfersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('InternalTransfers'));
        $this->set('activeConfigurations', 'active');
    }

    public function beforeRender() {
        parent::beforeRender();

        if (isset($this->request['data']['InternalTransfer'])) {
            $data = trim($this->request['data']['InternalTransfer']['date']);
            if ($data) {
                $arrData = explode('-', $data);
                if (is_array($arrData) && count($arrData) >= 3) {
                    $this->set('date_formatted', trim($arrData[2]) . '/' . trim($arrData[1]) . '/' . trim($arrData[0]));
                }
            }
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
        $this->Paginator->settings = [
            'order' => 'InternalTransfer.status_internal_transfer_id asc, InternalTransfer.id desc'
        ];
        
        $this->InternalTransfer->recursive = 1;
        $this->set('internalTransfers', $this->Paginator->paginate());
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('InternalTransfers'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
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
        if (!$this->InternalTransfer->exists($id)) {
            throw new NotFoundException(__('Invalid internal transfer'));
        }
        $options = array('conditions' => array('InternalTransfer.' . $this->InternalTransfer->primaryKey => $id));
        $this->InternalTransfer->recursive = 2;
        $this->set('internalTransfer', $this->InternalTransfer->find('first', $options));
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('InternalTransfers'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'index',
                    'params' => []
                ]
            ],
            1 => [
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
            $this->InternalTransfer->create();
            $internalTransfer = $this->InternalTransfer->save($this->request->data);
            if ($internalTransfer) {
                $this->Flash->success(__('The internal transfer has been saved.'));
                return $this->redirect(['action' => 'edit', $internalTransfer['InternalTransfer']['id']]);
            } else {
                if (!$this->InternalTransfer->error) {
                    $this->InternalTransfer->error = __('The internal transfer could not be saved. Please, try again.');
                }
                
                $this->Flash->error($this->InternalTransfer->error);
            }
        }
        
        $fisicalLocations = $this->InternalTransfer->LocationOrigin->getListFisicalLocations();
        
        $locations            = $fisicalLocations;
        $listLocationDestiny  = $fisicalLocations;
        
        $statusInternalTransfers = $this->InternalTransfer->StatusInternalTransfer->find('list');
        $this->set(compact('locations', 'statusInternalTransfers', 'locations_destiny'));

        $this->set('listLocationDestiny', $listLocationDestiny);
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('InternalTransfers'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'index',
                    'params' => []
                ]
            ],
            1 => [
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
        if (!$this->InternalTransfer->exists($id)) {
            throw new NotFoundException(__('Invalid internal transfer'));
        }
        
        
        if ($this->request->is(array('post', 'put'))) {
            $internalTransfer = $this->InternalTransfer->save($this->request->data);
            if ($internalTransfer) {
                $this->Flash->success(__('The internal transfer has been saved.'));
                return $this->redirect(['action' => 'edit', $internalTransfer['InternalTransfer']['id']]);
            } else {
                
                if (!$this->InternalTransfer->error) {
                    $this->InternalTransfer->error = __('The internal transfer could not be saved. Please, try again.');
                }
                
                $this->Flash->error($this->InternalTransfer->error);
            }
        } else {
            //
        }
        
        $options = array('conditions' => array('InternalTransfer.' . $this->InternalTransfer->primaryKey => $id));
        $this->request->data = $this->InternalTransfer->find('first', $options);
        $this->set('InternalTransfer', $this->request->data);
        
        $fisicalLocations = $this->InternalTransfer->LocationOrigin->getListFisicalLocations();

        $locations            = $fisicalLocations;
        $listLocationDestiny  = $fisicalLocations;
        
        $statusInternalTransfers = $this->InternalTransfer->StatusInternalTransfer->find('list');
        $this->set(compact('locations', 'statusInternalTransfers'));

        $this->set('listLocationDestiny', $listLocationDestiny);
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('InternalTransfers'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'index',
                    'params' => []
                ]
            ],
            1 => [
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
        $this->InternalTransfer->id = $id;
        if (!$this->InternalTransfer->exists()) {
            throw new NotFoundException(__('Invalid internal transfer'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->InternalTransfer->delete()) {
            $this->Flash->success(__('The internal transfer has been deleted.'));
        } else {
            
            if (!$this->InternalTransfer->error) {
                $this->InternalTransfer->error = __('The internal transfer could not be deleted. Please, try again.');
            }
            $this->Flash->error($this->InternalTransfer->error);
            
        }
        return $this->redirect(array('action' => 'index'));
    }

}
