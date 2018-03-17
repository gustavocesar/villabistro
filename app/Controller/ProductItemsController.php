<?php

App::uses('AppController', 'Controller');

/**
 * ProductItems Controller
 *
 * @property ProductItem $ProductItem
 * @property PaginatorComponent $Paginator
 */
class ProductItemsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('ProductItems'));
        
        $this->Security->unlockedActions = [
            'index',
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
    public function index($productId = null) {

        $this->loadModel('Products');
        if (!$this->Products->exists($productId)) {
            throw new NotFoundException(__('Invalid product'));
        }

        $this->Paginator->settings = [
//            'fields' => ['DISTINCT ProductItem.*'],
            'conditions' => ['ProductItem.product_id = ' => $productId],
            'order' => 'ProductItem.id desc',
            'limit' => 999999999
        ];

        $this->ProductItem->recursive = 2;
        $this->set('productItems', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ProductItem->exists($id)) {
            throw new NotFoundException(__('Invalid product item'));
        }
        $options = array('conditions' => array('ProductItem.' . $this->ProductItem->primaryKey => $id));
        $this->set('productItem', $this->ProductItem->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($productId = null) {

        $this->loadModel('Products');
        if (!$this->Products->exists($productId)) {
            throw new NotFoundException(__('Invalid product'));
        }

        if ($this->request->is('post')) {
            $this->autoRender = false;

            $this->ProductItem->create();
            if (!empty($this->request->data) && $this->ProductItem->save($this->request->data)) {

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The product item has been saved.')
                ]));
            } else {

                if (!$this->ProductItem->error) {
                    $this->ProductItem->error = __('The product could not be saved. Please, try again.');
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->ProductItem->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {

            $products = [];
            $arrProducts = $this->ProductItem->Product->find('all', [
                'conditions' => [
                    'Product.stockable' => 'Sim',
                    'Product.status' => 'Ativo',
                    'Product.id <> ' => $productId
                ]
            ]);
            foreach ($arrProducts as $product) {
                $products[$product['Product']['id']] = $product['Product']['name'] . " ({$product['Unit']['initials']})";
            }

            $items = $this->ProductItem->Item->find('list');
            $this->set(compact('items'));

            $this->set('items', $products);
            $this->set('productId', $productId);
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
        if (!$this->ProductItem->exists($id)) {
            throw new NotFoundException(__('Invalid product item'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if (!empty($this->request->data) && $this->ProductItem->save($this->request->data)) {

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('The product has been saved.')
                ]));
            } else {

                if (!$this->ProductItem->error) {
                    $this->ProductItem->error = __('The product item could not be saved. Please, try again.');
                }

                $this->response->body(json_encode([
                    'success' => false,
                    'message' => $this->ProductItem->error
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {
            $options = array('conditions' => array('ProductItem.' . $this->ProductItem->primaryKey => $id));
            $this->request->data = $this->ProductItem->find('first', $options);
            $this->set('ProductItem', $this->request->data);
        }

        $products = [];
        $arrProducts = $this->ProductItem->Product->find('all', [
            'conditions' => [
                'Product.stockable' => 'Sim',
                'Product.status' => 'Ativo'
            ]
        ]);
        foreach ($arrProducts as $product) {
            $products[$product['Product']['id']] = $product['Product']['name'] . " ({$product['Unit']['initials']})";
        }

        $this->set('items', $products);
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

        $this->ProductItem->id = $id;
        if (!$this->ProductItem->exists()) {
            throw new NotFoundException(__('Invalid product item'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ProductItem->delete()) {
            $this->response->body(json_encode([
                'success' => true,
                'message' => __('The product item has been deleted.')
            ]));
        } else {
            if (!$this->ProductItem->error) {
                $this->ProductItem->error = __('The product item could not be deleted. Please, try again.');
            }

            $this->response->body(json_encode([
                'success' => false,
                'message' => $this->ProductItem->error
            ]));
        }
    }

    public function getProductItems($productId = null) {
        $this->autoRender = false;

        $this->ProductItem->recursive = -1;
        $result = $this->ProductItem->find('all', [
            'joins' => [
                [
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'INNER',
                    'conditions' => [
                        'Product.id = ProductItem.item_id'
                    ]
                ],
                [
                    'table' => 'units',
                    'alias' => 'Unit',
                    'type' => 'INNER',
                    'conditions' => [
                        'Unit.id = Product.unit_id'
                    ]
                ],
            ],
            'conditions' => [
                "ProductItem.product_id" => $productId
            ],
            'fields' => ['ProductItem.*', 'Product.*', 'Unit.*']
        ]);
//        echo "<div class='text-left'>";
//        pr($result);
//        echo "</div>";

        return $result;
    }

}
