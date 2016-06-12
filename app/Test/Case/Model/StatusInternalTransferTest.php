<?php
App::uses('StatusInternalTransfer', 'Model');

/**
 * StatusInternalTransfer Test Case
 */
class StatusInternalTransferTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_internal_transfer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StatusInternalTransfer = ClassRegistry::init('StatusInternalTransfer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusInternalTransfer);

		parent::tearDown();
	}

}
