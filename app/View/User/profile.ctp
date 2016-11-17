<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'changemypassword')));?>
<?php echo $this->Form->input('email');?>
<?php echo $this->Form->input('code');?>
<?php echo $this->Form->input('password1');?>
<?php echo $this->Form->input('password2');?>
<?php echo $this->Form->end(__('Alterar a password'))  ?>
