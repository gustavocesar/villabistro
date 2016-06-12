<?php

App::uses('AppModel', 'Model');

/**
 * Location Model
 *
 * @property LocationType $LocationType
 * @property EntryNoteItem $EntryNoteItem
 * @property InternalTransfer $InternalTransfer
 * @property ManualAdjustment $ManualAdjustment
 * @property Stock $Stock
 */
class Location extends AppModel {

    const FORNECEDORES = 1;
    const CLIENTES = 2;
    const PERDAS = 3;
    const ALMOXARIFADO = 100;
    const FIXED_LOCATIONS = [
        self::FORNECEDORES,
        self::CLIENTES,
        self::PERDAS
    ];

    public $displayField = 'name';

    /**
     * Antes do FIND
     * @param array $query
     * @return array
     */
    public function beforeFind($query) {
        parent::beforeFind($query);

        $query['order'] = ["{$this->alias}.location_type_id ASC", "{$this->alias}.id ASC"];
        return $query;
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

        if (in_array($this->data[$this->alias][$this->primaryKey], self::FIXED_LOCATIONS)) {
            $this->error = __("The operation could not be done because this is a fixed Location!");
            return false;
        }

        return true;
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
        'location_type_id' => array(
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
        'LocationType' => array(
            'className' => 'LocationType',
            'foreignKey' => 'location_type_id',
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
            'foreignKey' => 'location_id',
            'dependent' => false,
        ),
        'Stock' => array(
            'className' => 'Stock',
            'foreignKey' => 'location_id',
            'dependent' => false,
        ),
        'InternalTransferOrigin' => array(
            'className' => 'InternalTransfer',
            'foreignKey' => 'location_id',
            'dependent' => false,
        ),
        'InternalTransferDestiny' => array(
            'className' => 'InternalTransfer',
            'foreignKey' => 'location_destiny_id',
            'dependent' => false,
        ),
        'ManualAdjustment' => array(
            'className' => 'ManualAdjustment',
            'foreignKey' => 'location_id',
            'dependent' => false,
        )
    );

    public function getListFisicalLocations() {

        /**
         * @todo: remover o ID fixo abaixo, e substituir por uma CONSTANTE
         */

        $options = [
            'conditions' => ['LocationTypes.id' => 1],
            'joins' => [
                [
                    'table' => 'location_types',
                    'alias' => 'LocationTypes',
                    'type' => 'INNER',
                    'conditions' => [
                        'LocationTypes.id = LocationOrigin.location_type_id'
                    ]
                ]
            ],
            'fields' => ['LocationOrigin.id', 'LocationOrigin.name']
        ];

        return $this->find('list', $options);
    }

}
