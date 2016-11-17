<h3><?php echo sprintf(__('Efectuou um pedido de reposição de password em %s'),  $service);?></h3>
<p><?php echo __('Clique no link abaixo para repor a sua password:');?></p>
<p><?php
$url = $this->Html->url(array('controller'=>'user', 'action'=>'pass', $code), true);
echo $this->Html->link(__('Clique aqui para repor a sua password'), $url);?>
</p>
<p><?php echo sprintf(__('Código de verificação: %s'), $code);?></p>
<p><?php echo __("Se não efectuou este pedido, não é necessária nenhuma acção. A password será a mesma até usar este código.");?></p>
<p><?php echo __('Cumprimentos');?><br/><?php echo $service;?></p>
