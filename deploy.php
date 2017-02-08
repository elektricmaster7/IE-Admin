<?php
namespace Deployer;

set('default_stage', 'production');

//SETUP SERVER
server('admin_server', '5.189.170.154', '22') //SERVER | IP | PORT
  ->user('admin') //USERNAME
  ->password('Telefone7#')
  ->set('deploy_path', '/home/admin/web/admin.inspirelectronics.com/public_html/test')
  ->set('linux_user', 'admin')
  ->set('linux_group', 'admin')
  ->stage('production');

/*server('blog', '5.189.170.154', '22')
  ->user('admin')
  ->password('Telefone7#')
  ->set('deploy_path', '/home/admin/web/blog.inspirelectronics.com/public_html')
  ->stage('production');*/

/*localServer('localserver')
  ->set('deploy_path', 'C:/Users/john/Desktop/teste')
  ->stage('local');*/

task('deploy:install', function(){
  writeln('<info>Installing IE-Admin...</info>');
  $appFiles = [
    'app',
    'lib',
    'plugins',
    'vendors',
    '.htaccess',
    'index.php',
    'LICENCE.md'
  ];
  $deployPath = get('deploy_path');

  foreach ($appFiles as $file) {
    upload($file, "{$deployPath}/{$file}");
  }

  $linux_user = get('linux_user');
  $linux_group = get('linux_group');
  cd($deployPath);
  //run('chown -R '.$linux_user.':'.$linux_group.' app/tmp'); //SET USER PERMISSIONS TO TEMP FILE
  //set('writable_dirs', ['app/tmp', 'app/webroot']);
  run('chmod -R 777 app/tmp');

  write('<info>IE-Admin Installed</info>');
});

task('deploy:update', function(){
  writeln('<info>Updating IE-Admin...</info>');
  $appFiles = [
    'app/Config/authake_config.php.default',
    'app/Config/core.php.default',
    'app/Config/email.php.default',
    'app/Config/routes_admin.php',
    'app/Config/routes.php.default',
    'app/Controller/AppController.php',
    'app/Controller/GroupsController.php',
    'app/Controller/PagesController.php',
    'app/Controller/RulesController.php',
    'app/Controller/UserController.php',
    'app/Controller/UsersController.php',
    'app/Model/AppModel.php',
    'app/Model/Group.php',
    'app/Model/Rule.php',
    'app/Model/User.php',
    'app/View/Elements/Flash',
    'app/View/Elements/admin-datatables.ctp',
    'app/View/Elements/admin-menu.ctp',
    'app/View/Elements/error.ctp',
    'app/View/Elements/gotoadminpage.ctp',
    'app/View/Elements/gotohomepage.ctp',
    'app/View/Elements/info.ctp',
    'app/View/Elements/success.ctp',
    'app/View/Elements/warning.ctp',
    'app/View/Groups',
    'app/View/Helper',
    'app/View/Layouts/admin.ctp',
    'app/View/Layouts/login.ctp',
    'app/View/Pages/admin_home.ctp.default',
    'app/View/Pages/home.ctp.default',
    'app/View/Rules',
    'app/View/User',
    'app/View/Users',
    'app/webroot/css/admin',
    'app/webroot/css/bootstrap',
    'app/webroot/css/font-awesome',
    'app/webroot/js/admin',
    'app/webroot/js/bootstrap',
    'app/webroot/js/datatables',
    'app/webroot/js/jquery',
    'index.php',
    'LICENCE.md'
  ];
  $deployPath = get('deploy_path');

  foreach($appFiles as $file){
    upload($file, "{$deployPath}/{$file}");
  }

  cd($deployPath);

  run('chmod -R 777 app/tmp');

  writeln('<info>IE-Admin Updated</info>');
});

task('deploy:safeupdate', function(){
  writeln('<info>Updating IE-Admin [SAFELY]...</info>');
  $appFiles = [
    'app/Config/authake_config.php.default',
    'app/Config/core.php.default',
    'app/Config/email.php.default',
    'app/Config/routes_admin.php',
    'app/Config/routes.php.default',
    'app/Controller/AppController.php',
    'app/Controller/GroupsController.php',
    'app/Controller/PagesController.php',
    'app/Controller/RulesController.php',
    'app/Model/AppModel.php',
    'app/Model/Group.php',
    'app/Model/Rule.php',
    'app/View/Elements',
    'app/View/Groups',
    'app/View/Helper',
    'app/View/Layouts/admin.ctp',
    'app/View/Layouts/login.ctp',
    'app/View/Pages/admin_home.ctp.default',
    'app/View/Pages/home.ctp.default',
    'app/View/Rules',
    'app/webroot/css/admin',
    'app/webroot/css/bootstrap',
    'app/webroot/css/font-awesome',
    'app/webroot/js/admin',
    'app/webroot/js/bootstrap',
    'app/webroot/js/datatables',
    'app/webroot/js/jquery',
    'index.php',
    'LICENCE.md'
  ];
  $deployPath = get('deploy_path');

  foreach($appFiles as $file){
    upload($file, "{$deployPath}/{$file}");
  }

  cd($deployPath);

  run('chmod -R 777 app/tmp');

  writeln('<info>IE-Admin Updated</info>');
});

?>
