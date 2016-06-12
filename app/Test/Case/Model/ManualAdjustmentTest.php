<?php
App::uses('ManualAdjustment', 'Model');

/**
 * ManualAdjustment Test Case
 */
class ManualAdjustmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.manual_adjustment',
		'app.location',
		'app.location_type',
		'app.entry_note_item',
		'app.entry_note',
		'app.supplier',
		'app.status_entry_note',
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
		'app.stock',
		'app.internal_transfer_item',
		'app.internal_transfer',
		'app.status_internal_transfer',
		'app.unit',
		'app.product_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ManualAdjustment = ClassRegistry::init('ManualAdjustment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ManualAdjustment);

		parent::tearDown();
	}

}
