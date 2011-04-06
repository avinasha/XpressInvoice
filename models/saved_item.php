<?php
class SavedItem extends AppModel {

	var $name = 'SavedItem';
	var $validate = array(
		'quantity' => array('numeric'),
		'type' => array('notempty'),
		'company_id' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>