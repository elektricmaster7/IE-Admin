<?php
App::uses('HtmlHelper', 'View/Helper');
class HtmlPlusHelper extends HtmlHelper {

  public function url($url = null, $full = false){
    if(is_array($url)){
      if(!isset($url['language']) && isset($this->params['language'])){
        $url['language'] = $this->params['language'];
      }
    }
    return parent::url($url, $full);
  }
}
?>
