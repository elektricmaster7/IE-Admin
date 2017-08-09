<!--ADMIN MENU (USER)-->
<pre><?php print_r($path); ?></pre>
<?php echo $this->Html->url($path); ?>
<div class="sidebar-admin sidebar" role="navigation">
  <div class="sidebar-nav collapse navbar-collapse">
    <div id="menu-tabs">
      <ul class="tabs">
        <li class="tab-link current" data-tab="general"><i class="material-icons md-18">home</i></li>
        <li class="tab-link" data-tab="store"><i class="material-icons md-18">shopping_cart</i></li>
      </ul>
    </div>
    <div id="general" class="tab-content current">
      <ul class="nav" id="side-menu">
        <li class="header"><?php echo __('Administração'); ?></li>
        <?php echo $this->Material->adminLink('/admin', __('Dashboard'), array('icon' => 'home', 'permissions' => array(1, 2))); ?>
        <li><a href="/admin"><i class="material-icons md-18">home</i> <?php echo __('Dashboard'); ?></a></li>
        <?php if($this->Authake->isMemberOf(1) || $this->Authake->isMemberOf(2)){ ?>
          <li><a href="/admin/users"><i class="material-icons md-18">person</i> <?php echo __('Utilizadores'); ?></a></li>
        <?php } ?>
        <?php if($this->Authake->isMemberOf(1)){ ?>
          <li><a href="/admin/groups"><i class="material-icons md-18">group</i> <?php echo __('Grupos'); ?></a></li>
          <li><a href="/admin/rules"><i class="material-icons md-18">dehaze</i> <?php echo __('Regras'); ?></a></li>
          <li class="dropdown-admin">
            <a href="#"><i class="material-icons md-18">settings</i> <?php echo __('Definições'); ?></a>
            <ul>
              <li><a href="/admin/settings/tools"><i class="material-icons md-18">build</i> <?php echo __('Ferramentas'); ?></a></li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="store" class="tab-content">
      <ul class="nav" id="side-menu">
        <li class="header"><?php echo __('Loja'); ?></li>
      </ul>
    </div>
  </div>
</div>
