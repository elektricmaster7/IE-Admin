<!--ADMIN MENU (USER)-->
<!--<pre><?php //print_r($path); ?></pre>-->
<?php //echo $this->Html->url($path); ?>
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
        <?php //print_r($this->params); ?>
        <?php echo $this->Material->adminLink('/admin', __('Dashboard'), array('icon' => 'home')); ?>
        <?php echo $this->Material->adminLink('/admin/users', __('Utilizadores'), array('icon' => 'person', 'permissions' => array(1, 2))); ?>
        <?php echo $this->Material->adminLink('/admin/groups', __('Grupos'), array('icon' => 'group', 'permissions' => array(1))); ?>
        <?php echo $this->Material->adminLink('/admin/rules', __('Regras'), array('icon' => 'dehaze', 'permissions' => array(1))); ?>
        <?php if($this->Authake->isMemberOf(1)){ ?>
          <li class="dropdown-admin">
            <a href="#"><i class="material-icons md-18">settings</i> <?php echo __('Definições'); ?></a>
            <ul>
              <li><a href="/admin/settings/tools"><i class="material-icons md-18">build</i> <?php echo __('Ferramentas'); ?></a></li>
              <li><a href="/admin/settings/plugins"><i class="material-icons md-18">extension</i> <?php echo __('Plugins'); ?></a></li>
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
