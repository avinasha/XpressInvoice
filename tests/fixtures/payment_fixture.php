<?php 
/* SVN FILE: $Id$ */
/* Payment Fixture generated on: 2010-01-31 07:24:40 : 1264922680*/

class PaymentFixture extends CakeTestFixture {
	var $name = 'Payment';
	var $table = 'payments';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'amount' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'date' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'invoice_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-01-31 07:24:40',
		'modified'  => '2010-01-31 07:24:40',
		'amount'  => '2010-01-31 07:24:40',
		'date'  => '2010-01-31',
		'invoice_id'  => 'Lorem ipsum dolor sit amet'
	));
}
?>