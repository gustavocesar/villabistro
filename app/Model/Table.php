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

    public function getHistory() {
        $sql = "
            select
                'order' as origin,
                bi.id as bill,
                od.quantity as quantity,
                concat(pr.name, ' (', un.initials, ')') as product,
                st.name as stage,
                us.name as attendant,
                so.name as status_order,
                so.id as status_order_id,
                pr.cost_price as value,
                1 as qtd_orders,
                0 as qtd_payments,
                od.created
            from bills as bi
            inner join tables as ta on ta.id = bi.table_id
            inner join orders as od on od.bill_id = bi.id
            inner join stages as st on st.id = od.stage_id
            inner join products as pr on pr.id = od.product_id
            inner join units as un on un.id = pr.unit_id
            inner join users as us on us.id = od.user_id
            inner join status_orders as so on so.id = od.status_order_id
            where ta.id = {$this->id}

            union

            select
                'payment' as origin,
                bi.id as bill,
                '' as quantity,
                '' as product,
                '' as stage,
                '' as attendant,
                '' as status_order,
                '' as status_order_id,
                pa.payd_value - pa.payback as value,
                0 as qtd_orders,
                1 as qtd_payments,
                pa.created
            from payments as pa
            inner join bills as bi on bi.id = pa.bill_id
            inner join tables ta on ta.id = bi.table_id
            where ta.id = {$this->id}

            order by bill, created
        ";

        return $this->query($sql);
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
