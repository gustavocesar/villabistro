<?php

App::uses('AppModel', 'Model');

/**
 * InternalTransfer Model
 *
 * @property Location $Location
 * @property StatusInternalTransfer $StatusInternalTransfer
 * @property InternalTransferItem $InternalTransferItem
 */
class InternalTransfer extends AppModel {

    /**
     * Antes de Salvar
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);

        if ($this->data[$this->alias]['location_id'] == $this->data[$this->alias]['location_destiny_id']) {
            $this->error = __("The location destiny should be diferent of the location origin!");
            return false;
        }

        $this->recursive = 1;
        $old = $this->find('first', ['conditions' => array($this->alias . '.' . $this->primaryKey => $this->id)]);

        if ($old) {

            if ($old[$this->StatusInternalTransfer->alias]['finish'] == StatusInternalTransfer::SIM) {
                $this->error = __("The operation could not be done because the Internal Transfer is Completed!");
                return false;
            }
            
            /**
             * @todo: substituir o ID fixo abaixo por uma CONSTANTE
             */
            
            if (
                !empty($this->data[$this->alias]['status_internal_transfer_id'])
                &&
                $this->data[$this->alias]['status_internal_transfer_id'] == 2
            ) {
                
                App::import('Controller', 'Stocks');
                $StocksController = new StocksController();

                $locationId = $this->data[$this->alias]['location_id'];

                $arrItems = $old[$this->InternalTransferItem->alias];
                foreach ($arrItems as $item) {
                    
                    $productId = $item['product_id'];

                    $arrResult = $StocksController->getStockQuantityByProduct($productId, $locationId);

                    $quantity = $item['quantity'];
                    $allowedQuantity = 0;
                    if (
                        isset($arrResult[0][0]['TotalQuantity']) && !empty($arrResult[0][0]['TotalQuantity']) && $arrResult[0][0]['TotalQuantity'] > 0
                    ) {
                        $allowedQuantity = $arrResult[0][0]['TotalQuantity'];
                    }
                    $diff = $allowedQuantity - $quantity;
                    
                    if ($diff < 0) {
                        
                        $location = $this->LocationOrigin->find('first', [
                            'conditions' => [
                                "{$this->LocationOrigin->alias}.id" => $locationId
                            ]
                        ]);
                        
                        $this->error = __("The Internal Transfer could not to be finished because the origin location (%s) has some product(s) with insufficient quantity to transfer!", $location[$this->LocationOrigin->alias]['name']);
                        return false;
                    }
                }
            }
        }
        
        if (
                !empty($this->data[$this->alias]['date']) &&
                strpos($this->data[$this->alias]['date'], '/') !== false
        ) {

            $data = $this->data[$this->alias]['date'];
            $arrData = explode('/', $data);
            if (is_array($arrData) && count($arrData) >= 3) {
                $this->data[$this->alias]['date'] = $arrData[2] . '-' . $arrData[1] . '-' . $arrData[0];
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

        $this->finishItems();
    }

    /**
     * Depois de Excluir
     */
    public function afterDelete() {
        parent::afterDelete();

        $this->InternalTransferItem->recursive = -1;
        $internalTransferItems = $this->InternalTransferItem->find('all', [
            'conditions' => [
                "{$this->InternalTransferItem->alias}.internal_transfer_id" => $this->id
            ]
        ]);

        foreach ($internalTransferItems as $item) {
            $this->InternalTransferItem->id = $item['InternalTransferItem']['id'];
            if ($this->InternalTransferItem->exists()) {
                $this->InternalTransferItem->delete();
            }
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
                    isset($this->data[$this->StatusInternalTransfer->alias]['finish']) &&
                    $this->data[$this->StatusInternalTransfer->alias]['finish'] == StatusInternalTransfer::SIM
            ) {
                $this->error = __("The operation could not be done because the Internal Transfer is Completed!");
                return false;
            }
        }

        return true;
    }

    public function finishItems() {
        $this->recursive = 1;
        $internalTransfer = $this->find('first', [
            'conditions' => [
                "{$this->alias}.{$this->primaryKey}" => $this->id
            ]
        ]);
                
        if (
            isset($internalTransfer[$this->StatusInternalTransfer->alias]['finish'])
            &&
            $internalTransfer[$this->StatusInternalTransfer->alias]['finish'] == StatusInternalTransfer::SIM
        ) {
            foreach ($internalTransfer[$this->InternalTransferItem->alias] as $internalTransferItem) {
                $alias = $this->InternalTransferItem->Stock->alias;
                
                if (isset($internalTransfer['InternalTransfer']['date'])) {
                    $finishDate = $internalTransfer['InternalTransfer']['date'];
                } else {
                    $finishDate = date('Y-m-d');
                }

                if (isset($internalTransfer['InternalTransfer']['time'])) {
                    $finishDate .= ' '.$internalTransfer['InternalTransfer']['time'];
                } else {
                    $finishDate .= ' '.date('H:i:s');
                }
                
                $arrDataOrigin = [];
                $arrDataOrigin[$alias]['location_id']               = $internalTransfer['InternalTransfer']['location_id'];
                $arrDataOrigin[$alias]['internal_transfer_item_id'] = $internalTransferItem['id'];
                $arrDataOrigin[$alias]['product_id']                = $internalTransferItem['product_id'];
                $arrDataOrigin[$alias]['quantity']                  = $internalTransferItem['quantity'] * -1;
                $arrDataOrigin[$alias]['finished']                  = $finishDate;
                $arrDataOrigin[$alias]['value']                     = null;
                $arrDataOrigin[$alias]['order_id']                  = null;
                $arrDataOrigin[$alias]['entry_note_item_id']        = null;

                $this->InternalTransferItem->Stock->create();
                $this->InternalTransferItem->Stock->save($arrDataOrigin);
                
                $arrDataDestiny = [];
                $arrDataDestiny[$alias]['location_id']               = $internalTransfer['InternalTransfer']['location_destiny_id'];
                $arrDataDestiny[$alias]['internal_transfer_item_id'] = $internalTransferItem['id'];
                $arrDataDestiny[$alias]['product_id']                = $internalTransferItem['product_id'];
                $arrDataDestiny[$alias]['quantity']                  = $internalTransferItem['quantity'];
                $arrDataDestiny[$alias]['finished']                  = $finishDate;
                $arrDataDestiny[$alias]['value']                     = null;
                $arrDataDestiny[$alias]['order_id']                  = null;
                $arrDataDestiny[$alias]['entry_note_item_id']        = null;

                $this->InternalTransferItem->Stock->create();
                $this->InternalTransferItem->Stock->save($arrDataDestiny);
            }
            
        }
    }

//    public function insertStock($internalTransferItem) {
//        $stock = $this->EntryNoteItem->Stock;
//
//        if (!$locationId) {
//            $locationId = $internalTransferItem['location_id'];
//        }
//
//        if (!$coefficient) {
//            $coefficient = 1;
//        }
//
//        $arrData = [];
//        $arrData[$stock->alias]['location_id']           = $locationId;
//        $arrData[$stock->alias]['entry_note_item_id']    = $internalTransferItem['id'];
//        $arrData[$stock->alias]['product_id']            = $internalTransferItem['product_id'];
//        $arrData[$stock->alias]['quantity']              = $internalTransferItem['quantity'] * $coefficient;
//        $arrData[$stock->alias]['value']                 = $internalTransferItem['total_cost'] * $coefficient;
//        $arrData[$stock->alias]['order_id']              = null;
//        $arrData[$stock->alias]['internal_transfer_item_id']  = null;
//
//        $stock->create();
//        $stock->save($arrData);
//    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
        'location_destiny_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'status_internal_transfer_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'date' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Informe a Data da Transferência',
            )
        ),
        'time' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Informe a Hora da Transferência',
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
        'LocationOrigin' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'LocationDestiny' => array(
            'className' => 'Location',
            'foreignKey' => 'location_destiny_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'StatusInternalTransfer' => array(
            'className' => 'StatusInternalTransfer',
            'foreignKey' => 'status_internal_transfer_id',
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
        'InternalTransferItem' => array(
            'className' => 'InternalTransferItem',
            'foreignKey' => 'internal_transfer_id',
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
