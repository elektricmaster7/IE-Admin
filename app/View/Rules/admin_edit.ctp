<h2><?php echo __("EDITAR REGRA");?></h2>
<div class="material-container">
  <?php echo $this->Form->create('Rule');?>
  <?php echo $this->Form->input('id');?>
  <div class="form-group">
    <?php echo $this->Form->label('name', __('Descrição'));?>
    <?php echo $this->Form->input('name', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'type'=>'textarea', 'cols'=>'50', 'rows'=>'2'));?>
  </div>

  <div class="form-group">
    <?php echo $this->Form->label('group_id', __('Grupo'));?>
    <?php echo $this->Form->input('group_id', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'empty'=>true));?>
  </div>

  <div class="form-group">
    <?php echo $this->Form->input('order', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
    <?php echo $this->Form->label('order', __('Ordem'));?>
  </div>

  <div class="form-group">
    <?php echo $this->Form->label('action', __('Path (perl regex)'));?>
    <?php echo $this->Form->input('action', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'type'=>'textarea', 'cols'=>'50', 'rows'=>'3'));?>
  </div>

  <div class="form-group">
    <?php echo $this->Form->label('permission', __('Permissões'));?>
    <?php echo $this->Form->select('permission', array('1' => __('Permitir'), '0' => __('Negar')), array('label'=>false, 'div'=>false, 'class'=>'form-control', 'empty'=>false));?>
  </div>

  <div class="form-group">
    <?php echo $this->Form->label('forward', __('Redireccionar'));?>
    <?php echo $this->Form->input('forward', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
  </div>

  <div class="form-group">
    <?php echo $this->Form->label('message', __('Mensagem'));?>
    <?php echo $this->Form->input('message', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'type'=>'textarea', 'cols'=>'50', 'rows'=>'2'));?>
  </div>

  <div class="row footer">
    <div class="col-xs-12 col-sm-6 col-md-4"><?php echo $this->Form->submit(__('Editar Regra'),array('div'=>false, 'class'=>'material-button')); ?></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><a href="/admin/rules" class="material-button inverted-button"><?php echo __('VOLTAR'); ?></a></div>
  </div>
  <?php echo $this->Form->end();?>
</div>
