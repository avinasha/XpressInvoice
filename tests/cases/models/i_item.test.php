<?php 
/* SVN FILE: $Id$ */
/* IItem Test cases generated on: 2010-01-11 07:37:01 : 1263195421*/
App::import('Model', 'IItem');

class IItemTestCase extends CakeTestCase {
	var $IItem = null;
	var $fixtures = array('app.i_item', 'app.invoice', 'app.item');

	function startTest() {
		$this->IItem =& ClassRegistry::init('IItem');
	}

	function testIItemInstance() {
		$this->assertTrue(is_a($this->IItem, 'IItem'));
	}

	function testIItemFind() {
		$this->IItem->recursive = -1;
		$results = $this->IItem->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('IItem' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-11 07:37:01',
			'modified'  => '2010-01-11 07:37:01',
			'invoice_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>