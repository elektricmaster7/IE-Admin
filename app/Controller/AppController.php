<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
	var $uses = array('User','Rule','Group','Notification');
	var $components = array('Session', 'RequestHandler', 'Authake');
	var $helpers = array('Form', 'Time', 'Html','Session', 'Js', 'Authake', 'Material');
	var $counter = 0;

	function beforeFilter(){
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') $this->layout = 'admin'; //SET ADMIN TEMPLATE FOR ADMIN PAGES
		$this->auth();
		$this->getNotifications();
	}

	private function auth(){
    Configure::write('Authake.useDefaultLayout', true);
    $this->Authake->beforeFilter($this);
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

	function __makePassword($password1, $password2) {

		if ($password1 != $password2)
		{
			$this->Session->setFlash(__('As passwords não são iguais!'), 'error');
			return false;
		}
		//TODO:CHANGE TO MAKE PASSWORD GREAT AGAIN
		return md5($password1);
	}
}
