<?php 
/* SVN FILE: $Id$ */
/* ActionsController Test cases generated on: 2010-01-11 15:55:29 : 1263225329*/
App::import('Controller', 'Actions');

class TestActions extends ActionsController {
	var $autoRender = false;
}

class ActionsControllerTest extends CakeTestCase {
	var $Actions = null;

	function startTest() {
		$this->Actions = new TestActions();
		$this->Actions->constructClasses();
	}

	function testActionsControllerInstance() {
		$this->assertTrue(is_a($this->Actions, 'ActionsController'));
	}

	function endTest() {
		unset($this->Actions);
	}
}
?>