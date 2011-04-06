<?php 
/* SVN FILE: $Id$ */
/* Item Fixture generated on: 2010-01-15 06:40:30 : 1263537630*/

class ItemFixture extends CakeTestFixture {
	var $name = 'Item';
	var $table = 'items';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'price' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'quantity' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'total' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'saved' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
		'invoice_item_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'company_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-15 06:40:30',
		'modified'  => '2010-01-15 06:40:30',
		'price'  => '2010-01-15 06:40:30',
		'quantity'  => 1,
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'total'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'type'  => 'Lorem ipsum dolor sit amet',
		'saved'  => 1,
		'invoice_item_id'  => 'Lorem ipsum dolor sit amet',
		'company_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>