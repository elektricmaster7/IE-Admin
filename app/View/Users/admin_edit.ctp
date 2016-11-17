<?php echo $this->Form->create('User');?>
<?php echo $this->Form->input('id');?>

<label>Utilizador</label>
<?php echo $this->Form->input('login', array('label'=>false));?>

<label>Password</label>
<?php echo $this->Form->input('password', array('label'=>false));?>

<label>E-mail</label>
<?php echo $this->Form->input('email', array('label'=>false));?>

<label>Grupos (Pressione 'Control' para selecionar vários)</label>
<?php echo $this->Form->input('Group', array('label'=>false));?>

<label>Código de alterção de password</label>
<?php echo $this->Form->input('passwordchangecode', array('label'=>false));?>

<label>Código de alteração de e-mail</label>
<?php echo $this->Form->input('emailchangecode', array('label'=>false));?>

<label>Data de expiração</label>
<?php echo $this->Form->input('expire_account', array('label'=>false));?>

<label><?php echo $this->Form->checkbox('disable');?> Desactivado</label>

<?php echo $this->Form->end(array('div'=>false,'label'=>'Editar Utilizador'));?>
