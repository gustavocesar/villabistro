<?php

App::uses('AppModel', 'Model');
App::uses('CakeNumber', 'Utility');

/**
 * EntryNote Model
 *
 * @property Supplier $Supplier
 * @property StatusEntryNote $StatusEntryNote
 * @property EntryNoteItem $EntryNoteItem
 */
class EntryNote extends AppModel {
    
    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);
        
        $this->recursive = 1;
        $old = $this->find('first', ['conditions' => array($this->alias.'.'.$this->primaryKey => $this->id)]);
        
        if ($old) {

            if ($old[$this->StatusEntryNote->alias]['finish'] == StatusEntryNote::SIM) {
                $this->error = __("The operation could not be done because the Entry Note is Completed!");
                return false;
            }
            
        }

        if (
            !empty($this->data[$this->alias]['entry_date']) &&
            strpos($this->data[$this->alias]['entry_date'], '/') !== false
        ) {

            $data = $this->data[$this->alias]['entry_date'];
            $arrData = explode('/', $data);
            if (is_array($arrData) && count($arrData) >= 3) {
                $this->data[$this->alias]['entry_date'] = $arrData[2] . '-' . $arrData[1] . '-' . $arrData[0];
            }
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
        
        $this->updateFinishDateItems();
        $this->finishItems();
    }
    
    public function finishItems() {
        $this->recursive = 1;
        $entryNote = $this->find('first', [
            'conditions' => [
                "{$this->alias}.{$this->primaryKey}" => $this->id
            ]
        ]);
                
        if (
            isset($entryNote[$this->StatusEntryNote->alias]['finish'])
            &&
            $entryNote[$this->StatusEntryNote->alias]['finish'] == StatusEntryNote::SIM
        ) {
            
            foreach ($entryNote[$this->EntryNoteItem->alias] as $entryNoteItem) {
                $this->insertStock($entryNoteItem, 1, -1); //baixa no estoque da conta Fornecedores
                $this->insertStock($entryNoteItem); //entrada no estoque, para a localização definida no Item
            }
            
        }
    }

    /**
     * Ao alterar a data
     */
    public function updateFinishDateItems() {

        $this->recursive = -1;
        $entryNote = $this->findById($this->id);

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

        $this->EntryNoteItem->Stock->recursive = -1;
        $stocks = $this->EntryNoteItem->Stock->find('all', [
            'joins' => [
                [
                    'table' => 'entry_note_items',
                    'alias' => 'EntryNoteItem',
                    'type' => 'INNER',
                    'conditions' => [
                        'EntryNoteItem.id = Stock.entry_note_item_id'
                    ]
                ],
            ],
            'conditions' => [
                "EntryNoteItem.entry_note_id" => $this->id
            ]
        ]);

        foreach ($stocks as $stock) {
            $this->EntryNoteItem->Stock->id = $stock['Stock']['id'];
            $this->EntryNoteItem->Stock->saveField('finished', $finishDate);
        }

    }
    
    /**
     * Antes de Excluir
     * @param bool $cascade
     * @return boolean
     */
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        
        $this->recursive = 0;
        $this->data = $this->find('first', [
            'conditions' => [
                "{$this->alias}.{$this->primaryKey}" => $this->id
            ]
        ]);
        
        if ($this->data) {

            if (
                isset($this->data[$this->StatusEntryNote->alias]['finish'])
                &&
                $this->data[$this->StatusEntryNote->alias]['finish'] == StatusEntryNote::SIM
            ) {
                $this->error = __("The operation could not be done because the Entry Note is Completed!");
                return false;
            }
        }

        return true;
    }
    
    /**
     * Depois de Excluir
     */
    public function afterDelete() {
        parent::afterDelete();
        
        $this->EntryNoteItem->recursive = -1;
        $entryNoteItems = $this->EntryNoteItem->find('all', [
            'conditions' => [
                "{$this->EntryNoteItem->alias}.entry_note_id" => $this->id
            ]
        ]);
                
        foreach ($entryNoteItems as $item) {
            $this->EntryNoteItem->id = $item['EntryNoteItem']['id'];
            if ($this->EntryNoteItem->exists()) {
                $this->EntryNoteItem->delete();
            }
        }
            
    }
    
    
    public function insertStock($entryNoteItem, $locationId=null, $coefficient=null) {
        
        $this->recursive = -1;
        $entryNote = $this->find('first', [
            'conditions' => [
                "{$this->alias}.{$this->primaryKey}" => $entryNoteItem['entry_note_id']
            ]
        ]);
        
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
        
        $stock = $this->EntryNoteItem->Stock;

        if (!$locationId) {
            $locationId = $entryNoteItem['location_id'];
        }

        if (!$coefficient) {
            $coefficient = 1;
        }

        $arrData = [];
        $arrData[$stock->alias]['location_id']           = $locationId;
        $arrData[$stock->alias]['entry_note_item_id']    = $entryNoteItem['id'];
        $arrData[$stock->alias]['product_id']            = $entryNoteItem['product_id'];
        $arrData[$stock->alias]['quantity']              = $entryNoteItem['quantity'] * $coefficient;
        $arrData[$stock->alias]['value']                 = $entryNoteItem['total_cost'] * $coefficient;
        $arrData[$stock->alias]['finished']              = $finishDate;
        $arrData[$stock->alias]['order_id']              = null;
        $arrData[$stock->alias]['internal_transfer_item_id']  = null;
        
        $stock->create();
        $stock->save($arrData);
        
    }
    
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'status_entry_note_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'entry_date' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Informe a Data da Entrada',
            )
        ),
        'entry_hour' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Informe a Hora da Entrada',
            )
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Supplier' => array(
            'className' => 'Supplier',
            'foreignKey' => 'supplier_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'StatusEntryNote' => array(
            'className' => 'StatusEntryNote',
            'foreignKey' => 'status_entry_note_id',
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
        'EntryNoteItem' => array(
            'className' => 'EntryNoteItem',
            'foreignKey' => 'entry_note_id',
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
