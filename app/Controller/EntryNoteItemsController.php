<?php

App::uses('AppController', 'Controller');

/**
 * EntryNoteItems Controller
 *
 * @property EntryNoteItem $EntryNoteItem
 * @property PaginatorComponent $Paginator
 */
class EntryNoteItemsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Paginator'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('EntryNoteItems'));
        
        $this->Security->unlockedActions = [
            'index',
            'add',
            'edit',
            'delete'
        ];
    }

    public function beforeRender() {
        parent::beforeRender();
        $this->layout = 'modal';
    }

    /**
     * index method
     *
     * @return void
     */
    public function index($entryNoteId = null) {

        $this->loadModel('EntryNotes');
        if (!$this->EntryNotes->exists($entryNoteId)) {
            throw new NotFoundException(__('Invalid entry note'));
        }

        $options = [
            'conditions' => ['EntryNotes.' . $this->EntryNotes->primaryKey => $entryNoteId],
            'joins' => [
                [
                    'table' => 'suppliers',
                    'alias' => 'Suppliers',
                    'type' => 'INNER',
                    'conditions' => [
                        'Suppliers.id = EntryNotes.supplier_id'
                    ]
                ],
                [
                    'table' => 'status_entry_notes',
                    'alias' => 'StatusEntryNotes',
                    'type' => 'INNER',
                    'conditions' => [
                        'StatusEntryNotes.id = EntryNotes.status_entry_note_id'
                    ]
                ],
            ],
            'fields' => ['EntryNotes.*', 'Suppliers.*', 'StatusEntryNotes.*'],
        ];
        $this->set('entryNote', $this->EntryNotes->find('first', $options));

        $this->Paginator->settings = [
            'fields' => ['DISTINCT EntryNoteItem.*'],
            'conditions' => ['EntryNoteItem.entry_note_id = ' => $entryNoteId],
            'order' => 'EntryNoteItem.id desc',
            'limit' => 999999999
        ];

        $this->EntryNoteItem->recursive = 2;
        $this->set('entryNoteItems', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->EntryNoteItem->exists($id)) {
            throw new NotFoundException(__('Invalid entry note item'));
        }
        $options = array('conditions' => array('EntryNoteItem.' . $this->EntryNoteItem->primaryKey => $id));
        $this->set('entryNoteItem', $this->EntryNoteItem->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($entryNoteId = null) {

        $this->loadModel('EntryNotes');
        if (!$this->EntryNotes->exists($entryNoteId)) {
            throw new NotFoundException(__('Invalid entry note item'));
        }

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $this->EntryNoteItem->create();

            if (!empty($this->request->data) && $this->EntryNoteItem->save($this->request->data)) {
                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The entry note item has been saved.')
                ]));
            } else {
                
                if (!$this->EntryNoteItem->error) {
                    $this->EntryNoteItem->error = __('The entry note item could not be saved. Please, try again.');
                }
                
                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->EntryNoteItem->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {
            
            $products = [];
            $arrProducts = $this->EntryNoteItem->Product->find('all', [
                'conditions' => [
                    'Product.stockable' => 'Sim',
                    'Product.status' => 'Ativo'
                ]
            ]);
            foreach ($arrProducts as $product) {
                $products[$product['Product']['id']] = $product['Product']['name'] . " ({$product['Unit']['initials']})";
            }
            
            //não exibir as localizações Virtuais
            $locations = $this->EntryNoteItem->Location->find('list', [
                'conditions' => ["{$this->EntryNoteItem->Location->alias}.location_type_id <> 2"]
            ]);
            
            $entryNotes = $this->EntryNoteItem->EntryNote->find('list');
            $this->set(compact('entryNotes', 'products', 'locations'));
            $this->set('entryNoteId', $entryNoteId);
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        
        if (!$this->EntryNoteItem->exists($id)) {
            throw new NotFoundException(__('Invalid entry note item'));
        }
        
        if ($this->request->is(array('post', 'put'))) {
            
            if (!empty($this->request->data) && $this->EntryNoteItem->save($this->request->data)) {
                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The entry note item has been saved.')
                ]));
            } else {
                
                if (!$this->EntryNoteItem->error) {
                    $this->EntryNoteItem->error = __('The entry note item could not be saved. Please, try again.');
                }
                
                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->EntryNoteItem->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {
            $options = array('conditions' => array('EntryNoteItem.' . $this->EntryNoteItem->primaryKey => $id));
            $this->request->data = $this->EntryNoteItem->find('first', $options);
            $this->set('EntryNoteItem', $this->request->data);
        }
        
        $products = [];
        $arrProducts = $this->EntryNoteItem->Product->find('all', [
            'conditions' => [
                'Product.stockable' => 'Sim',
                'Product.status' => 'Ativo'
            ]
        ]);
        foreach ($arrProducts as $product) {
            $products[$product['Product']['id']] = $product['Product']['name'] . " ({$product['Unit']['initials']})";
        }
        
        //não exibir as localizações Virtuais
        $locations = $this->EntryNoteItem->Location->find('list', [
            'conditions' => ["{$this->EntryNoteItem->Location->alias}.location_type_id <> 2"]
        ]);
        
        $entryNotes = $this->EntryNoteItem->EntryNote->find('list');
        $this->set(compact('entryNotes', 'products', 'locations'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {

        $this->autoRender = false;

        $this->EntryNoteItem->id = $id;
        if (!$this->EntryNoteItem->exists()) {
            throw new NotFoundException(__('Invalid entry note item'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->EntryNoteItem->delete()) {
            $this->response->body(json_encode([
                'success' => true,
                'message' => __('The entry note item has been deleted.')
            ]));
        } else {
            if (!$this->EntryNoteItem->error) {
                $this->EntryNoteItem->error = __('The entry note item could not be deleted. Please, try again.');
            }

            $this->response->body(json_encode([
                'success' => false,
                'message' => $this->EntryNoteItem->error
            ]));
        }
    }

}
