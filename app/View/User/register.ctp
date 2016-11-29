<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'register')));?>
<?php
if ( ! Configure::read('Authake.useEmailAsUsername') ) echo $this->Form->input('login');
echo $this->Form->input('email');
echo $this->Form->input('password1', array('type'=>'password');
echo $this->Form->input('password2', array('type'=>'password');
?>
<?php echo $this->Form->end(array('div'=>false,'label'=>'Register');?>
