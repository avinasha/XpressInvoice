<?php 
/* SVN FILE: $Id$ */
/* Action Fixture generated on: 2010-01-31 07:19:26 : 1264922366*/

class ActionFixture extends CakeTestFixture {
	var $name = 'Action';
	var $table = 'actions';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
		'user_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'invoice_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:19:26',
		'modified'  => '2010-01-31 07:19:26',
		'type'  => 'Lorem ipsum dolor sit amet',
		'user_id'  => 'Lorem ipsum dolor sit amet',
		'invoice_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>