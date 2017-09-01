<?php
class MaterialHelper extends AppHelper {

  var $helpers = array('Session', 'Html', 'Form', 'Authake');

  function adminLink($link, $name, $options = array()){
    $c_link = Router::parse($link);
    $c_here = Router::parse($this->here);
    if(isset($c_here['language'])) unset($c_here['language']);
    if($c_link == $c_here) { $active = "active"; } else { $active = ""; }
    if(!isset($options['icon'])) $options['icon'] = 'dehaze';
    if(isset($options['permissions'])){
      foreach($options['permissions'] as $group_id){
        if($this->Authake->isMemberOf($group_id)){
          return '<li><a href="'.$link.'" class="'.$active.' "><i class="material-icons md-18">'.$options['icon'].'</i>'.$name.'</a></li>';
        }
      }
      return '';
    } else {
      return '<li><a href="'.$link.'" class="'.$active.'"><i class="material-icons md-18">'.$options['icon'].'</i>'.$name.'</a></li>';
    }
  }

  function actionButton($controller, $action, $id, $options = array()){
    if(!isset($options['icon'])) $options['icon'] = "menu";
    if(!isset($options['text'])) $options['text'] = "";
    return '<a href="/admin/'.$controller.'/'.$action.'/'.$id.'" class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="'.$options['text'].'"><i class="material-icons md-24">'.$options['icon'].'</i></a>';
  }

  function viewButton($controller, $id, $options = array()){
    if(!isset($options['icon'])) $options['icon'] = 'search';
    return '<a href="/admin/'.$controller.'/view/'.$id.'" class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="'.__('Ver').'"><i class="material-icons md-24">'.$options['icon'].'</i></a>';
  }

  function editButton($controller, $id, $options = array()){
    if(!isset($options['icon'])) $options['icon'] = 'edit';
    return '<a href="/admin/'.$controller.'/edit/'.$id.'" class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="'.__('Editar').'"><i class="material-icons md-24">'.$options['icon'].'</i></a>';
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

    return '<a '.$properties.'><span class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="'.__('Eliminar').'"><i class="material-icons md-24">'.$options['icon'].'</i></span></a>';
  }

}
?>
