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
    <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php echo $this->fetch('styles'); ?>

    <!--IE SAFEGUARDS-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--NAVIGATION-->
    <nav class="navbar navbar-admin navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
      <!--LEFT NAVBAR-->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!--RIGHT NAVBAR-->
    </nav>

    <!-- CONTENT -->
    <div id="page-wrapper">
      <!--SIDEBAR-->
      <div class="sidebar-admin sidebar" role="navigation">
        <div class="sidebar-nav collapse navbar-collapse">
          <ul class="nav" id="side-menu">
            <li><a href="/admin"><i class="material-icons md-18">home</i> Dashboard</a></li>
            <li><a href="#"><i class="material-icons md-18">person</i> Utilizadores</a></li>
            <li><a href="#"><i class="material-icons md-18">group</i> Grupos</a></li>
            <li><a href="#"><i class="material-icons md-18">dehaze</i> Regras</a></li>
          </ul>
        </div>
      </div>

      <!--PAGE CONTAINER-->
      <div class="page-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <?php echo $this->Flash->render(); ?>
              <?php echo $this->fetch('content'); ?>
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
