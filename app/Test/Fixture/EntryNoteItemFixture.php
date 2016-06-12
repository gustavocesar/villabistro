<?php
/**
 * EntryNoteItem Fixture
 */
class EntryNoteItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'entry_note_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'quantity' => array('type' => 'double', 'null' => false, 'default' => null, 'length' => '50,2', 'unsigned' => false),
		'unit_cost' => array('type' => 'double', 'null' => false, 'default' => null, 'length' => '50,2', 'unsigned' => false),
		'total_cost' => array('type' => 'double', 'null' => false, 'default' => null, 'length' => '50,2', 'unsigned' => false),
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
			'entry_note_id' => 1,
			'product_id' => 1,
			'quantity' => 1,
			'cost_price' => 1,
			'created' => '2016-02-09 14:26:26',
			'modified' => '2016-02-09 14:26:26'
		),
	);

}
