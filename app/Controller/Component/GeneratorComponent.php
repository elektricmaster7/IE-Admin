<?php
App::uses('Component', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class GeneratorComponent extends Component {

  function __construct(ComponentCollection $collection, $settings = array()){
    parent::__construct($collection, $settings);
  }

  //GENERATES A MODEL FILE WITH THE BASICS NEEDED
  function generateModel($modelName, $translation = false){
    $dir = new Folder(APP.'Model'.DS);
    if($tranlation){
      $file = new File($dir->pwd().$modelName.'I18n.php', true, 0755);
      $file->write("<?php\nApp::uses('AppModel', 'Model');\nclass ".$modelName."I18n extends AppModel {\n\tpublic \$displayField = 'field';\n}\n?>");
    }else{
      $file = new File($dir->pwd().$modelName.'.php', true, 0755);
      $file->write("<?php\nApp::uses('AppModel', 'Model');\nclass ".$modelName." extends AppModel {\n\tpublic \$name = '".$modelName."';\n\n\t//public \$translateModel = '".$modelName."I18n';\n\t//public \$translateTable = '".strtolower($modelName)."_translations';\n}\n?>");
    }
  }

}
?>
