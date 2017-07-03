<?php
App::uses('AppModel', 'Model');
class Setting extends AppModel {
  var $name = 'Setting';

  //TRANSLATION

  /*
  * function getTablesList($ignore_sys_tables)
  * This function gets all the tables from the database
  * @param $ignore_sys_tables This param ignores the system tables when returning the
  * result tables
  */
  //TODO: Remove already translated ready models
  function getTablesList($ignore_sys_tables = false){
    $system_tables = array('groups_users'=>'groups_users','rules'=>'rules','settings'=>'settings');
    $table_schema = $this->query("SELECT TABLE_NAME AS name FROM INFORMATION_SCHEMA.TABLES AS Backend WHERE TABLE_SCHEMA<>'information_schema' AND TABLE_NAME NOT LIKE '%_translations'");
		$table_list = array();
		foreach($table_schema as $tables){
			$table_list[$tables['Backend']['name']] = $tables['Backend']['name'];
		}
    if($ignore_sys_tables){
      return $table_list;
    }else{
      $tables_list_clear = array_diff($table_list, $system_tables);
      return $tables_list_clear;
    }
  }

  /*
  * function createTranslationTable($model)
  * This function creates a translation table for the table passed as param
  * @param $table_name Name of the table selected
  */
  function createTranslationTable($table_name){
    $tableName = Inflector::singularize($table_name);
    $this->query("CREATE TABLE `".$tableName."_translations` (
    	`id` INT(10) NOT NULL AUTO_INCREMENT,
    	`locale` VARCHAR(6) NOT NULL,
    	`model` VARCHAR(255) NOT NULL,
    	`foreign_key` INT(10) NOT NULL,
    	`field` VARCHAR(255) NOT NULL,
    	`content` TEXT NULL,
    	PRIMARY KEY (`id`),
    	INDEX `locale` (`locale`),
    	INDEX `model` (`model`),
    	INDEX `row_id` (`foreign_key`),
    	INDEX `field` (`field`)
    )COLLATE='utf8_general_ci' ENGINE=InnoDB;");
  }
}
?>
