<?php 
/* SVN FILE: $Id$ */
/* SavedItem Test cases generated on: 2010-01-31 07:25:13 : 1264922713*/
App::import('Model', 'SavedItem');

class SavedItemTestCase extends CakeTestCase {
	var $SavedItem = null;
	var $fixtures = array('app.saved_item', 'app.company');

	function startTest() {
		$this->SavedItem =& ClassRegistry::init('SavedItem');
	}

	function testSavedItemInstance() {
		$this->assertTrue(is_a($this->SavedItem, 'SavedItem'));
	}

	function testSavedItemFind() {
		$this->SavedItem->recursive = -1;
		$results = $this->SavedItem->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('SavedItem' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:25:13',
			'modified'  => '2010-01-31 07:25:13',
			'price'  => '2010-01-31 07:25:13',
			'quantity'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'total'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type'  => 'Lorem ipsum dolor sit amet',
			'company_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>