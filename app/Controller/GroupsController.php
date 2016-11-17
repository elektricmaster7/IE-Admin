<?php
App::uses('AppController', 'Controller');
class GroupsController extends AppController {

	var $paginate = array(
            'limit' => 100000,
            'order' => array(
                'Group.id' => 'asc'
            )
        );

  var $uses = array('Group', 'Rule');

	function admin_index($tableonly = false) {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
    $this->set('tableonly', $tableonly);
	}

	function admin_view($id = null, $viewactions = null) {
		if (!$id) {
			$this->Session->setFlash(__('Grupo inválido.'), 'warning');
			$this->redirect(array('action'=>'index'));
		}

        $this->set('group', $this->Group->read(null, $id));
        $this->set('rules', $this->Rule->getRules(array($id)));

        if ($viewactions === 'actions')
            $this->set('actions', $this->Authake->getActionsPermissions(array($id)));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('Grupo criado com sucesso!'), 'success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('O grupo não pode ser guardado. Por favor, tente novamente!'), 'error');
			}
		}
		($users = $this->Group->User->find('list', array("fields"=>array("User.id", "User.login"))));
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Grupo inválido.'), 'warning');
            $this->redirect(array('action'=>'index'));
        }

        if ($id == 1 and !in_array(1, $this->Authake->getGroupIds())) {
            $this->Session->setFlash(__('Não pode editar o grupo dos administratores!'), 'warning');
            $this->redirect(array('action'=>'index'));
        }

		if (!empty($this->request->data)) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('Grupo editado com sucesso!'), 'success');
			} else {
				$this->Session->setFlash(__('O grupo não pode ser guardado. Por favor, tente novamente!'), 'error');
			}
            $this->redirect(array('action'=>'index'));
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Group->read(null, $id);
		}


// !!! CAKE BUG !!! should return array(array('id'=>'login), ...)
// resolved in https://trac.cakephp.org/changeset/6360
        $users = $this->Group->User->find('list', array("fields"=>array("User.id", "User.login")));

/*
        $users = $this->Group->User->find('all');
        $users = Set::combine($users, '{n}.User.id', '{n}.User.login');
 */
        $this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id || $id == 1) {
			$this->Session->setFlash(__('Este grupo não pode ser eliminado!'), 'error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Group->delete($id)) {
			$this->Session->setFlash(__('Grupo eliminado.'), 'success');
			$this->redirect(array('action'=>'index'));
		}
	}

}

?>
