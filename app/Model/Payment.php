<?php

App::uses('AppModel', 'Model');

/**
 * Payment Model
 *
 * @property Table $Table
 * @property Bill $Bill
 * @property Order $Order
 */
class Payment extends AppModel {

    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {
        parent::beforeSave($options);

        if (
                !isset($this->data[$this->alias]['bill_id']) ||
                empty($this->data[$this->alias]['bill_id']) ||
                !$this->data[$this->alias]['bill_id']
        ) {

            if (isset($this->data[$this->alias]['table_id'])) {
                $tableId = $this->data[$this->alias]['table_id'];
            } else {
                $tableId = $this->field('table_id');
            }

            $this->Table->id = $tableId;
            $bill = $this->Table->getCurrentBill();
            if (empty($bill)) {
                $bill = $this->Table->createBill();
            }

            $this->data[$this->alias]['bill_id'] = $bill['Bill']['id'];
        }

        if (isset($this->data[$this->alias]['subtotal'])) {
            $this->data[$this->alias]['subtotal'] = str_replace(".", "", $this->data[$this->alias]['subtotal']);
            $this->data[$this->alias]['subtotal'] = str_replace(",", ".", $this->data[$this->alias]['subtotal']);
        }

        if (isset($this->data[$this->alias]['payd_value'])) {
            $this->data[$this->alias]['payd_value'] = str_replace(".", "", $this->data[$this->alias]['payd_value']);
            $this->data[$this->alias]['payd_value'] = str_replace(",", ".", $this->data[$this->alias]['payd_value']);
        }

        if (isset($this->data[$this->alias]['payback'])) {
            $this->data[$this->alias]['payback'] = str_replace(".", "", $this->data[$this->alias]['payback']);
            $this->data[$this->alias]['payback'] = str_replace(",", ".", $this->data[$this->alias]['payback']);
        }

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

    public function getPaymentsByTable($tableId = null, $billId = null) {

        $conditions = [];

        if ($tableId) {
            $conditions = array_merge($conditions, [
                "{$this->alias}.table_id" => $tableId,
            ]);
        }

        if ($billId) {
            $conditions = array_merge($conditions, [
                "{$this->alias}.bill_id" => $billId
            ]);
        }

        $this->recursive = -1;
        return $this->find('all', [
            'conditions' => $conditions,
        ]);
    }

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
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
            'foreignKey' => 'payment_id',
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
