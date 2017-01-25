<?php
App::uses('PaymentMethod', 'Model');

/**
 * PaymentMethod Test Case
 */
class PaymentMethodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.payment_method',
		'app.status_payment_method',
		'app.payment',
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
		'app.location',
		'app.location_type',
		'app.stock',
		'app.internal_transfer_item',
		'app.internal_transfer',
		'app.status_internal_transfer',
		'app.manual_adjustment',
		'app.product_item',
		'app.status_order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaymentMethod = ClassRegistry::init('PaymentMethod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentMethod);

		parent::tearDown();
	}

}
