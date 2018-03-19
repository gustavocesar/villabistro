<?php

App::uses('AppModel', 'Model');

/**
 * Order Model
 *
 * @property User $User
 * @property Product $Product
 * @property Stage $Stage
 * @property Table $Table
 * @property Bill $Bill
 * @property StatusOrder $StatusOrder
 * @property Payment $Payment
 * @property Stock $Stock
 */
class Order extends AppModel {

    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        return true;
    }

    /**
     * Depois de Salvar
     * @param bool $created
     * @param array $options
     */
    public function afterSave($created, $options = array()) {
        parent::afterSave($created, $options);
    }

    /**
     * Antes de Excluir
     * @param bool $cascade
     * @return boolean
     */
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        return true;
    }

    /**
     * Depois de Excluir
     */
    public function afterDelete() {
        parent::afterDelete();

        $this->Stock->recursive = -1;
        $stocks = $this->Stock->find('all', [
            'conditions' => [
                "{$this->Stock->alias}.order_id" => $this->id
            ]
        ]);

        foreach ($stocks as $stock) {
            $this->Stock->id = $stock[$this->Stock->alias]['id'];
            if ($this->Stock->exists()) {
                $this->Stock->delete();
            }
        }
    }

    /**
     * Depois de Excluir
     */
    public function cancel() {

        if ($this->field('stage_id') == 5) {
            $this->error = __("The order could not be canceled because it's alteady canceled!");
            return false;
        }

        if ($this->field('status_order_id') == 2) {
            $this->error = __("The order could not be canceled because it's alteady paid out!");
            return false;
        }

        $this->saveField('stage_id', 5);
        $this->saveField('status_order_id', 2);

        $this->Stock->recursive = -1;
        $stocks = $this->Stock->find('all', [
            'conditions' => [
                "{$this->Stock->alias}.order_id" => $this->id
            ]
        ]);

        foreach ($stocks as $stock) {
            $this->Stock->id = $stock[$this->Stock->alias]['id'];
            if ($this->Stock->exists()) {
                $this->Stock->delete();
            }
        }

        return true;
    }

    public function finishItems() {
        $this->recursive = 1;
        $order = $this->findById($this->id);

        $locationClients = 2;
        $locationInventory = 100;

        $items = $this->Product->ProductItem->find('all', [
            'conditions' => [
                "{$this->Product->ProductItem->alias}.product_id" => $order['Product']['id']
            ],
            'order' => ["{$this->Product->ProductItem->alias}.id ASC"]
        ]);

        if (!empty($items)) {
            foreach ($items as $item) {
                $this->insertStock($order, $item, $locationClients, null);
                $this->insertStock($order, $item, $locationInventory, -1);
            }
        }

        if (isset($order['Product']['stockable']) && $order['Product']['stockable'] != 'Sim') {
            return true;
        }

        if (isset($order['Stage']['consider_as']) && $order['Stage']['consider_as'] != 'Concluídos') {
            return true;
        }

        $this->insertStock($order, null, $locationClients, null);
        $this->insertStock($order, null, $locationInventory, -1);
    }

    public function insertStock($order, $item = null, $locationId = null, $coefficient = null) {

        if (!$coefficient) {
            $coefficient = 1;
        }

        $orderQuantity = $order['Order']['quantity'];
        $itemQuantity = 1;

        if ($item) { //pedido de produto não estocável (movimentação do estoque dos componentes do produto)
            if (isset($item['Item']['stockable']) && $item['Item']['stockable'] != 'Sim') {
                return true;
            }

            $productId = $item['Item']['id'];
            $itemQuantity = $item['ProductItem']['quantity'];

            $recursiveItems = $this->Product->ProductItem->find('all', [
                'conditions' => [
                    "{$this->Product->ProductItem->alias}.product_id" => $item['ProductItem']['item_id']
                ],
                'order' => ["{$this->Product->ProductItem->alias}.id ASC"]
            ]);

            foreach ($recursiveItems as $recursiveItem) {
                $this->insertStock($order, $recursiveItem, $locationId, $coefficient);
            }
        } else { //produto estocável (movimentação do estoque do próprio produto)
            $productId = $order['Product']['id'];
        }

        $stockQuantity = $itemQuantity * $orderQuantity;

        $finishDate = date('Y-m-d H:i:s');

        $alias = $this->Stock->alias;

        $arrData = [];
        $arrData[$alias]['location_id'] = $locationId;
        $arrData[$alias]['order_id'] = $this->id;
        $arrData[$alias]['product_id'] = $productId;
        $arrData[$alias]['quantity'] = $stockQuantity * $coefficient;
        $arrData[$alias]['finished'] = $finishDate;
        $arrData[$alias]['value'] = null;
        $arrData[$alias]['internal_transfer_item_id'] = null;
        $arrData[$alias]['entry_note_item_id'] = null;

        $this->Stock->create();
        $this->Stock->save($arrData);
    }

    public function getOrdersByPaymentStatus($tableId = null, $billId = null, $arrPaymentStatus = null, $groupBy = null, $startDate = null, $endDate = null) {

        $conditions = [];

        if ($tableId) {
            $conditions = array_merge($conditions, [
                "Order.table_id" => $tableId
            ]);
        }

        if ($billId) {
            $conditions = array_merge($conditions, [
                "Order.bill_id" => $billId
            ]);
        }

        if ($arrPaymentStatus && count($arrPaymentStatus) > 0) {
            $conditions = array_merge($conditions, [
                "StatusOrders.id" => implode(",", $arrPaymentStatus)
            ]);
        }

        if ($startDate) {
            $date = DateTime::createFromFormat('d/m/Y', $startDate);
            $conditions = array_merge($conditions, [
                "Order.created >= " => $date->format('Y-m-d')." 00:00:00"
            ]);
        }

        if ($endDate) {
            $date = DateTime::createFromFormat('d/m/Y', $endDate);
            $conditions = array_merge($conditions, [
                "Order.created <= " => $date->format('Y-m-d')." 23:59:59"
            ]);
        }

        $arrResult = $this->find('all', [
            'joins' => [
                [
                    'table' => 'stages',
                    'alias' => 'Stages',
                    'type' => 'INNER',
                    'conditions' => [
                        'Stages.id = Order.stage_id'
                    ]
                ],
                [
                    'table' => 'users',
                    'alias' => 'Users',
                    'type' => 'INNER',
                    'conditions' => [
                        'Users.id = Order.user_id'
                    ]
                ],
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        'Products.id = Order.product_id'
                    ]
                ],
                [
                    'table' => 'status_orders',
                    'alias' => 'StatusOrders',
                    'type' => 'INNER',
                    'conditions' => [
                        'StatusOrders.id = Order.status_order_id'
                    ]
                ],
                [
                    'table' => 'bills',
                    'alias' => 'Bills',
                    'type' => 'LEFT',
                    'conditions' => [
                        'Bills.id = Order.bill_id'
                    ]
                ],
                [
                    'table' => 'tables',
                    'alias' => 'Tables',
                    'type' => 'LEFT',
                    'conditions' => [
                        'Bills.table_id = Tables.id'
                    ]
                ],
            ],
            'conditions' => $conditions,
            'fields' => ['Order.*', 'Stages.*', 'Users.*', 'Products.*', 'StatusOrders.*', 'Bills.*', 'Tables.*'],
            'order' => ['Order.status_order_id asc', 'Order.created desc', 'Order.id desc'],
            'group' => ['Order.id']
        ]);
//        debug($this->getDataSource()->getLog(false, false));

        if ($groupBy == 'product') {

            $arrGroupResult = [];
            foreach ($arrResult as $result) {
                $_order = $result['Order'];
//                $_stage = $result['Stages'];
//                $_user = $result['Users'];
                $_product = $result['Products'];
//                $_statusOrder = $result['StatusOrders'];
//                $_bill = $result['Bills'];
//                $_table = $result['Tables'];
                
                $_productId = $_product['id'];

                if ($_order['stage_id'] == 5) {
                    continue;
                }

                if (isset($arrGroupResult[$_productId])) {
                    $arrGroupResult[$_productId]['quantity']++;
                    $arrGroupResult[$_productId]['Products'] = $_product;
                } else {
                    $arrGroupResult[$_productId]['quantity'] = 1;
                    $arrGroupResult[$_productId]['Products'] = $_product;
                }
            }
//            pr($arrGroupResult);
//            die();

            return $arrGroupResult;
        }

        return $arrResult;
    }

    public function getPendingOrders($tableId = null, $billId = null, $startDate = null, $endDate = null) {

        $conditions = [];

        if ($tableId) {
            $conditions = array_merge($conditions, [
                "Order.table_id" => $tableId
            ]);
        }

        if ($billId) {
            $conditions = array_merge($conditions, [
                "Order.bill_id" => $billId
            ]);
        }

        if ($startDate) {
            $date = DateTime::createFromFormat('d/m/Y', $startDate);
            $conditions = array_merge($conditions, [
                "Order.created >= " => $date->format('Y-m-d')." 00:00:00"
            ]);
        }

        if ($endDate) {
            $date = DateTime::createFromFormat('d/m/Y', $endDate);
            $conditions = array_merge($conditions, [
                "Order.created <= " => $date->format('Y-m-d')." 23:59:59"
            ]);
        }

        $conditions = array_merge($conditions, [
            "Stages.consider_as" => "Pendentes"
        ]);

        $arrResult = $this->find('all', [
            'joins' => [
                [
                    'table' => 'stages',
                    'alias' => 'Stages',
                    'type' => 'INNER',
                    'conditions' => [
                        'Stages.id = Order.stage_id'
                    ]
                ],
                [
                    'table' => 'users',
                    'alias' => 'Users',
                    'type' => 'INNER',
                    'conditions' => [
                        'Users.id = Order.user_id'
                    ]
                ],
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        'Products.id = Order.product_id'
                    ]
                ],
                [
                    'table' => 'status_orders',
                    'alias' => 'StatusOrders',
                    'type' => 'INNER',
                    'conditions' => [
                        'StatusOrders.id = Order.status_order_id'
                    ]
                ],
                [
                    'table' => 'bills',
                    'alias' => 'Bills',
                    'type' => 'LEFT',
                    'conditions' => [
                        'Bills.id = Order.bill_id'
                    ]
                ],
                [
                    'table' => 'tables',
                    'alias' => 'Tables',
                    'type' => 'LEFT',
                    'conditions' => [
                        'Bills.table_id = Tables.id'
                    ]
                ],
            ],
            'conditions' => $conditions,
            'fields' => ['Order.*', 'Stages.*', 'Users.*', 'Products.*', 'StatusOrders.*', 'Bills.*', 'Tables.*'],
            'order' => ['Order.status_order_id asc', 'Order.created desc', 'Order.id desc'],
            'group' => ['Order.id']
        ]);
//        debug($this->getDataSource()->getLog(false, false));

        return $arrResult;
    }

    public function getCompletedOrders($tableId = null, $billId = null, $startDate = null, $endDate = null) {

        $conditions = [];

        if ($tableId) {
            $conditions = array_merge($conditions, [
                "Order.table_id" => $tableId
            ]);
        }

        if ($billId) {
            $conditions = array_merge($conditions, [
                "Order.bill_id" => $billId
            ]);
        }

        if ($startDate) {
            $date = DateTime::createFromFormat('d/m/Y', $startDate);
            $conditions = array_merge($conditions, [
                "Order.created >= " => $date->format('Y-m-d')." 00:00:00"
            ]);
        }

        if ($endDate) {
            $date = DateTime::createFromFormat('d/m/Y', $endDate);
            $conditions = array_merge($conditions, [
                "Order.created <= " => $date->format('Y-m-d')." 23:59:59"
            ]);
        }

        $conditions = array_merge($conditions, [
            "Stages.consider_as" => "Concluídos"
        ]);

        $arrResult = $this->find('all', [
            'joins' => [
                [
                    'table' => 'stages',
                    'alias' => 'Stages',
                    'type' => 'INNER',
                    'conditions' => [
                        'Stages.id = Order.stage_id'
                    ]
                ],
                [
                    'table' => 'users',
                    'alias' => 'Users',
                    'type' => 'INNER',
                    'conditions' => [
                        'Users.id = Order.user_id'
                    ]
                ],
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        'Products.id = Order.product_id'
                    ]
                ],
                [
                    'table' => 'status_orders',
                    'alias' => 'StatusOrders',
                    'type' => 'INNER',
                    'conditions' => [
                        'StatusOrders.id = Order.status_order_id'
                    ]
                ],
                [
                    'table' => 'bills',
                    'alias' => 'Bills',
                    'type' => 'LEFT',
                    'conditions' => [
                        'Bills.id = Order.bill_id'
                    ]
                ],
                [
                    'table' => 'tables',
                    'alias' => 'Tables',
                    'type' => 'LEFT',
                    'conditions' => [
                        'Bills.table_id = Tables.id'
                    ]
                ],
            ],
            'conditions' => $conditions,
            'fields' => ['Order.*', 'Stages.*', 'Users.*', 'Products.*', 'StatusOrders.*', 'Bills.*', 'Tables.*'],
            'order' => ['Order.status_order_id asc', 'Order.created desc', 'Order.id desc'],
            'group' => ['Order.id']
        ]);
//        debug($this->getDataSource()->getLog(false, false));

        return $arrResult;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'product_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'quantity' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'stage_id' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
        ),
        'status_order_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'kitchen_order' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Stage' => array(
            'className' => 'Stage',
            'foreignKey' => 'stage_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Table' => array(
            'className' => 'Table',
            'foreignKey' => 'table_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Bill' => array(
            'className' => 'Bill',
            'foreignKey' => 'bill_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'StatusOrder' => array(
            'className' => 'StatusOrder',
            'foreignKey' => 'status_order_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Payment' => array(
            'className' => 'Payment',
            'foreignKey' => 'payment_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Stock' => array(
            'className' => 'Stock',
            'foreignKey' => 'order_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
