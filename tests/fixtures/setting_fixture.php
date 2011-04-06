<?php 
/* SVN FILE: $Id$ */
/* Setting Fixture generated on: 2010-01-31 07:25:44 : 1264922744*/

class SettingFixture extends CakeTestFixture {
	var $name = 'Setting';
	var $table = 'settings';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'due' => array('type'=>'integer', 'null' => true, 'default' => '30'),
		'discount' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'tax1name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'tax1' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'tax2name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'tax2' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'shipping' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'currency' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'notes' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'taxids' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'lastinnum' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'company_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:25:44',
		'modified'  => '2010-01-31 07:25:44',
		'due'  => 1,
		'discount'  => 1,
		'tax1name'  => 'Lorem ipsum dolor ',
		'tax1'  => 'Lorem ipsum dolor ',
		'tax2name'  => 'Lorem ipsum dolor ',
		'tax2'  => 'Lorem ipsum dolor ',
		'shipping'  => 'Lorem ipsum dolor ',
		'currency'  => 'Lorem ipsum dolor sit amet',
		'notes'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'taxids'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'lastinnum'  => 'Lorem ipsum dolor sit amet',
		'company_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>