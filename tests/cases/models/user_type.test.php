<?php 
/* SVN FILE: $Id$ */
/* UserType Test cases generated on: 2010-01-11 15:43:41 : 1263224621*/
App::import('Model', 'UserType');

class UserTypeTestCase extends CakeTestCase {
	var $UserType = null;
	var $fixtures = array('app.user_type', 'app.user');

	function startTest() {
		$this->UserType =& ClassRegistry::init('UserType');
	}

	function testUserTypeInstance() {
		$this->assertTrue(is_a($this->UserType, 'UserType'));
	}

	function testUserTypeFind() {
		$this->UserType->recursive = -1;
		$results = $this->UserType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('UserType' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-11 15:43:41',
			'modified'  => '2010-01-11 15:43:41',
			'name'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		));
		$this->assertEqual($results, $expected);
	}
}
?>