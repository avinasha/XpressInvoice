<?php 
/* SVN FILE: $Id$ */
/* Action Test cases generated on: 2010-01-31 07:19:26 : 1264922366*/
App::import('Model', 'Action');

class ActionTestCase extends CakeTestCase {
	var $Action = null;
	var $fixtures = array('app.action', 'app.user', 'app.invoice');

	function startTest() {
		$this->Action =& ClassRegistry::init('Action');
	}

	function testActionInstance() {
		$this->assertTrue(is_a($this->Action, 'Action'));
	}

	function testActionFind() {
		$this->Action->recursive = -1;
		$results = $this->Action->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Action' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:19:26',
			'modified'  => '2010-01-31 07:19:26',
			'type'  => 'Lorem ipsum dolor sit amet',
			'user_id'  => 'Lorem ipsum dolor sit amet',
			'invoice_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>