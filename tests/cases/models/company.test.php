<?php 
/* SVN FILE: $Id$ */
/* Company Test cases generated on: 2010-01-31 07:22:42 : 1264922562*/
App::import('Model', 'Company');

class CompanyTestCase extends CakeTestCase {
	var $Company = null;
	var $fixtures = array('app.company', 'app.setting', 'app.client', 'app.invoice', 'app.saved_item', 'app.user');

	function startTest() {
		$this->Company =& ClassRegistry::init('Company');
	}

	function testCompanyInstance() {
		$this->assertTrue(is_a($this->Company, 'Company'));
	}

	function testCompanyFind() {
		$this->Company->recursive = -1;
		$results = $this->Company->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Company' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-31 07:22:42',
			'modified'  => '2010-01-31 07:22:42',
			'name'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'accountStartDate'  => '2010-01-31',
			'accountEndDate'  => '2010-01-31',
			'url'  => 'Lorem ipsum dolor sit amet',
			'accounttype'  => 'Lorem ipsum dolor sit amet',
			'referrer'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>