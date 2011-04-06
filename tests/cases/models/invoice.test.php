<?php 
/* SVN FILE: $Id$ */
/* Invoice Test cases generated on: 2010-01-31 07:24:22 : 1264922662*/
App::import('Model', 'Invoice');

class InvoiceTestCase extends CakeTestCase {
	var $Invoice = null;
	var $fixtures = array('app.invoice', 'app.company', 'app.client', 'app.action', 'app.invoice_item', 'app.payment');

	function startTest() {
		$this->Invoice =& ClassRegistry::init('Invoice');
	}

	function testInvoiceInstance() {
		$this->assertTrue(is_a($this->Invoice, 'Invoice'));
	}

	function testInvoiceFind() {
		$this->Invoice->recursive = -1;
		$results = $this->Invoice->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Invoice' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:24:22',
			'modified'  => '2010-01-31 07:24:22',
			'number'  => 'Lorem ipsum dolor sit amet',
			'date'  => '2010-01-31',
			'ponumber'  => 'Lorem ipsum dolor sit amet',
			'podate'  => '2010-01-31',
			'dc'  => 'Lorem ipsum dolor sit amet',
			'due'  => 1,
			'discount'  => 1,
			'tax1'  => 1,
			'tax1name'  => 'Lorem ipsum dolor sit amet',
			'tax2'  => 'Lorem ipsum dolor sit amet',
			'tax2name'  => 'Lorem ipsum dolor sit amet',
			'shipping'  => 'Lorem ipsum dolor sit amet',
			'currency'  => 'Lorem ipsum dolor sit amet',
			'notes'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'lastModifiedBy'  => 'Lorem ipsum dolor sit amet',
			'createdBy'  => 'Lorem ipsum dolor sit amet',
			'status'  => 'Lorem ip',
			'total'  => 'Lorem ip',
			'roundoff'  => 1,
			'company_id'  => 'Lorem ipsum dolor sit amet',
			'client_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>