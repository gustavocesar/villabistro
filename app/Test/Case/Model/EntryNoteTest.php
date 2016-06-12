<?php
App::uses('EntryNote', 'Model');

/**
 * EntryNote Test Case
 */
class EntryNoteTest extends CakeTestCase {

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
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntryNote = ClassRegistry::init('EntryNote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntryNote);

		parent::tearDown();
	}

}
