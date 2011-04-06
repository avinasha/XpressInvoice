<?php 
/* SVN FILE: $Id$ */
/* ItemType Test cases generated on: 2010-01-11 17:11:17 : 1263229877*/
App::import('Model', 'ItemType');

class ItemTypeTestCase extends CakeTestCase {
	var $ItemType = null;
	var $fixtures = array('app.item_type', 'app.item');

	function startTest() {
		$this->ItemType =& ClassRegistry::init('ItemType');
	}

	function testItemTypeInstance() {
		$this->assertTrue(is_a($this->ItemType, 'ItemType'));
	}

	function testItemTypeFind() {
		$this->ItemType->recursive = -1;
		$results = $this->ItemType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ItemType' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-11 17:11:17',
			'modified'  => '2010-01-11 17:11:17',
			'name'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>