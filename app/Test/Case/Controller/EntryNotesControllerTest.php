<?php
App::uses('EntryNotesController', 'Controller');

/**
 * EntryNotesController Test Case
 */
class EntryNotesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entry_note',
		'app.supplier',
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
		'app.location_type',
		'app.internal_transfer_item',
		'app.internal_transfer',
		'app.status_internal_transfers'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
