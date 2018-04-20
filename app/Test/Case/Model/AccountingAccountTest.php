<?php
App::uses('AccountingAccount', 'Model');

/**
 * AccountingAccount Test Case
 */
class AccountingAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.accounting_account'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AccountingAccount = ClassRegistry::init('AccountingAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AccountingAccount);

		parent::tearDown();
	}

}
