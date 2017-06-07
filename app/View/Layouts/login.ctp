<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="Inspire Electronics">
    <?php $this->start('meta'); ?><?php $this->end(); ?>
    <?php echo $this->fetch('meta'); ?>

    <title>Admin - Login</title>

    <!--BOOTSTRAP CSS & CUSTOM-->
    <link href="/css/admin/admin.css" rel="stylesheet">
    <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php $this->start('styles'); ?><?php $this->end(); ?>
    <?php echo $this->fetch('styles'); ?>

    <!--IE SAFEGUARDS-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="login-container" style="background-image:url(/img/backgrounds/aurora_bg.jpg); background-repeat: no-repeat; background-size:cover;">
      <?php echo $this->Flash->render(); ?>
      <?php echo $this->fetch('content'); ?>
    </div>

    <!--JAVASCRIPT-->
    <!--JQUERY 3.1.1-->
    <script src="/js/jquery/jquery-3.1.1.min.js"></script>
    <!--BOOTSTRAP 3.3.7-->
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/admin/admin-material.js"></script>
    <?php $this->start('scripts'); ?><?php $this->end(); ?>
    <?php echo $this->fetch('scripts'); ?>
  </body>
</html>
