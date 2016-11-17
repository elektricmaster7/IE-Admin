<?php
App::uses('AppModel', 'Model');
class Group extends AppModel {
	var $name = 'Group';
	var $recursive = 1;
	var $hasMany = array(
		'Rule' => array(
			'className' => 'Rule',
			'exclusive' => false,
			'dependent' => false,
			'foreignKey' => 'group_id',
			'order' => 'Rule.order ASC'
		)
	);
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'groups_users',
			'foreignKey' => 'group_id',
			'associationForeignKey'=> 'user_id',
			'order' => 'User.id',
			'displayField' => 'login'
		)
	);
}
?>
