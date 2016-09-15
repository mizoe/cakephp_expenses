<?php
App::uses('Journal', 'Model');

/**
 * Journal Test Case
 */
class JournalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.journal',
		'app.usage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Journal = ClassRegistry::init('Journal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Journal);

		parent::tearDown();
	}

}
