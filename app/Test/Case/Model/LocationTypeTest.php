<?php
App::uses('LocationType', 'Model');

/**
 * LocationType Test Case
 */
class LocationTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.location_type',
		'app.location'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationType = ClassRegistry::init('LocationType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LocationType);

		parent::tearDown();
	}

}
