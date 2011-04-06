<?php 
/* SVN FILE: $Id$ */
/* InvoiceFormatsController Test cases generated on: 2010-01-11 15:56:09 : 1263225369*/
App::import('Controller', 'InvoiceFormats');

class TestInvoiceFormats extends InvoiceFormatsController {
	var $autoRender = false;
}

class InvoiceFormatsControllerTest extends CakeTestCase {
	var $InvoiceFormats = null;

	function startTest() {
		$this->InvoiceFormats = new TestInvoiceFormats();
		$this->InvoiceFormats->constructClasses();
	}

	function testInvoiceFormatsControllerInstance() {
		$this->assertTrue(is_a($this->InvoiceFormats, 'InvoiceFormatsController'));
	}

	function endTest() {
		unset($this->InvoiceFormats);
	}
}
?>