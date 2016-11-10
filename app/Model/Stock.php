<?php

App::uses('AppModel', 'Model');

/**
 * Stock Model
 *
 * @property Location $Location
 * @property Product $Product
 * @property EntryNoteItem $EntryNoteItem
 * @property InternalTransferItem $InternalTransferItem
 * @property Order $Order
 * @property ManualAdjustment $ManualAdjustment
 */
class Stock extends AppModel {
    
    public $virtualFields = [
        "reference" => "
            CASE
                WHEN entry_note_item_id IS NOT NULL         THEN 'Nota de Entrada'
                WHEN internal_transfer_item_id IS NOT NULL  THEN 'Transferencia Interna'
                WHEN manual_adjustment_id IS NOT NULL       THEN 'Ajuste Manual'
                WHEN order_id IS NOT NULL                   THEN 'Pedido'
                ELSE ''
            END
        ",
        "reference_id" => "
            CASE
                WHEN entry_note_item_id IS NOT NULL         THEN entry_note_item_id
                WHEN internal_transfer_item_id IS NOT NULL  THEN internal_transfer_item_id
                WHEN manual_adjustment_id IS NOT NULL       THEN manual_adjustment_id
                WHEN order_id IS NOT NULL                   THEN order_id
                ELSE null
            END
        ",
    ];

    /**
     * Antes de Excluir
     * @param bool $cascade
     * @return boolean
     */
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
    }

    /**
     * Retorna o primeiro registro de Estoque relacionado ao Item da Nota de Entrada
     * Usado no BeforeSave da classe EntryNoteItem.php
     * @param type $entryNoteItem
     * @return type
     */
    public function getStockByEntryNoteItem($entryNoteItem = null) {

        if (!$entryNoteItem) {
            return null;
        }

        if (isset($entryNoteItem['EntryNoteItem'])) {
            $entryNoteItem = $entryNoteItem['EntryNoteItem'];
        }

        $this->recursive = 1;
        $stock = $this->find('first', [
            'conditions' => [
                "{$this->alias}.entry_note_item_id" => $entryNoteItem['id']
            ]
        ]);

        return $stock;
    }

    public function getStockQuantityByProduct($productId, $locationId=null, $date=null, $arrLocationType=null) {
        $conditions = [
            "{$this->alias}.product_id = " . $productId
        ];
        
        if ($locationId) {
            $conditions = array_merge($conditions, [
                "{$this->alias}.location_id = " . $locationId
            ]);
        }
        
        if ($date) {
            $arrDate = explode('/', $date);
            $newDate = $arrDate['2'].'-'.$arrDate['1'].'-'.$arrDate['0'];
            
            $conditions = array_merge($conditions, [
                "DATE({$this->alias}.finished) <= '{$newDate}'"
            ]);
        }
        
        if ($arrLocationType) {
            $conditions = array_merge($conditions, [
                ["{$this->Location->LocationType->alias}.id" => $arrLocationType]
            ]);
        }

        $this->recursive = -1;
        $result = $this->find('all', [
            'joins' => [
                [
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'INNER',
                    'conditions' => [
                        "{$this->alias}.product_id = Product.id"
                    ]
                ],
                [
                    'table' => 'locations',
                    'alias' => 'Location',
                    'type' => 'INNER',
                    'conditions' => [
                        "{$this->alias}.location_id = Location.id"
                    ]
                ],
                [
                    'table' => 'location_types',
                    'alias' => 'LocationType',
                    'type' => 'INNER',
                    'conditions' => [
                        "{$this->Location->alias}.location_type_id = LocationType.id"
                    ]
                ],
            ],
            'fields' => [
                "DISTINCT {$this->alias}.*",
                "Product.*",
                "SUM({$this->alias}.quantity) AS TotalQuantity",
            ],
            'conditions' => $conditions,
            'order' => ["{$this->alias}.id desc"]
        ]);
            
        return $result;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'location_id' => array(
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
        'value' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
        ),
        'finished' => array(
            'datetime' => array(
                'rule' => array('datetime'),
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
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id',
        ),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
        ),
        'EntryNoteItem' => array(
            'className' => 'EntryNoteItem',
            'foreignKey' => 'entry_note_item_id',
        ),
        'InternalTransferItem' => array(
            'className' => 'InternalTransferItem',
            'foreignKey' => 'internal_transfer_item_id',
        ),
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_id',
        ),
        'ManualAdjustment' => array(
            'className' => 'ManualAdjustment',
            'foreignKey' => 'manual_adjustment_id',
        )
    );

}
