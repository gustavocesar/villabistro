<?php
App::uses('Stock', 'Model');

/**
 * Stock Test Case
 */
class StockTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock',
		'app.location',
		'app.location_type',
		'app.product',
		'app.subcategory',
		'app.unit',
		'app.entry_note_item',
		'app.entry_note',
		'app.supplier',
		'app.status_entry_note',
		'app.order',
		'app.user',
		'app.group',
		'app.stage',
		'app.bill',
		'app.status_bill',
		'app.table',
		'app.status_order',
		'app.product_item',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stock = ClassRegistry::init('Stock');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stock);

		parent::tearDown();
	}

}
