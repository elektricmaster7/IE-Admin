<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class SettingsController extends AppController {

  function admin_tools(){

    if($this->request->is(array('post', 'put'))){
      //SAVE SYSTEM SETTINGS
      if($this->Setting->save($this->request->data)){
        $this->Session->setFlash(__('Definições editadas com sucesso!'), 'success');
        $this->redirect(array('action'=>'tools'));
      } else {
        $this->Session->setFlash(__('Erro ao editar definições!'), 'error');
      }
    }

    //GET SYSTEM SETTINGS
    $this->request->data = $this->Setting->find('first');

    //GET TABLE DATA FOR SETTINGS SYSTEMS
    $tables_list = $this->Setting->getTablesList();
    $this->set('tables', $tables_list);
  }

  //TODO: MAKE FILE CHECK FOR DUPLICATES SO NO MODELS ARE OVERWRITTEN
  function admin_generate_model(){
    if($this->request->is(array('post', 'put'))){
      $model_name = $this->request->data['Setting']['model_name'];
      if($this->Generator->generateModel($model_name)){
        $this->Session->setFlash(sprintf(__('O model %s foi criado com sucesso!'), $model_name), 'success');
      }else{
        $this->Session->setFlash(__('Erro ao criar o model indicado!'), 'error');
      }
      $this->redirect(array('action' => 'tools'));
    }
  }

  function admin_generate_translation(){
    if($this->request->is(array('post', 'put'))){
      $table_name = $this->request->data['Setting']['table_name'];
      if($this->Generator->generateModel(Inflector::classify($table_name), true)){
        $this->Setting->createTranslationTable($table_name);
        $this->Session->setFlash(sprintf(__('A tabela de tradução para a tabela %s e o respectivo model foram criados com sucesso!'), $table_name), 'success');
      }else{
        $this->Session->setFlash(__('Erro ao criar tabela de tradução para o model indicado!'), 'error');
      }
      $this->redirect(array('action' => 'tools'));
    }
  }

  /**
   * This function is meant to be used as a getter for a translated url if you have the url to be
   * reformated in text form ex: /admin/settings/tools returns /admin/{lang}/settings/tools
   * @method get_translate_url
   * @author João Redondo (IE)
   * @return string    A finished version url ready to be used in redirection
   */
  public function get_translate_url(){
    $this->autoRender = false;
    $route = Router::parse($this->request->data['url']);
    $route['language'] = $this->request->data['language'];
    return Router::url($route);
  }
}
?>
