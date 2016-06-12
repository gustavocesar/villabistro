<?php
App::uses('Cashier', 'Model');

/**
 * Cashier Test Case
 */
class CashierTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cashier'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cashier = ClassRegistry::init('Cashier');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cashier);

		parent::tearDown();
	}

}
