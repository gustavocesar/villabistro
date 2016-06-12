<?php
App::uses('Product', 'Model');

/**
 * Product Test Case
 */
class ProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.item',
		'app.stock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Product = ClassRegistry::init('Product');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Product);

		parent::tearDown();
	}

}
