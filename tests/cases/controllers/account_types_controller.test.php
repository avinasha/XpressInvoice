<?php 
/* SVN FILE: $Id$ */
/* AccountTypesController Test cases generated on: 2010-01-11 15:55:14 : 1263225314*/
App::import('Controller', 'AccountTypes');

class TestAccountTypes extends AccountTypesController {
	var $autoRender = false;
}

class AccountTypesControllerTest extends CakeTestCase {
	var $AccountTypes = null;

	function startTest() {
		$this->AccountTypes = new TestAccountTypes();
		$this->AccountTypes->constructClasses();
	}

	function testAccountTypesControllerInstance() {
		$this->assertTrue(is_a($this->AccountTypes, 'AccountTypesController'));
	}

	function endTest() {
		unset($this->AccountTypes);
	}
}
?>