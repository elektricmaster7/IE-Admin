<h1><?php echo __("ADICIONAR UTILIZADOR");?></h1>
<?php echo $this->Form->create('User');?>

<div class="form-group">
  <?php echo $this->Form->input('login', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'error' => false));?>
  <?php echo $this->Form->label('login', __('Utilizador'));?>
  <?php echo $this->Form->error('login', null, array('class' => 'form-control error-tip')); ?>
</div>

<div class="form-group">
  <?php echo $this->Form->input('password', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
  <?php echo $this->Form->label('password', __('Password'));?>
</div>

<div class="form-group">
  <?php echo $this->Form->input('email', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'error' => false));?>
  <?php echo $this->Form->label('email', __('Email'));?>
  <?php echo $this->Form->error('email', null, array('class' => 'form-control error-tip')); ?>
</div>

<div class="form-group">
  <?php echo $this->Form->label('Group', __('Grupo'));?>
  <?php echo $this->Form->input('Group', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="checkbox">
  <?php echo $this->Form->checkbox('disable', array('label'=>false, 'div'=>false, 'class'=>'material-icons'));?>
  <?php echo $this->Form->label('disable', __('Desactivado'));?>
</div>
<?php echo $this->Form->end(array('div'=>false,'label'=>__('Adicionar Utilizador')));?>
