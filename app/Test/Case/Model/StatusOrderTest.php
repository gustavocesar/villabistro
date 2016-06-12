<?php
App::uses('StatusOrder', 'Model');

/**
 * StatusOrder Test Case
 */
class StatusOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_order',
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
		'app.bill',
		'app.status_bill',
		'app.table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StatusOrder = ClassRegistry::init('StatusOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusOrder);

		parent::tearDown();
	}

}
