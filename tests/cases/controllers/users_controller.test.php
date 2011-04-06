<?php 
/* SVN FILE: $Id$ */
/* UsersController Test cases generated on: 2010-01-11 15:57:01 : 1263225421*/
App::import('Controller', 'Users');

class TestUsers extends UsersController {
	var $autoRender = false;
}

class UsersControllerTest extends CakeTestCase {
	var $Users = null;

	function startTest() {
		$this->Users = new TestUsers();
		$this->Users->constructClasses();
	}

	function testUsersControllerInstance() {
		$this->assertTrue(is_a($this->Users, 'UsersController'));
	}

	function endTest() {
		unset($this->Users);
	}
}
?>