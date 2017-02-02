    <?php

App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 * @property Subcategory $Subcategory
 * @property Unit $Unit
 * @property EntryNoteItem $EntryNoteItem
 * @property Order $Order
 * @property ProductItem $ProductItem
 * @property Stock $Stock
 */
class Product extends AppModel {
    
    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);
        
        if (isset($this->data[$this->alias]['cost_price'])) {
            $costPrice = $this->data[$this->alias]['cost_price'];
            $costPrice = str_replace(".", "", $costPrice);
            $costPrice = str_replace(",", ".", $costPrice);

            $this->data[$this->alias]['cost_price'] = $costPrice;
        }
        
        if (isset($this->data[$this->alias]['sell_price'])) {
            $sellPrice = $this->data[$this->alias]['sell_price'];
            $sellPrice = str_replace(".", "", $sellPrice);
            $sellPrice = str_replace(",", ".", $sellPrice);
            
            $this->data[$this->alias]['sell_price'] = $sellPrice;
        }
        
        if (isset($this->data[$this->alias]['minimum_stock'])) {
            $minStock = $this->data[$this->alias]['minimum_stock'];
            $minStock = str_replace(".", "", $minStock);
            $minStock = str_replace(",", ".", $minStock);
            
            $this->data[$this->alias]['minimum_stock'] = $minStock;
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

        $this->insertEmptyStock();
    }

    public function insertEmptyStock() {

        $this->recursive = -1;
        $product = $this->findById($this->id);

        if ($product['Product']['stockable'] <> 'Sim') {
            return true;
        }

        $this->Stock->recursive = 0;
        
        /**
         * Quantidade de localizações o produto já possui movimentação.
         * Se houver alguma localização em que o produto não movimentou, inserir o stock zerado
         */
        $countStocksLocations = $this->Stock->find('count', [
            'fields' => [
                "{$this->Stock->alias}.location_id",
                "COUNT({$this->Stock->alias}.id) AS count"
            ],
            'conditions' => [
                "{$this->Stock->alias}.product_id" => $this->id
            ],
            'group' => [
                "{$this->Stock->alias}.location_id"
            ],
        ]);

        $this->Stock->Location->recursive = 0;
        $arrLocations = $this->Stock->Location->find('all');
        $countLocations = count($arrLocations);

        if ($countStocksLocations < $countLocations) {

            foreach ($arrLocations as $location) {
                
                $count = $this->Stock->find('count', [
                    'fields' => [
                        "{$this->Stock->alias}.location_id",
                        "COUNT({$this->Stock->alias}.id) AS count"
                    ],
                    'conditions' => [
                        "{$this->Stock->alias}.product_id" => $this->id,
                        "{$this->Stock->alias}.location_id" => $location['Location']['id']
                    ],
                    'group' => [
                        "{$this->Stock->alias}.location_id"
                    ],
                ]);

                if ($count <= 0) {
                    $arrData = [];
                    $arrData[$this->Stock->alias]['location_id']           = $location['Location']['id'];
                    $arrData[$this->Stock->alias]['product_id']            = $this->id;
                    $arrData[$this->Stock->alias]['quantity']              = '0';
                    $arrData[$this->Stock->alias]['value']                 = '0';
                    $arrData[$this->Stock->alias]['finished']              = date('Y-m-d H:i:s');

                    $this->Stock->create();
                    $this->Stock->save($arrData);
                }
            }

        }
    }
    
    /**
     * Depois do Find
     * @param mixed $results
     * @param bool $primary
     */
    public function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
        
        foreach ($results as $key => $val) {
            if (isset($val['Product']['stockable']) && $val['Product']['stockable'] != "Sim") {
                $results[$key]['Product']['minimum_stock'] = '';
            }
        }
        
        return $results;
    }
    
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'subcategory_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'unit_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
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
        'cost_price' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
        ),
        'sell_price' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
        ),
        'avaliable_to_order' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'minimum_stock' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
        ),
        'stockable' => array(
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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Subcategory' => array(
            'className' => 'Subcategory',
            'foreignKey' => 'subcategory_id',
            'conditions' => '',
            'fields' => '',
            'order' => 'Subcategory.name ASC'
        ),
        'Unit' => array(
            'className' => 'Unit',
            'foreignKey' => 'unit_id',
            'conditions' => '',
            'fields' => '',
            'order' => 'Unit.name ASC'
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'EntryNoteItem' => array(
            'className' => 'EntryNoteItem',
            'foreignKey' => 'product_id',
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
            'foreignKey' => 'product_id',
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
        'ProductItem' => array(
            'className' => 'ProductItem',
            'foreignKey' => 'product_id',
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
        'Stock' => array(
            'className' => 'Stock',
            'foreignKey' => 'product_id',
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
