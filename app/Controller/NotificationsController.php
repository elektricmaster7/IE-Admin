<?php
App::uses('AppController', 'Controller');
class NotificationsController extends AppController {

  function admin_index() {

  }

  function admin_view($id = null){
    if($id != null){
      $this->Notification->id = $id;
      $this->Notification->set('viewed', 1);
      $this->Notification->save();
      $notification = $this->Notification->read('Notification.link', $id);
      $this->redirect($notification['Notification']['link']);
    } else {
      $this->Session->setFlash(__('Notificação inválida!'), 'error');
      $this->redirect('/admin');
    }
  }
}
?>
