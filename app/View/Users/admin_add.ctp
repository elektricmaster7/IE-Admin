<h1>ADICIONAR UTILIZADOR</h1>
<?php echo $this->Form->create('User');?>

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
  <label>Grupo</label>
  <?php echo $this->Form->input('Group', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="checkbox">
  <label><?php echo $this->Form->checkbox('disable', array('label'=>false, 'div'=>false));?> Desactivado</label>
</div>
<?php echo $this->Form->end(array('div'=>false,'label'=>'Adicionar Utilizador'));?>
