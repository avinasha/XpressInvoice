<?php 
/* SVN FILE: $Id$ */
/* Client Test cases generated on: 2010-01-31 07:21:55 : 1264922515*/
App::import('Model', 'Client');

class ClientTestCase extends CakeTestCase {
	var $Client = null;
	var $fixtures = array('app.client', 'app.company', 'app.invoice');

	function startTest() {
		$this->Client =& ClassRegistry::init('Client');
	}

	function testClientInstance() {
		$this->assertTrue(is_a($this->Client, 'Client'));
	}

	function testClientFind() {
		$this->Client->recursive = -1;
		$results = $this->Client->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Client' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:21:55',
			'modified'  => '2010-01-31 07:21:55',
			'company'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'address'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'phno'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'name'  => 'Lorem ipsum dolor sit amet',
			'company_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>