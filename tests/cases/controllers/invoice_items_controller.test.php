<?php 
/* SVN FILE: $Id$ */
/* InvoiceItemsController Test cases generated on: 2010-01-11 15:56:14 : 1263225374*/
App::import('Controller', 'InvoiceItems');

class TestInvoiceItems extends InvoiceItemsController {
	var $autoRender = false;
}

class InvoiceItemsControllerTest extends CakeTestCase {
	var $InvoiceItems = null;

	function startTest() {
		$this->InvoiceItems = new TestInvoiceItems();
		$this->InvoiceItems->constructClasses();
	}

	function testInvoiceItemsControllerInstance() {
		$this->assertTrue(is_a($this->InvoiceItems, 'InvoiceItemsController'));
	}

	function endTest() {
		unset($this->InvoiceItems);
	}
}
?>