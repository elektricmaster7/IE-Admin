<?php
App::uses('AppController', 'Controller');
class SettingsController extends AppController {

  private $system_tables = array('i18n'=>'i18n','groups_users'=>'groups_users','rules'=>'rules','settings'=>'settings');

  function admin_tools(){

    //TRANSLATION HELPER
    if($this->request->is(array('post', 'put'))){
      //GENERATE THE ACTUAL THINGS
    }

    //GET TABLE DATA FOR SETTINGS SYSTEMS
    $table_schema = $this->User->query("SELECT TABLE_NAME AS name FROM INFORMATION_SCHEMA.TABLES AS Setting WHERE TABLE_SCHEMA<>'information_schema' AND TABLE_NAME NOT LIKE '%_translations'");
    $table_list = array();
    foreach($table_schema as $tables){
      $tables_list[$tables['Setting']['name']] = $tables['Setting']['name'];
    }
    
    $tables_list_clear = array_diff($tables_list, $this->system_tables);
    $this->set('tables', $tables_list_clear);
  }
}
?>
