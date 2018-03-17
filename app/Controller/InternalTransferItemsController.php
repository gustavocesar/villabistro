<?php

App::uses('AppController', 'Controller');

/**
 * InternalTransferItems Controller
 *
 * @property InternalTransferItem $InternalTransferItem
 * @property PaginatorComponent $Paginator
 */
class InternalTransferItemsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('InternalTransferItems'));
        
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
    public function index($internalTransferId = null) {

        $this->loadModel('InternalTransfers');
        if (!$this->InternalTransfers->exists($internalTransferId)) {
            throw new NotFoundException(__('Invalid internal transfer'));
        }
        

        $this->Paginator->settings = [
            'fields' => ['DISTINCT InternalTransferItem.*'],
            'conditions' => ['InternalTransferItem.internal_transfer_id = ' => $internalTransferId],
            'order' => 'InternalTransferItem.id desc',
            'limit' => 999999999
        ];
        

        $this->InternalTransferItem->recursive = 2;
        $this->set('internalTransferItems', $this->Paginator->paginate());
        
        $this->InternalTransferItem->InternalTransfer->recursive = -1;
        $this->set('internalTransfer', $this->InternalTransferItem->InternalTransfer->findById($internalTransferId));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->InternalTransferItem->exists($id)) {
            throw new NotFoundException(__('Invalid internal transfer item'));
        }
        $options = array('conditions' => array('InternalTransferItem.' . $this->InternalTransferItem->primaryKey => $id));
        $this->set('internalTransferItem', $this->InternalTransferItem->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($internalTransferId = null) {

        $this->loadModel('InternalTransfers');
        if (!$this->InternalTransfers->exists($internalTransferId)) {
            throw new NotFoundException(__('Invalid internal transfer item'));
        }

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $this->InternalTransferItem->create();

            if (!empty($this->request->data) && $this->InternalTransferItem->save($this->request->data)) {

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The internal transfer item has been saved.')
                ]));
            } else {

                if (!$this->InternalTransferItem->error) {
                    $this->InternalTransferItem->error = __('The internal transfer item could not be saved. Please, try again.');
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->InternalTransferItem->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        }

        $products = [];
        $arrProducts = $this->InternalTransferItem->Product->find('all', [
            'conditions' => [
                'Product.stockable' => 'Sim',
                'Product.status' => 'Ativo'
            ]
        ]);
        foreach ($arrProducts as $product) {
            $products[$product['Product']['id']] = $product['Product']['name'] . " ({$product['Unit']['initials']})";
        }

        $internalTransfers = $this->InternalTransferItem->InternalTransfer->find('list');
        $this->set(compact('internalTransfers', 'products'));
        $this->set('internalTransferId', $internalTransferId);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->InternalTransferItem->exists($id)) {
            throw new NotFoundException(__('Invalid internal transfer item'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if (!empty($this->request->data) && $this->InternalTransferItem->save($this->request->data)) {

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The internal transfer item has been saved.')
                ]));
            } else {

                if (!$this->InternalTransferItem->error) {
                    $this->InternalTransferItem->error = __('The internal transfer item could not be saved. Please, try again.');
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->InternalTransferItem->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {
            $options = array('conditions' => array('InternalTransferItem.' . $this->InternalTransferItem->primaryKey => $id));
            $this->request->data = $this->InternalTransferItem->find('first', $options);
            $this->set('InternalTransferItem', $this->request->data);
        }

        $products = [];
        $arrProducts = $this->InternalTransferItem->Product->find('all', [
            'conditions' => [
                'Product.stockable' => 'Sim',
                'Product.status' => 'Ativo'
            ]
        ]);
        foreach ($arrProducts as $product) {
            $products[$product['Product']['id']] = $product['Product']['name'] . " ({$product['Unit']['initials']})";
        }

        $internalTransfers = $this->InternalTransferItem->InternalTransfer->find('list');
        $this->set(compact('internalTransfers', 'products'));
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

        $this->InternalTransferItem->id = $id;
        if (!$this->InternalTransferItem->exists()) {
            throw new NotFoundException(__('Invalid internal transfer item'));
        }

        $this->request->allowMethod('post', 'delete');
        if ($this->InternalTransferItem->delete()) {
            $this->response->body(json_encode([
                'success' => true,
                'message' => __('The internal transfer item has been deleted.')
            ]));
        } else {
            if (!$this->InternalTransferItem->error) {
                $this->InternalTransferItem->error = __('The internal transfer item could not be deleted. Please, try again.');
            }

            $this->response->body(json_encode([
                'success' => false,
                'message' => $this->InternalTransferItem->error
            ]));
        }
    }

}
