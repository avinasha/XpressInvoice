<?php 
/* SVN FILE: $Id$ */
/* Setting Test cases generated on: 2010-01-31 07:25:44 : 1264922744*/
App::import('Model', 'Setting');

class SettingTestCase extends CakeTestCase {
	var $Setting = null;
	var $fixtures = array('app.setting', 'app.company', 'app.email_format');

	function startTest() {
		$this->Setting =& ClassRegistry::init('Setting');
	}

	function testSettingInstance() {
		$this->assertTrue(is_a($this->Setting, 'Setting'));
	}

	function testSettingFind() {
		$this->Setting->recursive = -1;
		$results = $this->Setting->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Setting' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:25:44',
			'modified'  => '2010-01-31 07:25:44',
			'due'  => 1,
			'discount'  => 1,
			'tax1name'  => 'Lorem ipsum dolor ',
			'tax1'  => 'Lorem ipsum dolor ',
			'tax2name'  => 'Lorem ipsum dolor ',
			'tax2'  => 'Lorem ipsum dolor ',
			'shipping'  => 'Lorem ipsum dolor ',
			'currency'  => 'Lorem ipsum dolor sit amet',
			'notes'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'taxids'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'lastinnum'  => 'Lorem ipsum dolor sit amet',
			'company_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>