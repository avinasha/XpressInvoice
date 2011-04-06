<?php 
/* SVN FILE: $Id$ */
/* ItemType Fixture generated on: 2010-01-11 17:11:17 : 1263229877*/

class ItemTypeFixture extends CakeTestFixture {
	var $name = 'ItemType';
	var $table = 'item_types';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-11 17:11:17',
		'modified'  => '2010-01-11 17:11:17',
		'name'  => 'Lorem ipsum dolor sit amet'
	));
}
?>