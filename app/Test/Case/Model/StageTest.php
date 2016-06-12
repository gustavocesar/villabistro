<?php
App::uses('Stage', 'Model');

/**
 * Stage Test Case
 */
class StageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stage',
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
		'app.bill',
		'app.status_bill',
		'app.table',
		'app.status_order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stage = ClassRegistry::init('Stage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stage);

		parent::tearDown();
	}

}
