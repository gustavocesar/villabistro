<?php
App::uses('ProductItem', 'Model');

/**
 * ProductItem Test Case
 */
class ProductItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_item',
		'app.product',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductItem = ClassRegistry::init('ProductItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductItem);

		parent::tearDown();
	}

}
