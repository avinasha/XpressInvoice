<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2010-01-31 07:26:10 : 1264922770*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
		'email' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'username' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50, 'key' => 'unique'),
		'password' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'active' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'role' => array('type'=>'string', 'null' => false, 'default' => 'user', 'length' => 20),
		'company_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'username' => array('column' => 'username', 'unique' => 1), 'email' => array('column' => 'email', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:26:10',
		'modified'  => '2010-01-31 07:26:10',
		'name'  => 'Lorem ipsum dolor sit amet',
		'email'  => 'Lorem ipsum dolor sit amet',
		'username'  => 'Lorem ipsum dolor sit amet',
		'password'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'active'  => 1,
		'role'  => 'Lorem ipsum dolor ',
		'company_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>