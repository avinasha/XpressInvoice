<?php 
/* SVN FILE: $Id$ */
/* PresetsController Test cases generated on: 2010-01-11 16:10:59 : 1263226259*/
App::import('Controller', 'Presets');

class TestPresets extends PresetsController {
	var $autoRender = false;
}

class PresetsControllerTest extends CakeTestCase {
	var $Presets = null;

	function startTest() {
		$this->Presets = new TestPresets();
		$this->Presets->constructClasses();
	}

	function testPresetsControllerInstance() {
		$this->assertTrue(is_a($this->Presets, 'PresetsController'));
	}

	function endTest() {
		unset($this->Presets);
	}
}
?>