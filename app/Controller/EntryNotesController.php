<?php

App::uses('AppController', 'Controller');

/**
 * EntryNotes Controller
 *
 * @property EntryNote $EntryNote
 * @property PaginatorComponent $Paginator
 */
class EntryNotesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Paginator', 'RequestHandler'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('EntryNotes'));
        $this->set('activeConfigurations', 'active');
    }

    public function beforeRender() {
        parent::beforeRender();

        if (isset($this->request['data']['EntryNote'])) {
            $data = trim($this->request['data']['EntryNote']['entry_date']);
            if ($data) {
                $arrData = explode('-', $data);
                if (is_array($arrData) && count($arrData) >= 3) {
                    $this->set('entry_date_formatted', trim($arrData[2]) . '/' . trim($arrData[1]) . '/' . trim($arrData[0]));
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
            'order' => 'EntryNote.status_entry_note_id asc, EntryNote.id desc'
        ];
        
        $this->EntryNote->recursive = 1;
        $this->set('entryNotes', $this->Paginator->paginate());
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('EntryNotes'),
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
        if (!$this->EntryNote->exists($id)) {
            throw new NotFoundException(__('Invalid entry note'));
        }
        $this->EntryNote->recursive = 2;
        $options = array('conditions' => array('EntryNote.' . $this->EntryNote->primaryKey => $id));
        $this->set('entryNote', $this->EntryNote->find('first', $options));
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('EntryNotes'),
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
            $this->EntryNote->create();
            $newEntryNote = $this->EntryNote->save($this->request->data);
            if ($newEntryNote) {
                $this->Flash->success(__('The entry note has been saved.'));
                return $this->redirect(['action' => 'edit', $newEntryNote['EntryNote']['id']]);
            } else {
                if ($this->EntryNote->error) {
                    $this->Flash->error($this->EntryNote->error);
                } else {
                    $this->Flash->error(__('The entry note could not be saved. Please, try again.'));
                }
            }
        }
        
        $this->EntryNote->recursive = 2;
        $statusEntryNotes = $this->EntryNote->StatusEntryNote->find('list');
        
        $suppliers = $this->EntryNote->Supplier->find('list');
        $this->set(compact('suppliers', 'statusEntryNotes'));
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('EntryNotes'),
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
        if (!$this->EntryNote->exists($id)) {
            throw new NotFoundException(__('Invalid entry note'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $newEntryNote = $this->EntryNote->save($this->request->data);
            if ($newEntryNote) {
                $this->Flash->success(__('The entry note has been saved.'));
                return $this->redirect(['action' => 'edit', $newEntryNote['EntryNote']['id']]);
            } else {
                if ($this->EntryNote->error) {
                    $this->Flash->error($this->EntryNote->error);
                } else {
                    $this->Flash->error(__('The entry note could not be saved. Please, try again.'));
                }
            }
        } else {
            $options = array('conditions' => array('EntryNote.' . $this->EntryNote->primaryKey => $id));
            $this->request->data = $this->EntryNote->find('first', $options);
        }
        $suppliers = $this->EntryNote->Supplier->find('list');
        $statusEntryNotes = $this->EntryNote->StatusEntryNote->find('list');
        $this->set(compact('suppliers', 'statusEntryNotes'));
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('EntryNotes'),
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
        $this->EntryNote->id = $id;
        if (!$this->EntryNote->exists()) {
            throw new NotFoundException(__('Invalid entry note'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->EntryNote->delete()) {
            $this->Flash->success(__('The entry note has been deleted.'));
        } else {
            
            if (!$this->EntryNote->error) {
                $this->EntryNote->error = __('The entry note could not be deleted. Please, try again.');
            }
            $this->Flash->error($this->EntryNote->error);
            
        }
        return $this->redirect(array('action' => 'index'));
    }

}
