<h3><?php echo sprintf(__('E-mail de verificação em %s'),  $service);?></h3>
<p><?php echo __('Efectuou um registo no site.');?> <?php echo __('Para garantir que o seu e-mail é válido, clique neste link:');?></p>
<p><?php
$url = $this->Html->url(array('controller'=>'user', 'action'=>'verify', $code), true);
echo $this->Html->link(__('Clique aqui para verificar'), $url);?>
</p>
<p><?php echo sprintf(__('Código de verificação: %s'), $code);?></p>
<p><?php echo __('Cumprimentos');?><br/><?php echo $service;?></p>
