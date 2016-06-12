<?php
/**
 * Order Fixture
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'bill_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'status_order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'observation' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'kitchen_order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'product_id' => 1,
			'quantity' => 1,
			'stage_id' => 1,
			'bill_id' => 1,
			'status_order_id' => 1,
			'observation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'kitchen_order' => 1,
			'created' => '2016-02-09 14:26:41',
			'modified' => '2016-02-09 14:26:41'
		),
	);

}
