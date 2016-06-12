<?php
App::uses('StatusEntryNote', 'Model');

/**
 * StatusEntryNote Test Case
 */
class StatusEntryNoteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_entry_note',
		'app.entry_note',
		'app.supplier',
		'app.entry_note_item',
		'app.product',
		'app.subcategory',
		'app.unit',
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
		$this->StatusEntryNote = ClassRegistry::init('StatusEntryNote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusEntryNote);

		parent::tearDown();
	}

}
