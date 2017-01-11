<h1>EDITAR GRUPO</h1>
<?php echo $this->Form->create('Group');?>
<?php echo $this->Form->input('id');?>
<div class="form-group">
  <?php echo $this->Form->input('name', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
  <?php echo $this->Form->label('name', __('Nome'));?>
</div>

<div class="form-group">
  <?php echo $this->Form->label('User', __("Utilizadores no grupo (Pressione 'Control' para selecionar vários)"));?>
  <?php echo $this->Form->input('User', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<?php echo $this->Form->end(array('div'=>false,'label'=>__('Editar Grupo')));?>
