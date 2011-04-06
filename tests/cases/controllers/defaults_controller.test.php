<?php 
/* SVN FILE: $Id$ */
/* DefaultsController Test cases generated on: 2010-01-11 15:55:54 : 1263225354*/
App::import('Controller', 'Defaults');

class TestDefaults extends DefaultsController {
	var $autoRender = false;
}

class DefaultsControllerTest extends CakeTestCase {
	var $Defaults = null;

	function startTest() {
		$this->Defaults = new TestDefaults();
		$this->Defaults->constructClasses();
	}

	function testDefaultsControllerInstance() {
		$this->assertTrue(is_a($this->Defaults, 'DefaultsController'));
	}

	function endTest() {
		unset($this->Defaults);
	}
}
?>