<?php
App::uses('AppController', 'Controller');
class CategoriesController extends StoreAppController {
  public $uses = array('Store.Category');

  public function index(){
    //TODO: IMPLEMENT FUNCTION
    $this->set('categories', $this->Category->find('all'));
  }

  public function admin_index(){
    //TODO: IMPLEMENT FUNCTION
  }

  public function admin_add(){
    //TODO: IMPLEMENT FUNCTION
  }

  public function admin_edit(){
    //TODO: IMPLEMENT FUNCTION
  }

  public function admin_delete(){
    //TODO: IMPLEMENT FUNCTION
  }
}
?>
