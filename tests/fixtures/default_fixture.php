<?php 
/* SVN FILE: $Id$ */
/* Default Fixture generated on: 2010-01-11 15:36:21 : 1263224181*/

class DefaultFixture extends CakeTestFixture {
	var $name = 'Default';
	var $table = 'defaults';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'currencysymbol' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'currency' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'tax1' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'tax1name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'tax2' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'tax2name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'company_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
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
}
?>