<?php 
/* SVN FILE: $Id$ */
/* Item Test cases generated on: 2010-01-15 06:40:32 : 1263537632*/
App::import('Model', 'Item');

class ItemTestCase extends CakeTestCase {
	var $Item = null;
	var $fixtures = array('app.item', 'app.invoice_item', 'app.company');

	function startTest() {
		$this->Item =& ClassRegistry::init('Item');
	}

	function testItemInstance() {
		$this->assertTrue(is_a($this->Item, 'Item'));
	}

	function testItemFind() {
		$this->Item->recursive = -1;
		$results = $this->Item->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Item' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-15 06:40:30',
			'modified'  => '2010-01-15 06:40:30',
			'price'  => '2010-01-15 06:40:30',
			'quantity'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'total'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type'  => 'Lorem ipsum dolor sit amet',
			'saved'  => 1,
			'invoice_item_id'  => 'Lorem ipsum dolor sit amet',
			'company_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>