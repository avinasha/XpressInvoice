<?php 
/* SVN FILE: $Id$ */
/* CompaniesController Test cases generated on: 2010-01-11 15:55:42 : 1263225342*/
App::import('Controller', 'Companies');

class TestCompanies extends CompaniesController {
	var $autoRender = false;
}

class CompaniesControllerTest extends CakeTestCase {
	var $Companies = null;

	function startTest() {
		$this->Companies = new TestCompanies();
		$this->Companies->constructClasses();
	}

	function testCompaniesControllerInstance() {
		$this->assertTrue(is_a($this->Companies, 'CompaniesController'));
	}

	function endTest() {
		unset($this->Companies);
	}
}
?>