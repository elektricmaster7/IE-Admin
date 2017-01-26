<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	var $uses = array('User', 'Rule');
	var $components = array('Filter','Session');// var $layout = 'authake';

	function admin_index() {
		$this->User->recursive = 1;
		$filter = $this->Filter->process($this);
		$this->set('users', $this->User->find('all', array(
			'order' => array('User.id ASC')
		)));
	}

	function admin_view($id = null, $viewactions = null) {
		$this->User->recursive = 1;// to select user, groups and rules

		if (!$id){
			$this->Session->setFlash(__('Utilizador inválido!'));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('user', $this->User->read(null, $id));
		$groups = $this->User->getGroups($id);
		$this->set('rules', $this->Rule->getRules($groups));

		if ($viewactions === 'actions')
		{
			$this->set('actions', $this->Authake->getActionsPermissions($groups));
		}
	}

	function admin_add() {

		if (!empty($this->request->data)){// only an admin can make an admin

			if (in_array(1, $this->request->data['Group']['Group']) and !in_array(1, $this->Authake->getGroupIds())){
				$this->Session->setFlash(__('Não pode adicionar um utilizador ao grupo de administradores'), 'warning');
				$this->redirect(array('action'=>'index'));
			}

			if($this->Authake->isMemberOf(2)){
				$this->request->data['Group']['Group'][0] = 3; //MAKE ALL USERS ADDED BY GESTOR NORMAL USERS
			}

			$p = $this->request->data['User']['password'];
			$this->request->data['User']['password'] = $this->__makePassword($p, $p);
			$this->User->create();

			if ($this->User->save($this->request->data)){
				$this->Session->setFlash(__('O utilizador foi adicionado.'), 'success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Erro ao adicionar utilizador! Tente novamente.'), 'error');
			}
		}

		$this->request->data['User']['password'] = '';
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function admin_edit($id = null) {

		if (!$id && empty($this->request->data)){
			$this->Session->setFlash(__('Utilizador inválido!'));
			$this->redirect(array('action'=>'index'));
		}

		$user = $this->User->read(null, $id);// check if user allow to edit (only an admin can edit an admin)
		$gr = Set::extract($user, 'Group.{n}.id');

		if (in_array(1, $gr) and !in_array(1, $this->Authake->getGroupIds()))
		{
			$this->Session->setFlash(__('Não pode editar um utilizador do grupo de administradores'), 'warning');
			$this->redirect(array('action'=>'index'));
		}


		if (!empty($this->request->data))
		{// only Admin (id 1) can modify its profile (for security reasons)

			if ($id == 1 && $this->Authake->getUserId() != 1)
			{
				$this->Session->setFlash(__('Apenas o admin pode editar o seu perfil!'), 'warning');
				$this->redirect(array('action'=>'index'));
			}

			// only an admin can make an admin

			if ($this->request->data['Group']['Group'] == '')
			{
				$this->request->data['Group']['Group'] = array();
			}


			if (isset($this->request->data['Group']['Group']) and in_array(1, $this->request->data['Group']['Group']) and !in_array(1, $this->Authake->getGroupIds()) )
			{
				$this->Session->setFlash(__('Não pode editar um utilizador no grupo de administradores'), 'warning');
				$this->redirect(array('action'=>'index'));
			}

			// check if pwd changed

			if ($p = $this->request->data['User']['password'])
			{
				$this->request->data['User']['password'] = $this->__makePassword($p, $p);
			}
			else
			{
				unset($this->request->data['User']['password']);
			}

			//DONT SET EMPTY GROUPS
			/*if (empty($this->request->data['Group']))
			{
				$this->request->data['Group']['Group'] = array();
			}*/
			if(($this->Authake->isMemberOf(2) || $this->Authake->isMemberOf(3)) && $id != 2){
				$this->request->data['Group']['Group'][0] = 3; //MAKE ALL USERS ADDED BY GESTOR NORMAL USERS
			}else if($this->Authake->isMemberOf(2) && $id == 2){
				$this->request->data['Group']['Group'][0] = 2; //SET ALWAYS GESTOR
			}

			// delete user-group relation if selection empty
			unset($this->request->data['User']['login']);// never change the login
			// save user

			if ($this->User->save($this->request->data))
			{
				$this->Session->setFlash(__('O utilizador foi editado.'), 'success');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Session->setFlash(__('Erro ao editar utilizador! Tente novamente.'), 'error');
			}
		}

		// show edit form
		$this->request->data = $user;
		$this->request->data['User']['password'] = '';// find groups
		$groups = $this->User->Group->find('list');
		unset($groups[0]);// remove group 0 (everybody)
		$this->set(compact('groups'));
	}

	function admin_delete($id = null) {// check if user in admins group
		$user = $this->User->read(null, $id);

		if (!$id || $id == 1)
		{
			$this->Session->setFlash(__('ID de utilizador inválido!'), 'error');
			$this->redirect(array('action'=>'index'));
		}

		// check if user allow to edit (only an admin can edit an admin)
		$gr = Set::extract($user, 'Group.{n}.id');

		if (in_array(1, $gr) and !in_array(1, $this->Authake->getGroupIds()))
		{
			$this->Session->setFlash(__('Não pode eliminar um utilizador no grupo de administradores'), 'warning');
			$this->redirect(array('action'=>'index'));
		}


		if ($this->User->delete($id))
		{
			$this->Session->setFlash(__('Utilizador eliminado'), 'success');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>
