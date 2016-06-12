<?php

App::uses('AppModel', 'Model');

/**
 * EntryNoteItem Model
 *
 * @property EntryNote $EntryNote
 * @property Product $Product
 * @property Location $Location
 * @property Stock $Stock
 */
class EntryNoteItem extends AppModel {
    
    public $virtualFields = [
        "unit_cost_formatted" => "TRUNCATE(EntryNoteItem.unit_cost, 3)",
        "total_cost_formatted" => "TRUNCATE(EntryNoteItem.total_cost, 3)"
    ];

    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);

        $this->EntryNote->recursive = 0;
        $entryNote = $this->EntryNote->findById($this->data[$this->alias]['entry_note_id']);

        if ($entryNote) {

            if ($entryNote[$this->EntryNote->StatusEntryNote->alias]['finish'] == StatusEntryNote::SIM) {
                $this->error = __("The operation could not be done because the Entry Note is Completed!");
                return false;
            }
        }

        if (isset($this->data[$this->alias]['quantity'])) {
            $this->data[$this->alias]['quantity'] = str_replace(".", "", $this->data[$this->alias]['quantity']);
            $this->data[$this->alias]['quantity'] = str_replace(",", ".", $this->data[$this->alias]['quantity']);
        }

        if (isset($this->data[$this->alias]['unit_cost'])) {
            $this->data[$this->alias]['unit_cost'] = str_replace(".", "", $this->data[$this->alias]['unit_cost']);
            $this->data[$this->alias]['unit_cost'] = str_replace(",", ".", $this->data[$this->alias]['unit_cost']);
        }

        if (isset($this->data[$this->alias]['total_cost'])) {
            $this->data[$this->alias]['total_cost'] = str_replace(".", "", $this->data[$this->alias]['total_cost']);
            $this->data[$this->alias]['total_cost'] = str_replace(",", ".", $this->data[$this->alias]['total_cost']);
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
        
        $this->moveStock(end($this->data), 1);
    }

    /**
     * Antes de Excluir
     * @param bool $cascade
     * @return boolean
     */
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);

        $this->recursive = 2;
        $this->data = $this->findById($this->id);

        $entryNote[$this->EntryNote->alias] = $this->data[$this->EntryNote->alias];

        if (
            isset($entryNote[$this->EntryNote->alias][$this->EntryNote->StatusEntryNote->alias]['finish'])
            &&
            $entryNote[$this->EntryNote->alias][$this->EntryNote->StatusEntryNote->alias]['finish'] == StatusEntryNote::SIM
        ) {
            $this->error = __("The operation could not be done because the Entry Note is Completed!");
            return false;
        }

        return true;
    }
    
    /**
     * Depois de Excluir
     */
    public function afterDelete() {
        parent::afterDelete();
        
        $this->recursive = 0;
        $entryNoteItem = $this->Stock->find('first', [
            'conditions' => [
                "{$this->Stock->alias}.entry_note_item_id" => $this->id
            ]
        ]);
                
        if ($entryNoteItem) {
            $this->Stock->id = $entryNoteItem['Stock']['id'];
            if ($this->Stock->exists()) {
                $this->Stock->delete();
            }
        }
                
    }
    
    /**
     * Insere ou Atualiza o registro de estoque relacionado ao Item
     * @param array $entryNoteItem
     * @param mixed $locationId
     * @param int $coefficient
     * @return mixed On success Model::$data if its not empty or true, false on failure
     */
    public function moveStock($entryNoteItem, $locationId=null, $coefficient=1) {
        
        //normalização do array
        if (isset($entryNoteItem['EntryNoteItem'])) {
            $entryNoteItem = $entryNoteItem['EntryNoteItem'];
        }
        
        //se não passar a localização por parâmetro, buscar a localização definida no Item
        if (!$locationId) {
            $locationId = $entryNoteItem['location_id'];
        }
        
        //se não passar o coeficiente por parâmetro, o padrão é 1
        if (!$coefficient) {
            $coefficient = 1;
        }
        
        $stock = $this->Stock->getStockByEntryNoteItem($entryNoteItem);

        $entryNote = $this->EntryNote->findById($entryNoteItem['entry_note_id']);

        if (isset($entryNote['EntryNote']['entry_date'])) {
            $finishDate = $entryNote['EntryNote']['entry_date'];
        } else {
            $finishDate = date('Y-m-d');
        }

        if (isset($entryNote['EntryNote']['entry_hour'])) {
            $finishDate .= ' '.$entryNote['EntryNote']['entry_hour'];
        } else {
            $finishDate .= ' '.date('H:i:s');
        }

        if ($stock) {
            $this->Stock->id = $stock['Stock']['id'];
        } else {
            $this->Stock->create();
        }
        
        $entryNoteItem['quantity'] = $entryNoteItem['quantity'] * $coefficient;
        
        $entryNoteItem['total_cost'] = $entryNoteItem['total_cost'] * $coefficient;
        
        $arrData = [];
        $arrData[$this->Stock->alias] = [
            'location_id'         => $locationId,
            'entry_note_item_id'  => $entryNoteItem['id'],
            'product_id'          => $entryNoteItem['product_id'],
            'quantity'            => $entryNoteItem['quantity'],
            'value'               => $entryNoteItem['total_cost'],
            'order_id'            => null,
            'internal_transfer_item_id' => null,
            'finished'            => $finishDate
        ];
        
        return $this->Stock->save($arrData);
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'entry_note_id' => array(
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
        'unit_cost' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
        ),
        'total_cost' => array(
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
        'EntryNote' => array(
            'className' => 'EntryNote',
            'foreignKey' => 'entry_note_id',
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
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id',
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
    public $hasMany = [];

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasOne = [
        'Stock' => [
            'className' => 'Stock',
            'foreignKey' => 'entry_note_item_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ]
    ];
    
}
