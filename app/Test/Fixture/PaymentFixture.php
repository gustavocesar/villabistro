<?php
/**
 * Payment Fixture
 */
class PaymentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'table_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'subtotal' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '50,2', 'unsigned' => false),
		'payd_value' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '50,2', 'unsigned' => false),
		'payback' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '50,2', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'table_id' => 1,
			'subtotal' => 1,
			'payd_value' => 1,
			'payback' => 1,
			'created' => '2016-05-23 20:56:26',
			'modified' => '2016-05-23 20:56:26'
		),
	);

}
