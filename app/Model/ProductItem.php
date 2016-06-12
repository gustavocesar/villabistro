<?php

App::uses('AppModel', 'Model');

/**
 * ProductItem Model
 *
 * @property Product $Product
 * @property Item $Item
 */
class ProductItem extends AppModel {

    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);

        if (isset($this->data[$this->alias]['item_id'])) {
            $this->recursive = 0;
            
            $conditions = [
                "{$this->alias}.product_id" => $this->data[$this->alias]['product_id'],
                "{$this->alias}.item_id" => $this->data[$this->alias]['item_id'],
            ];
                
            if (isset($this->data[$this->alias]['id'])) {
                $conditions = array_merge($conditions, ["{$this->alias}.id <> " => $this->data[$this->alias]['id']]);
            }
            
            $countItem = $this->find('count', [
                'conditions' => $conditions
            ]);

            if ($countItem > 0) {
                $this->error = __("This component has already been added to product!");
                return false;
            }
        }

        if (isset($this->data[$this->alias]['quantity'])) {
            $this->data[$this->alias]['quantity'] = str_replace(".", "", $this->data[$this->alias]['quantity']);
            $this->data[$this->alias]['quantity'] = str_replace(",", ".", $this->data[$this->alias]['quantity']);
        }

        return true;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
        'item_id' => array(
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
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Item' => array(
            'className' => 'Product',
            'foreignKey' => 'item_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
