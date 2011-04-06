<?php 
/* SVN FILE: $Id$ */
/* IItem Fixture generated on: 2010-01-11 07:37:01 : 1263195421*/

class IItemFixture extends CakeTestFixture {
	var $name = 'IItem';
	var $table = 'i_items';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'invoice_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-11 07:37:01',
		'modified'  => '2010-01-11 07:37:01',
		'invoice_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>