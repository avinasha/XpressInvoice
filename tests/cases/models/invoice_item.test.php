<?php 
/* SVN FILE: $Id$ */
/* InvoiceItem Test cases generated on: 2010-01-31 07:23:24 : 1264922604*/
App::import('Model', 'InvoiceItem');

class InvoiceItemTestCase extends CakeTestCase {
	var $InvoiceItem = null;
	var $fixtures = array('app.invoice_item', 'app.invoice');

	function startTest() {
		$this->InvoiceItem =& ClassRegistry::init('InvoiceItem');
	}

	function testInvoiceItemInstance() {
		$this->assertTrue(is_a($this->InvoiceItem, 'InvoiceItem'));
	}

	function testInvoiceItemFind() {
		$this->InvoiceItem->recursive = -1;
		$results = $this->InvoiceItem->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('InvoiceItem' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'price'  => 'Lorem ipsum dolor sit amet',
			'quantity'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type'  => 'Lorem ipsum dolor ',
			'order'  => 1,
			'created'  => '2010-01-31 07:23:24',
			'modified'  => '2010-01-31 07:23:24',
			'invoice_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>