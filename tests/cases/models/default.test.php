<?php 
/* SVN FILE: $Id$ */
/* Default Test cases generated on: 2010-01-11 15:36:22 : 1263224182*/
App::import('Model', 'Default');

class DefaultTestCase extends CakeTestCase {
	var $Default = null;
	var $fixtures = array('app.default', 'app.company');

	function startTest() {
		$this->Default =& ClassRegistry::init('Default');
	}

	function testDefaultInstance() {
		$this->assertTrue(is_a($this->Default, 'Default'));
	}

	function testDefaultFind() {
		$this->Default->recursive = -1;
		$results = $this->Default->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Default' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-01-11 15:36:21',
			'modified'  => '2010-01-11 15:36:21',
			'currencysymbol'  => 'Lorem ipsum dolor sit amet',
			'currency'  => 'Lorem ipsum dolor sit amet',
			'tax1'  => 'Lorem ipsum dolor sit amet',
			'tax1name'  => 'Lorem ipsum dolor sit amet',
			'tax2'  => 'Lorem ipsum dolor sit amet',
			'tax2name'  => 'Lorem ipsum dolor sit amet',
			'company_id'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>