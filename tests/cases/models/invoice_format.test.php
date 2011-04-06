<?php 
/* SVN FILE: $Id$ */
/* InvoiceFormat Test cases generated on: 2010-01-11 15:37:47 : 1263224267*/
App::import('Model', 'InvoiceFormat');

class InvoiceFormatTestCase extends CakeTestCase {
	var $InvoiceFormat = null;
	var $fixtures = array('app.invoice_format', 'app.company');

	function startTest() {
		$this->InvoiceFormat =& ClassRegistry::init('InvoiceFormat');
	}

	function testInvoiceFormatInstance() {
		$this->assertTrue(is_a($this->InvoiceFormat, 'InvoiceFormat'));
	}

	function testInvoiceFormatFind() {
		$this->InvoiceFormat->recursive = -1;
		$results = $this->InvoiceFormat->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('InvoiceFormat' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-11 15:37:47',
			'modified'  => '2010-01-11 15:37:47',
			'name'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		));
		$this->assertEqual($results, $expected);
	}
}
?>