<?php
App::uses('Table', 'Model');

/**
 * Table Test Case
 */
class TableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.table',
		'app.bill',
		'app.status_bill',
		'app.order',
		'app.user',
		'app.group',
		'app.product',
		'app.subcategory',
		'app.category',
		'app.stage',
		'app.unit',
		'app.entry_note_item',
		'app.entry_note',
		'app.supplier',
		'app.status_entry_note',
		'app.product_item',
		'app.item',
		'app.stock',
		'app.location',
		'app.location_type',
		'app.status_order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Table = ClassRegistry::init('Table');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Table);

		parent::tearDown();
	}

}
