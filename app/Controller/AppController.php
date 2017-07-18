<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {

	var $uses = array('User','Rule','Group','Notification');
	var $components = array('Session', 'Cookie', 'RequestHandler', 'Authake', 'Generator');
	var $helpers = array('Form', 'Time', 'Html' => array('className' => 'HtmlPlus'), 'Session', 'Js', 'Authake', 'Material');
	var $counter = 0;

	function beforeFilter(){
		//LANGUAGE
		//THIS CHECKS THE SESSION FOR A LANGUAGE IF SET USES THAT LANGUAGE FOR TRANSLATION
		$this->__setLanguage();
		//AUTH
		//SETS THE ADMIN LAYOUT FROM THE PREFIX AND CALLS THE AUTHENTICATION METHODS
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') $this->layout = 'admin'; //SET ADMIN TEMPLATE FOR ADMIN PAGES
		$this->auth();

		//NOTIFICATIONS
		//GETS THE LATEST NOTIFICATIONS FOR DISPLAY IN THE ADMIN PANEL (IF ACTIVE)
		$this->getNotifications();
	}

	/*AUTHENTICATION SYSTEM*/
	private function auth(){
    Configure::write('Authake.useDefaultLayout', true);
    $this->Authake->beforeFilter($this);
  }

	//PASSWORD ENCODING FUNCTION
	function __makePassword($password1, $password2) {
		if ($password1 != $password2){
			$this->Session->setFlash(__('As passwords não são iguais!'), 'error');
			return false;
		}
		//TODO:CHANGE TO MAKE PASSWORD GREAT AGAIN
		return md5($password1);
	}

	/*NOTIFICATION SYSTEM*/
	function getNotifications(){
		$notifications = $this->Notification->find('all', array(
			'conditions' => array(
				'OR' => array(
					'Notification.user_id' => $this->Authake->getUserId(),
					'Notification.user_id IS NULL'
				)
			),
			'order' => array('Notification.id DESC'),
			'limit' => 3
		));
		$this->set('notifications', $notifications);
		$this->set('notifications_count', $this->Notification->find('count', array(
			'conditions' => array(
				'Notification.user_id' => $this->Authake->getUserId(),
				'Notification.viewed' => 0
			)
		)));
	}

	//THIS METHOD SETS A NOTIFICATION
	function setNotification($user_id, $message, $link){
		$this->Notification->create();
		$notification = array(
			'Notification' => array(
				'user_id' => $user_id,
				'viewed' => 0,
				'message' => $message,
				'link' => $link
			)
		);
		$this->Notification->save($notification);
	}

	/*TRANSLATION SYSTEM*/
	private function __setLanguage(){
		if(!isset($this->params['language']) && $this->Session->check('Config.language')){
			Configure::write('Config.language', $this->Session->read('Config.language'));
		}else if(isset($this->params['language']) && ($this->params['language'] != $this->Session->read('Config.language'))){
			$this->Session->write('Config.language', $this->params['language']);
			Configure::write('Config.language', $this->params['language']);
		}
	}

	//REDIRTECT FUNCTION OVERWRITTEN TO ACCOUNT FOR TRANSLATION
	public function redirect($url, $status = NULL, $exit = true){
		if(!isset($url['language']) && $this->Session->check('Config.language')){
			$url['language'] = $this->Session->read('Config.language');
		}
		parent::redirect($url, $status, $exit);
	}
}
