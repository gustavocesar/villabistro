<?php

App::uses('AppController', 'Controller');

/**
 * Stocks Controller
 *
 * @property Stock $Stock
 * @property PaginatorComponent $Paginator
 */
class StocksController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Paginator', 'RequestHandler'];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title', __('Stocks'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Stock->recursive = 0;
        $this->set('stocks', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Stock->exists($id)) {
            throw new NotFoundException(__('Invalid stock'));
        }
        $options = ['conditions' => ['Stock.' . $this->Stock->primaryKey => $id]];
        $this->set('stock', $this->Stock->find('first', $options));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function modal_edit($id = null) {
        $this->layout = 'modal';

        if (!$this->Stock->exists($id)) {
            throw new NotFoundException(__('Invalid stock'));
        }

        $options = ['conditions' => ["{$this->Stock->alias}." . $this->Stock->primaryKey => $id]];
        $this->Stock->recursive = 1;
        $stock = $this->Stock->find('first', $options);

        $options2 = ['conditions' => ["{$this->Stock->Product->alias}." . $this->Stock->Product->primaryKey => $stock['Product']['id']]];
        $this->Stock->Product->recursive = 1;
        $product = $this->Stock->Product->find('first', $options2);

        if ($this->request->is(['post', 'put'])) {

            if (isset($this->request->data['Stock'])) {

                $locationId = $this->request->data['Stock']['location_id'];
                $productId = $this->request->data['Stock']['product_id'];

                $manualAdjustment = $this->Stock->ManualAdjustment;
                $manualAdjustment->create();
                $returnSave = $manualAdjustment->save([
                    'ManualAdjustment' => [
                        'location_id' => $locationId
                    ]
                ]);

                App::import('Controller', 'Stocks');
                $StocksController = new StocksController();
                $arrResult = $StocksController->getStockQuantityByProduct($productId, $locationId);

                $currentQuantity = $arrResult['0']['0']['TotalQuantity'];

                $newQuantity = $this->request->data['Stock']['new_quantity'];
                $newQuantity = str_replace('.', '', $newQuantity);
                $newQuantity = str_replace(',', '.', $newQuantity);

                $diffToNewQuantity = $newQuantity - $currentQuantity;

                $alias = $this->Stock->alias;

                $arrData = [];
                $arrData[$alias]['manual_adjustment_id'] = $returnSave['ManualAdjustment']['id'];
                $arrData[$alias]['location_id'] = $locationId;
                $arrData[$alias]['product_id'] = $productId;
                $arrData[$alias]['quantity'] = $diffToNewQuantity;
                $arrData[$alias]['finished'] = date('Y-m-d H:i:s');
                $arrData[$alias]['value'] = null;
                $arrData[$alias]['entry_note_item_id'] = null;
                $arrData[$alias]['order_id'] = null;
                $arrData[$alias]['internal_transfer_item_id'] = null;

                $this->Stock->create();
                $this->Stock->save($arrData);

                $this->response->body(json_encode([
                    'success' => true,
                    'message' => __('Manual Adjustment has been done.')
                ]));
            } else {
                $this->response->body(json_encode([
                    'success' => false,
                    'message' => __('The Manual Adjustment could not be done. Please, try again.')
                ]));
            }

            $this->response->send();
            $this->_stop();
        } else {
            $locations = $this->Stock->Location->find('list');
            $products = $this->Stock->Product->find('list');
            $entryNoteItems = $this->Stock->EntryNoteItem->find('list');
            $internalTransferItems = $this->Stock->InternalTransferItem->find('list');
            $orders = $this->Stock->Order->find('list');
            $this->set(compact('locations', 'products', 'entryNoteItems', 'internalTransferItems', 'orders'));

            $this->set('stock', $stock);
            $this->set('product', $product);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Stock->id = $id;
        if (!$this->Stock->exists()) {
            throw new NotFoundException(__('Invalid stock'));
        }

        $this->Stock->error = __("The stock registers can not be deleted manually!");
        $this->Flash->error($this->Stock->error);
        return $this->redirect(['action' => 'index']);
    }

    public function stock_control() {
        $title = __('Stock Control');
        $this->set('title', $title);
        $this->set('activeStockControl', 'active');

        $arrLocations = $this->getListLocation();
        $this->set('arrLocations', $arrLocations);
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => $title,
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);
    }

    public function stock_details($id = null) {
        $this->set('title', __('Stock Control (Movements)'));

        if (!$this->Stock->exists($id)) {
            throw new NotFoundException(__('Invalid stock'));
        }
        
        $this->set('arrayBreadCrumb', [
            0 => [
                'label' => __('Stock Control'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => 'stock_control',
                    'params' => []
                ]
            ],
            1 => [
                'label' => __('Movements'),
                'link' => [
                    'controller' => $this->params['controller'],
                    'action' => $this->params['action'],
                    'params' => []
                ]
            ]
        ]);

        $this->Stock->recursive = -1;
        $stock = $this->Stock->findById($id);

        $this->Stock->Location->recursive = -1;
        $location = $this->Stock->Location->findById($stock['Stock']['location_id']);

        $this->Stock->Product->recursive = -1;
        $product = $this->Stock->Product->findById($stock['Stock']['product_id']);

        $this->Stock->Product->Unit->recursive = -1;
        $unit = $this->Stock->Product->Unit->findById($product['Product']['unit_id']);

        $this->Stock->recursive = -1;
        $stocks = $this->Stock->find('all', [
            'conditions' => [
                "Stock.location_id = " . $location['Location']['id'],
                "Stock.product_id  = " . $product['Product']['id']
            ],
            'order' => ["Stock.finished DESC", "Stock.id DESC"]
        ]);

        $this->set(compact('location', 'product', 'unit', 'stocks'));

        switch ($location['Location']['id']) {
            case Location::FORNECEDORES:
                $this->render('stock_details_suppliers');
                break;
            case Location::CLIENTES:
                $this->render('stock_details_clients');
                break;
            case Location::PERDAS:
                $this->render('stock_details_losses');
                break;

            default:
                $this->render('stock_details');
                break;
        }
    }

    public function getListLocation() {
        $this->Stock->Location->recursive = 0;
        $result = $this->Stock->Location->find('all', [
            'order' => ["{$this->Stock->Location->LocationType->alias}.id ASC", "{$this->Stock->Location->alias}.id ASC"]
        ]);

        return $result;
    }

    public function get_list_stock_by_location($elementId) {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {

            $arrDados = explode('_', $elementId);
            $locationId = $arrDados[1];

            switch ($locationId) {
                case 1:
                    $this->listStockSuppliers($locationId);
                    break;
                case 2:
                    $this->listStockClients($locationId);
                    break;
                case 3:
                    $this->listStockLosses($locationId);
                    break;

                default:
                    $this->listStock($locationId);
                    break;
            }
        }
    }

    public function listStock($locationId = null) {
        $this->Paginator->settings = [
            'joins' => [
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        "Products.id = {$this->Stock->alias}.product_id"
                    ]
                ],
                [
                    'table' => 'units',
                    'alias' => 'Units',
                    'type' => 'INNER',
                    'conditions' => [
                        'Units.id = Products.unit_id'
                    ]
                ],
            ],
            'fields' => [
                "{$this->Stock->alias}.*",
                "Products.*",
                "Units.*",
                "SUM({$this->Stock->alias}.quantity) AS TotalQuantity",
                "SUM({$this->Stock->alias}.value) AS TotalValue"
            ],
            'conditions' => [
                "Products.status='Ativo'", "Products.stockable='Sim'",
                "{$this->Stock->alias}.location_id = {$locationId}"
            ],
            'group' => ['Products.id'],
            'order' => ['Products.name asc', 'Units.initials asc'],
            'limit' => 9999999
        ];

        $this->Stock->recursive = 0;
        $this->set('arrListStock', $this->Paginator->paginate());

        $this->autoRender = false;
        $this->render('ajax/list-stock-by-location', 'ajax');
    }

    public function listStockSuppliers($locationId = null) {
        $this->Paginator->settings = [
            'joins' => [
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        "Products.id = {$this->Stock->alias}.product_id"
                    ]
                ],
                [
                    'table' => 'units',
                    'alias' => 'Units',
                    'type' => 'INNER',
                    'conditions' => [
                        'Units.id = Products.unit_id'
                    ]
                ],
            ],
            'fields' => [
                "{$this->Stock->alias}.*",
                "Products.*",
                "Units.*",
                "SUM({$this->Stock->alias}.quantity) AS TotalQuantity",
                "SUM({$this->Stock->alias}.value) AS TotalValue"
            ],
            'conditions' => [
                "Products.status='Ativo'", "Products.stockable='Sim'",
                "{$this->Stock->alias}.location_id = {$locationId}"
            ],
            'group' => ['Products.id'],
            'order' => ['Products.name asc', 'Units.initials asc'],
            'limit' => 9999999
        ];

        $this->Stock->recursive = 0;
        $this->set('arrListStock', $this->Paginator->paginate());

        $this->autoRender = false;
        $this->render('ajax/list-stock-by-location-suppliers', 'ajax');
    }

    public function listStockClients($locationId = null) {
        $this->Paginator->settings = [
            'joins' => [
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        "Products.id = {$this->Stock->alias}.product_id"
                    ]
                ],
                [
                    'table' => 'units',
                    'alias' => 'Units',
                    'type' => 'INNER',
                    'conditions' => [
                        'Units.id = Products.unit_id'
                    ]
                ],
            ],
            'fields' => [
                "{$this->Stock->alias}.*",
                "Products.*",
                "Units.*",
                "SUM({$this->Stock->alias}.quantity) AS TotalQuantity",
                "SUM({$this->Stock->alias}.value) AS TotalValue"
            ],
            'conditions' => [
                "Products.status='Ativo'", "Products.stockable='Sim'",
                "{$this->Stock->alias}.location_id = {$locationId}"
            ],
            'group' => ['Products.id'],
            'order' => ['Products.name asc', 'Units.initials asc'],
            'limit' => 9999999
        ];

        $this->Stock->recursive = 0;
        $this->set('arrListStock', $this->Paginator->paginate());

        $this->autoRender = false;
        $this->render('ajax/list-stock-by-location-clients', 'ajax');
    }

    public function listStockLosses($locationId = null) {
        $this->Paginator->settings = [
            'joins' => [
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        "Products.id = {$this->Stock->alias}.product_id"
                    ]
                ],
                [
                    'table' => 'units',
                    'alias' => 'Units',
                    'type' => 'INNER',
                    'conditions' => [
                        'Units.id = Products.unit_id'
                    ]
                ],
            ],
            'fields' => [
                "{$this->Stock->alias}.*",
                "Products.*",
                "Units.*",
                "SUM({$this->Stock->alias}.quantity) AS TotalQuantity",
                "SUM({$this->Stock->alias}.value) AS TotalValue"
            ],
            'conditions' => [
                "Products.status='Ativo'", "Products.stockable='Sim'",
                "{$this->Stock->alias}.location_id = {$locationId}"
            ],
            'group' => ['Products.id'],
            'order' => ['Products.name asc', 'Units.initials asc'],
            'limit' => 9999999
        ];

        $this->Stock->recursive = 0;
        $this->set('arrListStock', $this->Paginator->paginate());

        $this->autoRender = false;
        $this->render('ajax/list-stock-by-location-losses', 'ajax');
    }

    public function getStockQuantityByProduct($productId, $locationId=null) {
        $this->autoRender = false;

        return $this->Stock->getStockQuantityByProduct($productId, $locationId);
    }

    public function drawLineChartGlobalInventory() {
        header('Content-Type: text/html; charset=ISO-8859-15');
        
        $this->autoRender = false;

        if (!$this->request->is('ajax')) {
            return false;
        }
        
        $arrDate = [
            date('d/m', strtotime("-7 days")) => date('d/m/Y', strtotime("-7 days")),
            date('d/m', strtotime("-6 days")) => date('d/m/Y', strtotime("-6 days")),
            date('d/m', strtotime("-5 days")) => date('d/m/Y', strtotime("-5 days")),
            date('d/m', strtotime("-4 days")) => date('d/m/Y', strtotime("-4 days")),
            date('d/m', strtotime("-3 days")) => date('d/m/Y', strtotime("-3 days")),
            date('d/m', strtotime("-2 days")) => date('d/m/Y', strtotime("-2 days")),
            date('d/m', strtotime("-1 days")) => date('d/m/Y', strtotime("-1 days")),
            date('d/m') => date('d/m/Y'),
        ];
        
        $arrProducts = $this->Stock->Product->find('list', [
            'conditions' => [
                'Product.stockable' => 'Sim',
                'Product.status' => 'Ativo'
            ],
            'order' => ['Product.name']
        ]);
        
        $arrData = [];
        foreach ($arrDate as $date => $fullDate) {
            $arrProducPerDate = [$date];
            foreach ($arrProducts as $productId => $productName) {
                
                $arrResult = $this->Stock->getStockQuantityByProduct($productId, null, $fullDate, [1]);
                
                if (isset($arrResult['0']['0']['TotalQuantity'])) {
                    $quantityByDate = $arrResult['0']['0']['TotalQuantity'];
                } else {
                    $quantityByDate = "0";
                }
                
                $arrProducPerDate = array_merge($arrProducPerDate, [$quantityByDate]);
            }
            
            $arrData[] = $arrProducPerDate;
            
        }
        
        $arrComuns = [];
        foreach ($arrProducts as $productId => $productName) {
            $arrComuns[] = $productName;
        }
        
        $this->response->body(json_encode([
            'success' => true,
            'arrData' => $arrData,
            'arrComuns' => $arrComuns
        ]));
        
        $this->response->send();
        $this->_stop();
    }

}
