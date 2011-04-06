<?php 
/* SVN FILE: $Id$ */
/* Invoice Fixture generated on: 2010-01-31 07:24:22 : 1264922662*/

class InvoiceFixture extends CakeTestFixture {
	var $name = 'Invoice';
	var $table = 'invoices';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'number' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
		'date' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'ponumber' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'podate' => array('type'=>'date', 'null' => true, 'default' => NULL),
		'dc' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'due' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'discount' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'tax1' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'tax1name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 30),
		'tax2' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'tax2name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 30),
		'shipping' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'currency' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'notes' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'lastModifiedBy' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
		'createdBy' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
		'status' => array('type'=>'string', 'null' => false, 'default' => 'Draft', 'length' => 10),
		'total' => array('type'=>'float', 'null' => false, 'default' => '0'),
		'roundoff' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
		'company_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'client_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:24:22',
		'modified'  => '2010-01-31 07:24:22',
		'number'  => 'Lorem ipsum dolor sit amet',
		'date'  => '2010-01-31',
		'ponumber'  => 'Lorem ipsum dolor sit amet',
		'podate'  => '2010-01-31',
		'dc'  => 'Lorem ipsum dolor sit amet',
		'due'  => 1,
		'discount'  => 1,
		'tax1'  => 1,
		'tax1name'  => 'Lorem ipsum dolor sit amet',
		'tax2'  => 'Lorem ipsum dolor sit amet',
		'tax2name'  => 'Lorem ipsum dolor sit amet',
		'shipping'  => 'Lorem ipsum dolor sit amet',
		'currency'  => 'Lorem ipsum dolor sit amet',
		'notes'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'lastModifiedBy'  => 'Lorem ipsum dolor sit amet',
		'createdBy'  => 'Lorem ipsum dolor sit amet',
		'status'  => 'Lorem ip',
		'total'  => 'Lorem ip',
		'roundoff'  => 1,
		'company_id'  => 'Lorem ipsum dolor sit amet',
		'client_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>