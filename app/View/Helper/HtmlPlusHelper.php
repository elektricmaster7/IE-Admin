<?php
App::uses('HtmlHelper', 'View/Helper');
class HtmlPlusHelper extends HtmlHelper {

  public $helpers = array('Form', 'Session');

  /**
   * This function extends cakephp's functionality to allow for language selection in url function
   * @method url
   * @author Inspire Electronics
   * @param  mixed   $url  check cakephp documentation *add $url['language'] = 'langCode' for language select
   * @param  boolean $full check cakephp documentation
   * @return string        returns the url by calling the parent class's method
   */
  public function url($url = null, $full = false){
    if(is_array($url)){
      if(!isset($url['language']) && isset($this->params['language'])){
        $url['language'] = $this->params['language'];
      }
    }
    return parent::url($url, $full);
  }

  /**
   * Creates a language select element with the apropriate url connections for a convinent redirect
   * IMPORTANT: Intended for use in admin, otherwise you have to create a js function on change to handle the
   * requests or copy the one in /webroot/admin/admin-material.js
   * @method languageSelect
   * @author Inspire Electronics
   * @param  array   $languages   array of languages, by default pt and en are passed
   * @param  array   $options     array of options [id, class] for the output select, it uses the same structure as cakephp
   * @return                      echoes a select box for language switch
   */
  public function languageSelect($languages = array('pt'=>'Português', 'en'=>'English'), $options = array()){
    $id = ''; $class = 'language_select';
    if($this->Session->check('Config.language')) $default = $this->Session->read('Config.language');
    if(isset($options['class'])) $class += ' '.$options['class'];
    if(isset($options['id'])) $id = $options['id'];
    echo $this->Form->input(null, array('options' => $languages, 'default' => $default, 'id' => $id,'class' => $class, 'div' => false, 'label' => false));
  }

  /**
   * TODO: CREATE A LINK BASED LANGUAGE SELECTOR WITH FLAGS FOR OTHER CASES WERE A SELECT
   * WONT BE A SOLUTION
   */
}
?>
