<?php
App::uses('AuditDeltum', 'Model');

/**
 * AuditDeltum Test Case
 */
class AuditDeltumTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AuditDeltum = ClassRegistry::init('AuditDeltum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AuditDeltum);

		parent::tearDown();
	}

}
