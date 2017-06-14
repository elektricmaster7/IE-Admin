<h1><?php echo __("EDITAR UTILIZADOR");?></h1>
<div class="material-container">
  <?php echo $this->Form->create('User');?>
  <?php echo $this->Form->input('id');?>

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
  <?php if($this->Authake->isMemberOf(1)){ ?>
    <div class="form-group">
      <?php echo $this->Form->label('Group', __("Grupos (Pressione 'Control' para selecionar vários)"));?>
      <?php echo $this->Form->input('Group', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
    </div>
  <?php } ?>
  <!--<div class="form-group">
    <?php //echo $this->Form->input('passwordchangecode', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
    <?php //echo $this->Form->label('passwordchangecode', __('Código de alterção de password'));?>
  </div>-->

  <!--<div class="form-group">
    <?php //echo $this->Form->input('emailchangecode', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
    <?php //echo $this->Form->label('emailchangecode', __('Código de alteração de e-mail'));?>
  </div>-->
  <?php if(($this->Authake->isMemberOf(1) || $this->Authake->isMemberOf(2)) && $this->request->data['User']['id'] != 2){ ?>
    <div class="checkbox">
      <?php echo $this->Form->checkbox('disable', array('label'=>false, 'div'=>false, 'class'=>'material-icons'));?>
      <?php echo $this->Form->label('disable', __('Desactivado'));?>
    </div>
  <?php } ?>
  <div class="row material-container-footer">
    <div class="col-xs-12 col-sm-6 col-md-4"><?php echo $this->Form->submit(__('Editar Utilizador'),array('div'=>false, 'class'=>'material-button')); ?></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><a href="/admin/users" class="material-button inverted-button"><?php echo __('VOLTAR'); ?></a></div>
  </div>
  <?php echo $this->Form->end();?>
</div>
