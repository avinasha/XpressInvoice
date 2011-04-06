<?php 
/* SVN FILE: $Id$ */
/* Profile Test cases generated on: 2010-01-31 07:24:52 : 1264922692*/
App::import('Model', 'Profile');

class ProfileTestCase extends CakeTestCase {
	var $Profile = null;
	var $fixtures = array('app.profile', 'app.user');

	function startTest() {
		$this->Profile =& ClassRegistry::init('Profile');
	}

	function testProfileInstance() {
		$this->assertTrue(is_a($this->Profile, 'Profile'));
	}

	function testProfileFind() {
		$this->Profile->recursive = -1;
		$results = $this->Profile->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Profile' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:24:52',
			'modified'  => '2010-01-31 07:24:52',
			'lastLogin'  => '2010-01-31 07:24:52',
			'user_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>