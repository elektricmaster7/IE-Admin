<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Inspire Electronics">

    <title>Admin Panel</title>

    <!--BOOTSTRAP CSS & CUSTOM-->
    <link href="/css/admin/admin.css" rel="stylesheet">
    <?php echo $this->fetch('styles'); ?>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php echo $this->Flash->render(); ?>
    <?php echo $this->fetch('content'); ?>

    <!--JAVASCRIPT-->

    <?php echo $this->fetch('scripts'); ?>
  </body>
</html>
