<?php
class InvoiceItem extends AppModel {

	var $name = 'InvoiceItem';
	var $validate = array(
		'quantity' => array('numeric'),
		'type' => array('notempty'),
		'invoice_id' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Invoice' => array(
			'className' => 'Invoice',
			'foreignKey' => 'invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>