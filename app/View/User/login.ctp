<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'login')));?>
<?php
		echo $this->Form->input('login');
		echo $this->Form->input('password');
?>
<?php echo $this->Form->end(array('div'=>false,'label'=>'Login'));?>
