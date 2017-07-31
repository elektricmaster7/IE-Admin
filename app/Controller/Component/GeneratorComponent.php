<?php
App::uses('Component', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class GeneratorComponent extends Component {

  function __construct(ComponentCollection $collection, $settings = array()){
    parent::__construct($collection, $settings);
  }

  /**
   * Generates a model file with a preset structure and returns
   * boolean in case the file is created successfully
   * @method generateModel
   * @author João Redondo (IE)
   * @param  string        $modelName   A CamelCased string with the name of the model
   * @param  boolean       $translation A flag to create either a regular or translate model
   * @return boolean       Returns true if the model has been created successfully
   */
  function generateModel($modelName, $translation = false){
    $dir = new Folder(APP.'Model'.DS);
    if($translation){
      if(file_exists($dir->pwd().$modelName.'I18n.php')) return false;
      $file = new File($dir->pwd().$modelName.'I18n.php', true, 0755);
      $file->write("<?php\nApp::uses('AppModel', 'Model');\nclass ".$modelName."I18n extends AppModel {\n\tpublic \$displayField = 'field';\n}\n?>");
    }else{
      if(file_exists($dir->pwd().$modelName.'.php')) return false;
      $file = new File($dir->pwd().$modelName.'.php', true, 0755);
      $file->write("<?php\nApp::uses('AppModel', 'Model');\nclass ".$modelName." extends AppModel {\n\tpublic \$name = '".$modelName."';\n\n\t//Translation Properties (Uncomment if necessary)\n\t/*\$actsAs = array(\n\t\t'Translate' => array(\n\t\t\t'fieldOne','fieldTwo'\n\t\t)\n\t);*/\n\n\t//public \$translateModel = '".$modelName."I18n';\n\t//public \$translateTable = '".strtolower($modelName)."_translations';\n}\n?>");
    }
    return true;
  }

}
?>
