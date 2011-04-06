<?php
class Setting extends AppModel {

	var $name = 'Setting';
	var $validate = array(
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

	var $hasOne = array(
		'EmailFormat' => array(
			'className' => 'EmailFormat',
			'foreignKey' => 'setting_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>