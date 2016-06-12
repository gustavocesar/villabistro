<?php

App::uses('AppModel', 'Model');

/**
 * InternalTransferItem Model
 *
 * @property InternalTransfer $InternalTransfer
 * @property Product $Product
 * @property Stock $Stock
 */
class InternalTransferItem extends AppModel {

    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);
        
        $this->InternalTransfer->recursive = 0;
        $internalTransfer = $this->InternalTransfer->find('first', [
            'conditions' => [
                "{$this->InternalTransfer->alias}.{$this->InternalTransfer->primaryKey}" => $this->data[$this->alias]['internal_transfer_id']
            ]
        ]);

        if ($internalTransfer) {

            if ($internalTransfer[$this->InternalTransfer->StatusInternalTransfer->alias]['finish'] == StatusInternalTransfer::SIM) {
                $this->error = __("The operation could not be done because the Internal Transfer is Completed!");
                return false;
            }
        }

        if (isset($this->data[$this->alias]['quantity'])) {
            $this->data[$this->alias]['quantity'] = str_replace(".", "", $this->data[$this->alias]['quantity']);
            $this->data[$this->alias]['quantity'] = str_replace(",", ".", $this->data[$this->alias]['quantity']);
        }

        if (isset($this->data['InternalTransferItem']['internal_transfer_id'])) {

            $this->InternalTransfer->recursive = 1;
            $internalTransfer = $this->InternalTransfer->find('first', [
                'conditions' => [
                    $this->InternalTransfer->alias . '.' . $this->InternalTransfer->primaryKey => $this->data['InternalTransferItem']['internal_transfer_id']
                ]
            ]);

            if ($internalTransfer) {

                if ($internalTransfer[$this->InternalTransfer->StatusInternalTransfer->alias]['finish'] == StatusInternalTransfer::SIM) {
                    $this->error = __("The operation could not be done because the Internal Transfer is Completed!");
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Antes de Excluir
     * @param bool $cascade
     * @return boolean
     */
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);

        $this->recursive = 2;
        $this->data = $this->find('first', [
            'conditions' => [
                "{$this->alias}.{$this->primaryKey}" => $this->id
            ]
        ]);

        if ($this->data) {

            if (
                    isset($this->data['InternalTransfer']['StatusInternalTransfer']['finish']) &&
                    $this->data['InternalTransfer']['StatusInternalTransfer']['finish'] == StatusInternalTransfer::SIM
            ) {
                $this->error = __("The operation could not be done because the Internal Transfer is Completed!");
                return false;
            }
        }

        return true;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'internal_transfer_id' => array(
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
//            'numeric' => array(
//                'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'InternalTransfer' => array(
            'className' => 'InternalTransfer',
            'foreignKey' => 'internal_transfer_id',
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
            'foreignKey' => 'internal_transfer_item_id',
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
