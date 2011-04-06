<?php 
/* SVN FILE: $Id$ */
/* Client Fixture generated on: 2010-01-31 07:21:55 : 1264922515*/

class ClientFixture extends CakeTestFixture {
	var $name = 'Client';
	var $table = 'clients';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'company' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
		'address' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'phno' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'company_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:21:55',
		'modified'  => '2010-01-31 07:21:55',
		'company'  => 'Lorem ipsum dolor sit amet',
		'email'  => 'Lorem ipsum dolor sit amet',
		'address'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'phno'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'name'  => 'Lorem ipsum dolor sit amet',
		'company_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>