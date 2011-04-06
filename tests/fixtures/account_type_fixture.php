<?php 
/* SVN FILE: $Id$ */
/* AccountType Fixture generated on: 2010-01-11 15:31:45 : 1263223905*/

class AccountTypeFixture extends CakeTestFixture {
	var $name = 'AccountType';
	var $table = 'account_types';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50, 'key' => 'unique'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-11 15:31:45',
		'modified'  => '2010-01-11 15:31:45',
		'name'  => 'Lorem ipsum dolor sit amet'
	));
}
?>