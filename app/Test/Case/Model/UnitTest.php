<?php
App::uses('Unit', 'Model');

/**
 * Unit Test Case
 */
class UnitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.unit',
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
		$this->Unit = ClassRegistry::init('Unit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Unit);

		parent::tearDown();
	}

}
