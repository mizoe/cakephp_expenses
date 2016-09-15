<?php
App::uses('Usage', 'Model');

/**
 * Usage Test Case
 */
class UsageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usage',
		'app.journal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Usage = ClassRegistry::init('Usage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Usage);

		parent::tearDown();
	}

}
