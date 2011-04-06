<?php 
/* SVN FILE: $Id$ */
/* ItemTypesController Test cases generated on: 2010-01-11 17:11:32 : 1263229892*/
App::import('Controller', 'ItemTypes');

class TestItemTypes extends ItemTypesController {
	var $autoRender = false;
}

class ItemTypesControllerTest extends CakeTestCase {
	var $ItemTypes = null;

	function startTest() {
		$this->ItemTypes = new TestItemTypes();
		$this->ItemTypes->constructClasses();
	}

	function testItemTypesControllerInstance() {
		$this->assertTrue(is_a($this->ItemTypes, 'ItemTypesController'));
	}

	function endTest() {
		unset($this->ItemTypes);
	}
}
?>