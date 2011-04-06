<?php 
/* SVN FILE: $Id$ */
/* EmailFormat Fixture generated on: 2010-01-31 07:23:03 : 1264922583*/

class EmailFormatFixture extends CakeTestFixture {
	var $name = 'EmailFormat';
	var $table = 'email_formats';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'invoice' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'thankyou' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'reminder' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'signature' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'invoicehead' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'thankyouhead' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'reminderhead' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'setting_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:23:03',
		'modified'  => '2010-01-31 07:23:03',
		'invoice'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'thankyou'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'reminder'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'signature'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'invoicehead'  => 'Lorem ipsum dolor sit amet',
		'thankyouhead'  => 'Lorem ipsum dolor sit amet',
		'reminderhead'  => 'Lorem ipsum dolor sit amet',
		'setting_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>