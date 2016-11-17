<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
	var $uses = array('User','Rule','Group');
	var $components = array('Session', 'RequestHandler', 'Authake');
	var $helpers = array('Form', 'Time', 'Html','Session', 'Js', 'Authake');
	var $counter = 0;

	function beforeFilter(){
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') $this->layout = 'admin'; //SET ADMIN TEMPLATE FOR ADMIN PAGES
		$this->auth();
	}

	private function auth(){
    Configure::write('Authake.useDefaultLayout', true);
    $this->Authake->beforeFilter($this);
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
