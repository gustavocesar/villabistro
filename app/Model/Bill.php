<?php

App::uses('AppModel', 'Model');

/**
 * Bill Model
 *
 * @property StatusBill $StatusBill
 * @property Table $Table
 * @property Order $Order
 * @property Payment $Payment
 */
class Bill extends AppModel {

    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
    }

    public function close() {
        $countPendingOrders = $this->countPendingOrders();
        $sumPendingTotal = $this->sumPendingTotal();
        $sumTotalPayd = $this->sumTotalPayd();
        
        $balance = $sumPendingTotal - $sumTotalPayd;

        if (
                $countPendingOrders <= 0 ||
                $balance <= 0
        ) {
            
            $this->Order->recursive = 0;
            $pendingOrders = $this->Order->find('all', [
                'conditions' => [
                    'Order.bill_id' => $this->id,
                    'Order.status_order_id' => 1
                ]
            ]);
            
            foreach ($pendingOrders as $order) {
                $this->Order->id = $order['Order']['id'];
                $this->Order->saveField('status_order_id', 2);
                $this->Order->saveField('modified', date('Y-m-d H:i:s'));
            }
            
            $this->saveField('status_bill_id', 2);
            $this->saveField('modified', date('Y-m-d H:i:s'));
        }
    }

    public function countPendingOrders() {
        $this->Order->recursive = -1;
        $result = $this->Order->find('count', [
            'conditions' => [
                "{$this->Order->alias}.bill_id" => $this->id,
                "{$this->Order->alias}.status_order_id" => 1
            ]
        ]);
        return $result;
    }

    public function sumPendingTotal() {
        $this->Order->recursive = 0;
        $result = $this->Order->find('all', [
            'conditions' => [
                "{$this->Order->alias}.bill_id" => $this->id,
                "{$this->Order->alias}.status_order_id" => 1
            ],
            'fields' => [
                "SUM(Product.sell_price * Order.quantity) AS PendingTotal"
            ],
        ]);

        return $result[0][0]['PendingTotal'];
    }

    public function sumTotalPayd() {
        $this->Payment->recursive = 0;
        $result = $this->Payment->find('all', [
            'conditions' => [
                "{$this->Payment->alias}.bill_id" => $this->id
            ],
            'fields' => [
                "SUM(Payment.payd_value) AS TotalPayd"
            ],
        ]);

        return $result[0][0]['TotalPayd'];
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'status_bill_id' => array(
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
        'StatusBill' => array(
            'className' => 'StatusBill',
            'foreignKey' => 'status_bill_id',
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
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'bill_id',
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
        'Payment' => array(
            'className' => 'Payment',
            'foreignKey' => 'bill_id',
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
