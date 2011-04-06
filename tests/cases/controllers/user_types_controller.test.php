<?php 
/* SVN FILE: $Id$ */
/* UserTypesController Test cases generated on: 2010-01-11 15:56:52 : 1263225412*/
App::import('Controller', 'UserTypes');

class TestUserTypes extends UserTypesController {
	var $autoRender = false;
}

class UserTypesControllerTest extends CakeTestCase {
	var $UserTypes = null;

	function startTest() {
		$this->UserTypes = new TestUserTypes();
		$this->UserTypes->constructClasses();
	}

	function testUserTypesControllerInstance() {
		$this->assertTrue(is_a($this->UserTypes, 'UserTypesController'));
	}

	function endTest() {
		unset($this->UserTypes);
	}
}
?>