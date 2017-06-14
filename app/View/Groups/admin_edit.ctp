<h1><?php echo __("EDITAR GRUPO");?></h1>
<div class="material-container">
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

  <div class="row material-container-footer">
    <div class="col-xs-12 col-sm-6 col-md-4"><?php echo $this->Form->submit(__('Editar Grupo'),array('div'=>false, 'class'=>'material-button')); ?></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><a href="/admin/groups" class="material-button inverted-button"><?php echo __('VOLTAR'); ?></a></div>
  </div>
  <?php echo $this->Form->end();?>
</div>
