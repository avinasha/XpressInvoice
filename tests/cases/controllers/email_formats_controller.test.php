<?php 
/* SVN FILE: $Id$ */
/* EmailFormatsController Test cases generated on: 2010-01-11 15:56:03 : 1263225363*/
App::import('Controller', 'EmailFormats');

class TestEmailFormats extends EmailFormatsController {
	var $autoRender = false;
}

class EmailFormatsControllerTest extends CakeTestCase {
	var $EmailFormats = null;

	function startTest() {
		$this->EmailFormats = new TestEmailFormats();
		$this->EmailFormats->constructClasses();
	}

	function testEmailFormatsControllerInstance() {
		$this->assertTrue(is_a($this->EmailFormats, 'EmailFormatsController'));
	}

	function endTest() {
		unset($this->EmailFormats);
	}
}
?>