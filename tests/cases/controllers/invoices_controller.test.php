<?php 
/* SVN FILE: $Id$ */
/* InvoicesController Test cases generated on: 2010-01-11 15:56:21 : 1263225381*/
App::import('Controller', 'Invoices');

class TestInvoices extends InvoicesController {
	var $autoRender = false;
}

class InvoicesControllerTest extends CakeTestCase {
	var $Invoices = null;

	function startTest() {
		$this->Invoices = new TestInvoices();
		$this->Invoices->constructClasses();
	}

	function testInvoicesControllerInstance() {
		$this->assertTrue(is_a($this->Invoices, 'InvoicesController'));
	}

	function endTest() {
		unset($this->Invoices);
	}
}
?>