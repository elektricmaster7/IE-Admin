<h3><?php echo sprintf(__('Verificação de e-mail em %s'),  $service);?></h3>
<p><?php echo __('Modificou o seu e-mail no perfil.');?> <?php echo __('Para garantir que o e-mail é válido, clique no link abaixo:');?></p>
<p><?php
$url = $this->Html->url(array('controller'=>'user', 'action'=>'verify', $code), true);
echo $this->Html->link(__('Clique aqui para verificar'), $url);?>
</p>
<p><?php echo sprintf(__('Código de verificação: %s'), $code);?></p>
<p><?php echo __('Cumprimentos');?><br/><?php echo $service;?></p>
