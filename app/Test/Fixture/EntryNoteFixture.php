<?php
/**
 * EntryNote Fixture
 */
class EntryNoteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'supplier_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'status_entry_note_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fiscal_note' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'entry_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fiscal_note_UNIQUE' => array('column' => 'fiscal_note', 'unique' => 1)
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
			'supplier_id' => 1,
			'status_entry_note_id' => 1,
			'fiscal_note' => 'Lorem ipsum dolor sit amet',
			'entry_date' => '2016-02-09 14:26:28',
			'created' => '2016-02-09 14:26:28',
			'modified' => '2016-02-09 14:26:28'
		),
	);

}
