<?php
App::uses('InternalTransferItem', 'Model');

/**
 * InternalTransferItem Test Case
 */
class InternalTransferItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.internal_transfer_item',
		'app.internal_transfer',
		'app.status_internal_transfers',
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
		'app.entry_note_item',
		'app.entry_note',
		'app.supplier',
		'app.status_entry_note',
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
		$this->InternalTransferItem = ClassRegistry::init('InternalTransferItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InternalTransferItem);

		parent::tearDown();
	}

}
