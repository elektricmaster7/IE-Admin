<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class SettingsController extends AppController {

  function admin_tools(){

    //TRANSLATION HELPER
    if($this->request->is(array('post', 'put'))){
      //GENERATE THE ACTUAL THINGS
    }

    //GET TABLE DATA FOR SETTINGS SYSTEMS
    $tables_list = $this->Setting->getTablesList();
    $this->set('tables', $tables_list);
  }

  //TODO: MAKE FILE CHECK FOR DUPLICATES SO NO MODELS ARE OVERWRITTEN
  function admin_generate_model(){
    if($this->request->is(array('post', 'put'))){
      $model_name = $this->request->data['Setting']['model_name'];
      $this->Generator->generateModel($model_name);
      $this->Session->setFlash(sprintf(__('O model %s foi criado com sucesso!'), $model_name), 'success');
      $this->redirect(array('action' => 'tools'));
    }
  }

  function admin_generate_translation(){
    if($this->request->is(array('post', 'put'))){
      $table_name = $this->request->data['Setting']['table_name'];
      $this->Generator->generateModel(Inflector::classify($table_name), true);
      $this->Setting->createTranslationTable($table_name);
      $this->Session->setFlash(sprintf(__('A tabela de tradução para a tabela %s e o respectivo model foram criados com sucesso!'), $table_name), 'success');
      $this->redirect(array('action' => 'tools'));
    }
  }
}
?>
