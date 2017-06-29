<div class="login-content">
	<!--<h1>LOGIN ADMIN</h1>-->
	<img class="login-logotype" src="/img/logos/ielogocolor.png"/>
	<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'login')));?>

		<?php echo $this->Form->input('login', array('label' => false, 'div'=> false, 'class' => 'form-control', 'error' => false));?>
		<?php echo $this->Form->label('login', __('Utilizador')); ?>
		<?php echo $this->Form->error('login', null, array('class' => 'form-control error-tip')); ?>
		<br>
		<?php echo $this->Form->input('password', array('label' => false, 'div' => false, 'class' => 'form-control')); ?>
		<?php echo $this->Form->label('password', __('Password')); ?>
		<br><br>
		<?php echo $this->Form->end(array('div'=>false,'style' => 'width:100%;','label'=>'Login'));?>
		<br>
		<p class="text-center">Inspire Electronics &copy; 2009 - <?php echo date('Y'); ?></p>
</div>
