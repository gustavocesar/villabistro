<?php
App::uses('Supplier', 'Model');

/**
 * Supplier Test Case
 */
class SupplierTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.supplier',
		'app.entry_note',
		'app.status_entry_note',
		'app.entry_note_item',
		'app.product',
		'app.subcategory',
		'app.category',
		'app.stage',
		'app.order',
		'app.user',
		'app.group',
		'app.bill',
		'app.status_bill',
		'app.table',
		'app.status_order',
		'app.unit',
		'app.product_item',
		'app.item',
		'app.stock',
		'app.location',
		'app.location_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Supplier = ClassRegistry::init('Supplier');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Supplier);

		parent::tearDown();
	}

}
