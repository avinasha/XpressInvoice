<?php 
/* SVN FILE: $Id$ */
/* AccountType Test cases generated on: 2010-01-11 15:31:46 : 1263223906*/
App::import('Model', 'AccountType');

class AccountTypeTestCase extends CakeTestCase {
	var $AccountType = null;
	var $fixtures = array('app.account_type', 'app.company');

	function startTest() {
		$this->AccountType =& ClassRegistry::init('AccountType');
	}

	function testAccountTypeInstance() {
		$this->assertTrue(is_a($this->AccountType, 'AccountType'));
	}

	function testAccountTypeFind() {
		$this->AccountType->recursive = -1;
		$results = $this->AccountType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AccountType' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-11 15:31:45',
			'modified'  => '2010-01-11 15:31:45',
			'name'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>