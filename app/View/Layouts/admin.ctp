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

    <!--IE SAFEGUARDS-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper">
      <!--SIDEBAR-->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li><a href="#">Utilizadores</a></li>
          <li><a href="#">Grupos</a></li>
          <li><a href="#">Regras</a></li>
        </ul>
      </div>

      <!-- CONTENT -->
        <div id="page-content-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->fetch('content'); ?>
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
              </div>
            </div>
          </div>
        </div>
    </div>


    <!--JAVASCRIPT-->
      <!--JQUERY 3.1.1-->
      <script src="/js/jquery/jquery-3.1.1.min.js"></script>
      <!--BOOTSTRAP 3.3.7-->
      <script src="/js/bootstrap/bootstrap.min.js"></script>

      <!--PAGE SPECIFIC JS INCLUDES & CODE-->
      <?php echo $this->fetch('scripts'); ?>
  </body>
</html>
