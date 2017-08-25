<?php
App::uses('AppModel', 'Model');
/**
 * Audit Model
 *
 * @property AuditDelta $AuditDelta
 */
class Audit extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
	public $validate = array(
		'event' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'model' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'json_object' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'entity_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'request_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'source_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
	public $hasMany = array(
		'AuditDelta' => array(
			'className' => 'AuditDelta',
			'foreignKey' => 'audit_id',
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
