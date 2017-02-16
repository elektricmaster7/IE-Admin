<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="Inspire Electronics">
    <?php $this->start('meta'); ?><?php $this->end(); ?>
    <?php echo $this->fetch('meta'); ?>

    <title>Admin Panel</title>

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
    <!--NAVIGATION-->
    <nav class="navbar navbar-admin navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
      <!--LEFT NAVBAR-->
      <div class="navbar-header navbar-top-content pull-right">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <!--NAVBAR BUTTONS-->
      <div class="navbar-top-content pull-right">
            <a href="/logout" class="pull-right"><i class="material-icons md-24 topbar-button">exit_to_app</i></a>
            <div class="navbar-username"><?php echo $this->Authake->getLogin(); ?></div>
      </div>

      <!--LOGOS-->

    </nav>

    <!-- CONTENT -->
    <div id="page-wrapper">
      <!--SIDEBAR-->
      <div class="sidebar-admin sidebar" role="navigation">
        <div class="sidebar-nav collapse navbar-collapse">
          <ul class="nav" id="side-menu">
            <li><a href="/admin"><i class="material-icons md-18">home</i> <?php echo __('Dashboard'); ?></a></li>
            <?php if($this->Authake->isMemberOf(1) || $this->Authake->isMemberOf(2)){ ?><li><a href="/admin/users"><i class="material-icons md-18">person</i> <?php echo __('Utilizadores'); ?></a></li><?php } ?>
            <?php if($this->Authake->isMemberOf(1)){ ?>
              <li><a href="/admin/groups"><i class="material-icons md-18">group</i> <?php echo __('Grupos'); ?></a></li>
              <li><a href="/admin/rules"><i class="material-icons md-18">dehaze</i> <?php echo __('Regras'); ?></a></li>
            <?php } ?>
            <?php echo $this->element('admin-menu'); ?>
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
    <script src="/js/admin/admin-material.js"></script>
    <?php $this->start('scripts'); ?><?php $this->end(); ?>
    <!--MODALS-->
    <!--SYSTEM MODALS-->
    <?php echo $this->element('admin-modals'); ?>
    <!--SCRIPTS-->
    <?php echo $this->fetch('scripts'); ?>
  </body>
</html>
