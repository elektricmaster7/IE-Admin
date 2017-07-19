<h2><?php echo __("EDITAR GRUPO");?></h2>
<div class="material-container">
  <?php echo $this->Form->create('Group');?>
  <?php echo $this->Form->input('id');?>
  <div class="form-group">
    <?php echo $this->Form->input('name', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
    <?php echo $this->Form->label('name', __('Nome'));?>
  </div>

  <div class="form-group">
    <?php echo $this->Form->label('User', __("Utilizadores no grupo"));?>
    <?php echo $this->Form->input('User', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'data-placeholder' => __('Selecione uma opção')));?>
  </div>

  <div class="row footer">
    <div class="col-xs-12 col-sm-6 col-md-4"><?php echo $this->Form->submit(__('Editar Grupo'),array('div'=>false, 'class'=>'material-button')); ?></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><a href="/admin/groups" class="material-button inverted-button"><?php echo __('VOLTAR'); ?></a></div>
  </div>
  <?php echo $this->Form->end();?>
</div>
