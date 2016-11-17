<?php
App::uses('AppController', 'Controller');
class RulesController extends AppController {
	var $uses = array('Rule');//var $scaffold;
	// var $layout = 'authake';
	function admin_index($tableonly = false) {
		$this->Rule->recursive = 0;
		$this->set('rules', $this->Rule->find('all'));
		$this->set('tableonly', $tableonly);
	}

	function admin_view($id = null) {

		if (!$id)
		{
			$this->Session->setFlash(__('Regra inválida.'), 'error');
			$this->redirect(array('action'=>'index'));
		}

		$this->set('rule', $this->Rule->read(null, $id));
	}

	function admin_add() {

		if (!empty($this->request->data))
		{
			$this->Rule->create();

			if ($this->Rule->save($this->request->data))
			{
				$this->Session->setFlash(__('Regra criada com sucesso!'), 'success');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Session->setFlash(__('A regra não pode ser guardada. Por favor, tente novamente!'), 'warning');
			}
		}

		$groups = $this->Rule->Group->find('list');
		$this->set(compact('groups'));// fix permissions dropdown menu
		$permissions = $this->Rule->getEnumValues('permission');
		$this->set(compact('permissions'));
	}

	function admin_edit($id = null) {//$this->Rule->getEnumValues('permission'));

		if (!$id && empty($this->request->data))
		{
			$this->Session->setFlash(__('Regra Inválida'), 'error');
			$this->redirect(array('action'=>'index'));
		}


		if ($id == '1')
		{// do not touch to the admin rule
			$this->Session->setFlash(__('Não pode editar esta regra!'), 'warning');
			$this->redirect(array('action'=>'index'));
		}


		if (!empty($this->request->data))
		{

			if ($this->Rule->save($this->request->data))
			{
				$this->Session->setFlash(__('Regra editada com sucesso!'), 'success');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Session->setFlash(__('A regra não pode ser guardada. Por favor, tente novamente!'), 'warning');
			}
		}


		if (empty($this->request->data))
		{
			$this->request->data = $this->Rule->read(null, $id);
		}

		// fix groups dropdown menu
		$groups = $this->Rule->Group->find('list');
		$this->set(compact('groups'));// fix permissions dropdown menu
		$permissions = $this->Rule->getEnumValues('permission');
		$this->set(compact('permissions'));
	}

	function admin_delete($id = null) {

		if (!$id)
		{
			$this->Session->setFlash(__('O ID da regra é inválido!'), 'error');
		}
		elseif ($id == '1')
		{// do not touch to the admin rule
			$this->Session->setFlash(__('Esta regra não pode ser eliminada!'), 'warning');
		}
		elseif ($this->Rule->delete($id))
		{
			$this->Session->setFlash(__('Regra eliminada.'), 'success');
		}

		$this->redirect(array('action'=>'index'));
	}

	function up($id1, $id2) {// swap order of two rules

		if ($id1 != 1 && $id2 != 1)
		{
			$r1 = $this->Rule->findById($id1);
			$r2 = $this->Rule->findById($id2);//            pr(array($r1,$r2));
			$order = $r1['Rule']['order'];
			$r1['Rule']['order'] = $r2['Rule']['order'];
			$r2['Rule']['order'] = $order;//            pr(array($r1,$r2));
			$this->Rule->save($r1);
			$this->Rule->save($r2);
		}

		$this->redirect(array('action'=>'index'));
	}
}
?>
