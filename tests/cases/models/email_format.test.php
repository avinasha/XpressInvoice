<?php 
/* SVN FILE: $Id$ */
/* EmailFormat Test cases generated on: 2010-01-31 07:23:03 : 1264922583*/
App::import('Model', 'EmailFormat');

class EmailFormatTestCase extends CakeTestCase {
	var $EmailFormat = null;
	var $fixtures = array('app.email_format', 'app.setting');

	function startTest() {
		$this->EmailFormat =& ClassRegistry::init('EmailFormat');
	}

	function testEmailFormatInstance() {
		$this->assertTrue(is_a($this->EmailFormat, 'EmailFormat'));
	}

	function testEmailFormatFind() {
		$this->EmailFormat->recursive = -1;
		$results = $this->EmailFormat->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('EmailFormat' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:23:03',
			'modified'  => '2010-01-31 07:23:03',
			'invoice'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'thankyou'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reminder'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'signature'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'invoicehead'  => 'Lorem ipsum dolor sit amet',
			'thankyouhead'  => 'Lorem ipsum dolor sit amet',
			'reminderhead'  => 'Lorem ipsum dolor sit amet',
			'setting_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>