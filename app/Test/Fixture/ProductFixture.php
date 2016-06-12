<?php
/**
 * Product Fixture
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'subcategory_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'unit_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cost_price' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '50,3', 'unsigned' => true),
		'sell_price' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '50,3', 'unsigned' => true),
		'minimum_stock' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '50,3', 'unsigned' => true),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name_UNIQUE' => array('column' => 'name', 'unique' => 1)
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
			'subcategory_id' => 1,
			'unit_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'cost_price' => 1,
			'sell_price' => 1,
			'minimum_stock' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2016-02-09 14:26:46',
			'modified' => '2016-02-09 14:26:46'
		),
	);

}
