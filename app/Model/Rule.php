<?php
App::uses('AppModel', 'Model');
class Rule extends AppModel {
	var $name = 'Rule';
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'order' => 'Rule.order ASC'
		)
	);

	function getRules($group_ids, $cleanRegex = false) {

		if (is_array($group_ids)){
			//if no group get rules for the all users (with group_id is null)
			$groups = implode(',', $group_ids);
			$conditions = "Rule.group_id IN ({$groups}) OR Rule.group_id is NULL";
		}else{
			$conditions = 'Rule.group_id is NULL';
		}

		$fields = '';
		$order = 'Rule.order ASC, Rule.group_id ASC';
		$data = $this->find('all', array(
			'conditions'=>$conditions,
			'fields'=>$fields,
			'order'=>$order,
			'contain'=>array()
		));

		if ($cleanRegex){
			$nb = count($data);

			for ($i=0; $i<$nb; $i++){
				$data[$i]['Rule']['action'] = str_replace(array('/','*', ' or '), array('\/', '.*', '|'), $data[$i]['Rule']['action']);
			}
		}

		return $data;
	}
}
?>
