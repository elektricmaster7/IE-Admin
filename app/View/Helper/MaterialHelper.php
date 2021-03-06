<?php
class MaterialHelper extends AppHelper {

  var $helpers = array('Session', 'Html', 'Form', 'Authake');

  function adminLink($link, $name, $options = array()){
    if(!isset($options['icon'])) $options['icon'] = 'dehaze';
    if(isset($options['permissions'])){
      foreach($options['permissions'] as $group_id){
        if($this->Authake->isMemberOf($group_id)){
          return '<li><a href="'.$link.'"><i class="material-icons md-18">'.$options['icon'].'</i>'.$name.'</a></li>'; 
        }
      }
      return '';
    } else {
      return '<li><a href="'.$link.'"><i class="material-icons md-18">'.$options['icon'].'</i>'.$name.'</a></li>';
    }
  }

  function viewButton($controller, $id, $options = array()){
    if(!isset($options['icon'])) $options['icon'] = 'search';
    return '<a href="/admin/'.$controller.'/view/'.$id.'"><i class="material-icons md-24">'.$options['icon'].'</i></a>';
  }

  function editButton($controller, $id, $options = array()){
    if(!isset($options['icon'])) $options['icon'] = 'edit';
    return '<a href="/admin/'.$controller.'/edit/'.$id.'"><i class="material-icons md-24">'.$options['icon'].'</i></a>';
  }

  function deleteButton($controller, $id, $options = array()){
    if(!isset($options['icon'])) $options['icon'] = 'delete';
    $properties = '';
    if(isset($options['confirm']) && $options['confirm'] == true){
      if(!isset($options['title'])) $options['title'] = __('Confirmar');
      if(!isset($options['message'])) $options['message'] = __('Tem a certeza que pretende continuar a operação indicada?');
      $properties = 'href="#" data-href="/admin/'.$controller.'/delete/'.$id.'" data-toggle="modal" data-target="#confirmModal" data-title="'.$options['title'].'" data-message="'.$options['message'].'"';
    } else {
      $properties = 'href="/admin/'.$controller.'/delete/'.$id.'"';
    }

    return '<a '.$properties.'><i class="material-icons md-24">'.$options['icon'].'</i></a>';
  }

}
?>
