<?php
App::uses('EntryNoteItem', 'Model');

/**
 * EntryNoteItem Test Case
 */
class EntryNoteItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entry_note_item',
		'app.entry_note',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntryNoteItem = ClassRegistry::init('EntryNoteItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntryNoteItem);

		parent::tearDown();
	}

}
