<?php

App::uses('AppModel', 'Model');

/**
 * Stage Model
 *
 * @property Order $Order
 * @property Subcategory $Subcategory
 */
class Stage extends AppModel {

    public function getKitchenStages() {
        $result = $this->find('all', [
            'conditions' => ["Stage.status='Ativo'", "Stage.show_on_kitchen='Sim'"],
            'order' => ['Stage.id asc']
        ]);

        return $result;
    }

    public function getOrders() {

        $stage = $this->findById($this->id);

        $limit = null;
        if ($stage['Stage']['consider_as'] != "Pendentes") {
            $limit = 10;
        }

        $this->Order->recursive = 0;
        $result = $this->Order->find('all', [
            'joins' => [
                [
                    'table' => 'products',
                    'alias' => 'Products',
                    'type' => 'INNER',
                    'conditions' => [
                        'Order.product_id = Products.id'
                    ]
                ],
                [
                    'table' => 'tables',
                    'alias' => 'Tables',
                    'type' => 'INNER',
                    'conditions' => [
                        'Tables.id = Order.table_id'
                    ]
                ],
            ],
            'fields' => ['Order.*', 'Products.*', 'Tables.*'],
            'conditions' => [
                "Order.stage_id = " . $this->id,
                "Order.status_order_id <> 2"
            ],
            'limit' => $limit,
            'order' => ['Order.kitchen_order asc', 'Order.id asc']
        ]);

        return $result;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
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
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'stage_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Subcategory' => array(
            'className' => 'Subcategory',
            'foreignKey' => 'stage_id',
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
