<?php 
/* SVN FILE: $Id$ */
/* Payment Test cases generated on: 2010-01-31 07:24:40 : 1264922680*/
App::import('Model', 'Payment');

class PaymentTestCase extends CakeTestCase {
	var $Payment = null;
	var $fixtures = array('app.payment', 'app.invoice');

	function startTest() {
		$this->Payment =& ClassRegistry::init('Payment');
	}

	function testPaymentInstance() {
		$this->assertTrue(is_a($this->Payment, 'Payment'));
	}

	function testPaymentFind() {
		$this->Payment->recursive = -1;
		$results = $this->Payment->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Payment' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:24:40',
			'modified'  => '2010-01-31 07:24:40',
			'amount'  => '2010-01-31 07:24:40',
			'date'  => '2010-01-31',
			'invoice_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>