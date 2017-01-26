<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
	var $name = 'User';
	var $recursive = 1;
	var $hasAndBelongsToMany = array(
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'groups_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

function beforeValidate($options = array()){
    $validateOptions = array();
    if(!Configure::read('Authake.useEmailAsUsername')){
        $loginOptions = array('login' => array(
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => __('Apenas são permitidos caracteres alfanumericos')
            ),
            'minlength' => array(
                'rule' => array('minLength', ( Configure::read('Authake.useEmailAsUsername') ? '0' : '3' )),
                /* set min length to 0 if we do not want usernames but only emails*/
                'message' => __('Comprimento minimo de 3 caracteres')
            ),
            'maxlength' => array(
                'rule' => array('maxLength', '32'),
                'message' => __('Comprimento máximo de 32 caracteres')
            ),
        ));
        $validateOptions = $loginOptions;
    }
    $otherOptions = array(
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message'=>__('Preencha o campo de email')
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message'=>__('O email indicado já está em uso'),
                'on'=>'create'
            ),
            /*'emailAddress' => array('rule' => array('email', true),'message' => __('Please supply a valid email address'))*/
        ),
				'password' => array(
					'notEmpty' => array(
						'rule' => array('notBlank'),
						'message' => __('A password deve ser preenchida'),
						'on' => 'create'
					)
				),
        'password1' => array(
            'checkEmpty' => array(
            'rule' => array('notBlank'),
            'message' => __('As passwords devem ser iguais e preenchidas'),
            'on' => 'create'
                )
        ),
        'password2' => array(
            'checkInsertPass' => array(
                'rule' => array('notBlank'),
                'message' => __('As passwords devem ser iguais e preenchidas'),
                'on' => 'create'
            )
        )
    );
    $validateOptions += $otherOptions;
    $this->validate = $validateOptions;
}

function checkPasswords()
{
	if (($this->request->data['User']['password1'] != $this->request->data['User']['password2'])){
		return false;
	}

	return true;
}

function getLoginData($login='', $password=''){
	$hashed = md5($password);

	if (Configure::read('Authake.useEmailAsUsername') == false){
		$data = $this->find('first', array('conditions'=>array('login'=>$login, 'password'=>$hashed), 'recursive' => 1));
	}else{
		$data = $this->find('first', array('conditions'=>array('email'=>$login, 'password'=>$hashed), 'recursive' => 1));
	}

	if (!empty($data)){
	/*
	$data['User']['group_ids'][] = 0; // everybody is at least a guest
	$data['User']['group_names'][] = __('Guest');
	*/

		if (!empty($data['Group'])){
			foreach ($data['Group'] as $group){
				$data['User']['group_ids'][] = $group['id'];
				$data['User']['group_names'][] = $group['name'];
			}
		}

		unset($data['User']['password']);// not useful to save the encrypted password in session
		return $data;
	}else{
		return false;
	}
}

	function getGroups($id){
		$groups = $this->findById($id);//SORUN TAM DA BURADA OLABİLİR
		$list = array(0);

		foreach ($groups['Group'] as $group){
			$list[] = $group['id'];
		}

		return $list;//var_dump($list);
	}
}
?>
