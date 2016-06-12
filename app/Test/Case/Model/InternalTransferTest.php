<?php
App::uses('InternalTransfer', 'Model');

/**
 * InternalTransfer Test Case
 */
class InternalTransferTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.internal_transfer',
		'app.status_internal_transfers'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InternalTransfer = ClassRegistry::init('InternalTransfer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InternalTransfer);

		parent::tearDown();
	}

}
