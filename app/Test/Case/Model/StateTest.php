<?php
App::uses('State', 'Model');

/**
 * State Test Case
 */
class StateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.state',
		'app.address',
		'app.user',
		'app.group',
		'app.order',
		'app.product',
		'app.subcategory',
		'app.category',
		'app.stage',
		'app.unit',
		'app.entry_note_item',
		'app.entry_note',
		'app.supplier',
		'app.status_entry_note',
		'app.location',
		'app.location_type',
		'app.stock',
		'app.internal_transfer_item',
		'app.internal_transfer',
		'app.status_internal_transfer',
		'app.manual_adjustment',
		'app.product_item',
		'app.table',
		'app.bill',
		'app.status_bill',
		'app.payment',
		'app.payment_method',
		'app.status_payment_method',
		'app.status_order',
		'app.status_address',
		'app.public_place'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->State = ClassRegistry::init('State');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->State);

		parent::tearDown();
	}

}
