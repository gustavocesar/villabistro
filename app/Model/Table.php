<?php

App::uses('AppModel', 'Model');

/**
 * Table Model
 *
 * @property Bill $Bill
 * @property Order $Order
 */
class Table extends AppModel {

    /**
     * Depois de Salvar
     * @param bool $created
     * @param array $options
     */
    public function afterSave($created, $options = array()) {
        parent::afterSave($created, $options);
        Cache::delete('all_tables');
    }

    /**
     * Depois de Excluir
     */
    public function afterDelete() {
        parent::afterDelete();
        Cache::delete('all_tables');
    }

    public function getAllTables() {

        $result = Cache::read('all_tables');
        if (!$result) {
            $this->recursive = -1;
            $result = $this->find('all', [
                'order' => ['name'],
            ]);

            Cache::write('all_tables', $result);
        }
        return $result;
    }

    public function getBills($statusBillId = null) {
        $this->Bill->recursive = 0;

        $conditions = [
            'table_id' => $this->id
        ];

        if (count($statusBillId) > 0) {
            $conditions = array_merge($conditions, [
                "{$this->Bill->alias}.status_bill_id" => $statusBillId
            ]);
        }

        $result = $this->Bill->find('all', [
            'conditions' => $conditions,
        ]);

        return $result;
    }

    public function createBill() {
        $this->Bill->create();
        $bill = $this->Bill->save([
            'Bill' => [
                'status_bill_id' => 1,
                'table_id' => $this->id,
                'identifier' => 'I'
            ]
        ]);

        $orders = $this->Order->find('all', [
            'conditions' => [
                'Order.table_id' => $this->id,
                'Order.status_order_id <>' => 2
            ]
        ]);

        if (count($orders) > 0) {
            foreach ($orders as $order) {
                $this->Order->id = $order['Order']['id'];
                $this->Order->saveField('bill_id', $bill['Bill']['id']);
            }
        }

        return $bill;
    }

    public function getCurrentBill() {
        $this->Bill->recursive = 0;
        $bill = $this->Bill->find('first', [
            'conditions' => [
                "{$this->Bill->alias}.table_id" => $this->id,
                "{$this->Bill->alias}.status_bill_id" => 1
            ]
        ]);

        return $bill;
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
        'Bill' => array(
            'className' => 'Bill',
            'foreignKey' => 'table_id',
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
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'table_id',
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
