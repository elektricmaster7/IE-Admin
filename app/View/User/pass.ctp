<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'pass')));?>
<?php
	echo $this->Form->input('passwordchangecode');
	echo $this->Form->input('password1', array('type'=>'password'));
	echo $this->Form->input('password2', array('type'=>'password'));
?>
<?php echo $this->Form->end(__('Confirmar'));?>
