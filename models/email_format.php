<?php
class EmailFormat extends AppModel {

	var $name = 'EmailFormat';
	var $validate = array(
		'setting_id' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Setting' => array(
			'className' => 'Setting',
			'foreignKey' => 'setting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>