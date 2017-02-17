<?php
App::uses('AppController', 'Controller');
class NotificationsController extends AppController {

  function admin_index() {
    $notifications = $this->Notification->find('all', array(
			'conditions' => array(
				'OR' => array(
					'Notification.user_id' => $this->Authake->getUserId(),
					'Notification.user_id IS NULL'
				)
			),
			'order' => array('Notification.id DESC')
		));
		$this->set('notifications', $notifications);
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
