<?php 
/* SVN FILE: $Id$ */
/* Profile Fixture generated on: 2010-01-31 07:24:52 : 1264922692*/

class ProfileFixture extends CakeTestFixture {
	var $name = 'Profile';
	var $table = 'profiles';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'lastLogin' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'user_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:24:52',
		'modified'  => '2010-01-31 07:24:52',
		'lastLogin'  => '2010-01-31 07:24:52',
		'user_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>