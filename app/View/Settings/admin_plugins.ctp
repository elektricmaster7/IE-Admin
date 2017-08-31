<h2><?php echo __('Extensões'); ?></h2>
<div class="panel panel-material">
  <div class="panel-body">
    <table class="table material-table">
      <thead>
        <tr>
          <th><?php echo __('Nome'); ?></th>
          <th><?php echo __('Versão'); ?></th>
          <th><?php echo __('Autor'); ?></th>
          <th><?php echo __('Acções'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($plugins as $plugin){ ?>
          <tr>
            <td><?php echo $plugin['Plugin']['name']; ?></td>
            <td><?php echo $plugin['Plugin']['version']; ?></td>
            <td><?php echo $plugin['Plugin']['author']; ?></td>
            <td>
              <?php
                if(isset($plugin['Plugin']['active']) && $plugin['Plugin']['active'] == 1){
                  echo $this->Material->actionButton('settings', 'disable', $plugin['Plugin']['id'], array('icon' => 'remove', 'text' => __('Desactivar')));
                } else if(isset($plugin['Plugin']['active']) && $plugin['Plugin']['active'] == 0) {
                  echo $this->Material->actionButton('settings', 'activate', $plugin['Plugin']['id'], array('icon' => 'check', 'text' => __('Activar')));
                  echo $this->Material->actionButton('settings', 'uninstall', $plugin['Plugin']['id'], array('icon' => 'delete', 'text' => __('Desinstalar')));
                } else {
                  echo $this->Material->actionButton('settings', 'install', $plugin['Plugin']['id'], array('icon' => 'add', 'text' => __('Instalar')));
                }
              ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php $this->element('admin-datatables'); ?>
