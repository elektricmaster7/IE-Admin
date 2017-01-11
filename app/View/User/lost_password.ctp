<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'lost_password')));?>
<?php echo $this->Form->input('loginoremail');?>
<?php echo $this->Form->end(array('label'=>__('Pedido de reposição')));?>
