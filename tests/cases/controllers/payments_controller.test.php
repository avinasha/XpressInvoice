<?php 
/* SVN FILE: $Id$ */
/* PaymentsController Test cases generated on: 2010-01-11 15:56:36 : 1263225396*/
App::import('Controller', 'Payments');

class TestPayments extends PaymentsController {
	var $autoRender = false;
}

class PaymentsControllerTest extends CakeTestCase {
	var $Payments = null;

	function startTest() {
		$this->Payments = new TestPayments();
		$this->Payments->constructClasses();
	}

	function testPaymentsControllerInstance() {
		$this->assertTrue(is_a($this->Payments, 'PaymentsController'));
	}

	function endTest() {
		unset($this->Payments);
	}
}
?>