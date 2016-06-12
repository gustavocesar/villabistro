<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Group $Group
 * @property Order $Order
 */
class User extends AppModel {

    public $actsAs = ['Acl' => ['type' => 'requester', 'enabled' => false]];

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        }
        return array('Group' => array('id' => $groupId));
    }

    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    public function beforeSave($options = array()) {

        $user = $this->findByEmail(trim($this->data['User']['email']));

        if (!empty($user)) {
            
            if (
                (isset($this->data['User']['id']) && $this->data['User']['id'] != $user['User']['id'])
                ||
                !isset($this->data['User']['id'])
            ) {
                $this->error = __("This email is already been used by another user. Please, choose another one!");
                return false;
            }
            
        }

        if (empty($this->data['User']['password'])) {

            $oldUser = $this->findById($this->id);

            $senha = $oldUser['User']['password'];

            //Deixe vazio para manter a senha atual, na tela de edição
            $this->data['User']['password'] = $senha;
        } else {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }

        return true;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'group_id' => array(
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
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'O endereço de email informado é inválido',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//        'password' => array(
//            'notBlank' => array(
//                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
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
            'foreignKey' => 'user_id',
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
