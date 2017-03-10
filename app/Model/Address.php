<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property User $User
 * @property StatusAddress $StatusAddress
 * @property State $State
 * @property PublicPlace $PublicPlace
 */
class Address extends AppModel {

    const ATIVO   = 1;
    const INATIVO = 2;

    const SIM = 'Sim';
    const NAO = 'Não';

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

            if ($old[$this->StatusAddress->alias]['id'] == Address::INATIVO) {
                $this->error = __("The operation could not be done because the Address has been inactivated!");
                return false;
            }

            /**
             * update other addresses to NOT PRIMARY
             */
//            if ($old[$this->alias]['is_primary'] == Address::SIM) {
//                $this->query("
//                    UPDATE addresses
//                    SET is_primary = '".Address::NAO."'
//                    WHERE 1 = 1
//                        AND addresses.user_id      = ".$old[$this->alias]['user_id']."
//                        AND addresses.is_primary   = '".Address::SIM."'
//                        AND addresses.id          <> ".$old[$this->alias]['id']."
//                ");
//            }
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

//        $this->setAtLeastOnePrimary();
    }

    public function setAtLeastOnePrimary() {
        $this->recursive = 1;
        $address = $this->findById($this->id);
    }

    /**
     * Antes de Excluir
     * @param bool $cascade
     * @return boolean
     */
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        
        $this->error = __("Addresses cannot be deleted!");
        return false;
    }

    public function inactivate() {
        $this->saveField('status_address_id', 2);
        return true;
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status_address_id' => array(
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
		'zip_code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'public_place_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'public_place_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'neighborhood' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'number' => array(),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StatusAddress' => array(
			'className' => 'StatusAddress',
			'foreignKey' => 'status_address_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PublicPlace' => array(
			'className' => 'PublicPlace',
			'foreignKey' => 'public_place_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
