<h1>EDITAR UTILIZADOR</h1>
<?php echo $this->Form->create('User');?>
<?php echo $this->Form->input('id');?>

<div class="form-group">
  <label>Utilizador</label>
  <?php echo $this->Form->input('login', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Password</label>
  <?php echo $this->Form->input('password', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>E-mail</label>
  <?php echo $this->Form->input('email', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Grupos (Pressione 'Control' para selecionar vários)</label>
  <?php echo $this->Form->input('Group', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Código de alterção de password</label>
  <?php echo $this->Form->input('passwordchangecode', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Código de alteração de e-mail</label>
  <?php echo $this->Form->input('emailchangecode', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Data de expiração</label>
  <?php echo $this->Form->input('expire_account', array('label'=>false, 'div'=>false, 'separator'=>false, 'class'=>'form-control'));?>
</div>

<div class="checkbox">
  <label><?php echo $this->Form->checkbox('disable', array('label'=>false, 'div'=>false));?> Desactivado</label>
</div>
<?php echo $this->Form->end(array('div'=>false,'label'=>'Editar Utilizador'));?>
