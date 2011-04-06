<?php 
/* SVN FILE: $Id$ */
/* Company Fixture generated on: 2010-01-31 07:22:42 : 1264922562*/

class CompanyFixture extends CakeTestFixture {
	var $name = 'Company';
	var $table = 'companies';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'accountStartDate' => array('type'=>'date', 'null' => true, 'default' => NULL),
		'accountEndDate' => array('type'=>'date', 'null' => true, 'default' => NULL),
		'url' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'accounttype' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'referrer' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'url' => array('column' => 'url', 'unique' => 1))
	);
	var $records = array(array(
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
}
?>