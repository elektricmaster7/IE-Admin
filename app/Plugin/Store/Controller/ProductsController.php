<?php
App::uses('AppController', 'Controller');
class ProductsController extends StoreAppController {
  public $uses = array('Store.Product');

  public function index(){
    //TODO: IMPLEMENT FUNCTION
    $this->set('products', $this->Product->find('all'));
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
