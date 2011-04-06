<?php 
/* SVN FILE: $Id$ */
/* InvoiceItem Fixture generated on: 2010-01-31 07:23:24 : 1264922604*/

class InvoiceItemFixture extends CakeTestFixture {
	var $name = 'InvoiceItem';
	var $table = 'invoice_items';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'price' => array('type'=>'float', 'null' => false, 'default' => '0'),
		'quantity' => array('type'=>'integer', 'null' => false, 'default' => '1'),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'type' => array('type'=>'string', 'null' => false, 'default' => 'Product', 'length' => 20),
		'order' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'invoice_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'price'  => 'Lorem ipsum dolor sit amet',
		'quantity'  => 1,
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'type'  => 'Lorem ipsum dolor ',
		'order'  => 1,
		'created'  => '2010-01-31 07:23:24',
		'modified'  => '2010-01-31 07:23:24',
		'invoice_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>