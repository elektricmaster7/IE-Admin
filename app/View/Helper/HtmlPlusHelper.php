<?php
App::uses('HtmlHelper', 'View/Helper');
class HtmlPlusHelper extends HtmlHelper {

  public $helpers = array('Form', 'Session');

  /**
   * This function extends cakephp's functionality to allow for language
   * selection in url function
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
   * Creates a language select element with the apropriate url connections for
   * a convinent redirect
   * @method languageSelect
   * @author Inspire Electronics
   * @param  array   $languages   array of languages, by default pt and en are passed
   */
  // TODO: THIS NEEDS A WAY TO DEAL WITH CLASSES AND IDS AND SET LANG
  public function languageSelect($languages = array('pt'=>'Português', 'en'=>'English'), $default = 'pt'){
    if($this->Session->check('Config.language')) $default = $this->Session->read('Config.language');
    echo $this->Form->input(null, array('options' => $languages, 'default' => $default, 'class' => 'language_select form-control', 'div' => false, 'label' => false));
  }

  /**
   * TODO: CREATE A LINK BASED LANGUAGE SELECTOR WITH FLAGS FOR OTHER CASES WERE A SELECT
   * WONT BE A SOLUTION
   */
}
?>
