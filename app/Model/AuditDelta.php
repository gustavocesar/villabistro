<?php
App::uses('AppModel', 'Model');
/**
 * AuditDelta Model
 *
 * @property Audit $Audit
 */
class AuditDelta extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
	public $validate = array(
		'audit_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
			),
		),
		'property_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
		'Audit' => array(
			'className' => 'Audit',
			'foreignKey' => 'audit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
