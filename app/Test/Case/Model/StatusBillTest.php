<?php
App::uses('StatusBill', 'Model');

/**
 * StatusBill Test Case
 */
class StatusBillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_bill',
		'app.bill',
		'app.table',
		'app.order',
		'app.user',
		'app.group',
		'app.product',
		'app.subcategory',
		'app.unit',
		'app.entry_note_item',
		'app.entry_note',
		'app.supplier',
		'app.status_entry_note',
		'app.product_item',
		'app.item',
		'app.stock',
		'app.stage',
		'app.status_order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StatusBill = ClassRegistry::init('StatusBill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusBill);

		parent::tearDown();
	}

}
