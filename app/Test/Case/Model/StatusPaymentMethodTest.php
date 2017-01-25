<?php
App::uses('StatusPaymentMethod', 'Model');

/**
 * StatusPaymentMethod Test Case
 */
class StatusPaymentMethodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_payment_method',
		'app.payment_method'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StatusPaymentMethod = ClassRegistry::init('StatusPaymentMethod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusPaymentMethod);

		parent::tearDown();
	}

}
