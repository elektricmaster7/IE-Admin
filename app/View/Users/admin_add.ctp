<?php echo $this->Form->create('User');?>

<label>Utilizador</label>
<?php echo $this->Form->input('login', array('label'=>false));?>

<label>Password</label>
<?php echo $this->Form->input('password', array('label'=>false));?>

<label>E-mail</label>
<?php echo $this->Form->input('email', array('label'=>false));?>

<label>Grupo</label>
<?php echo $this->Form->input('Group', array('label'=>false));?>

<label><?php echo $this->Form->checkbox('disable');?> Desactivado</label>

<?php echo $this->Form->end(array('div'=>false,'label'=>'Adicionar Utilizador'));?>
