<h2><?php echo __("ADICIONAR UTILIZADOR");?></h2>
<div class="material-container">
  <?php echo $this->Form->create('User');?>
    <div class="form-group">
      <?php echo $this->Form->input('login', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'error' => false));?>
      <?php echo $this->Form->label('login', __('Utilizador'));?>
      <?php echo $this->Form->error('login', null, array('class' => 'form-control error-tip')); ?>
    </div>

    <div class="form-group">
      <?php echo $this->Form->input('password', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'error' => false));?>
      <?php echo $this->Form->label('password', __('Password'));?>
      <?php echo $this->Form->error('password', null, array('class' => 'form-control error-tip')); ?>
    </div>

    <div class="form-group">
      <?php echo $this->Form->input('email', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'error' => false));?>
      <?php echo $this->Form->label('email', __('Email'));?>
      <?php echo $this->Form->error('email', null, array('class' => 'form-control error-tip')); ?>
    </div>
    <?php if($this->Authake->isMemberOf(1)){ ?>
      <div class="form-group">
        <?php echo $this->Form->label('Group', __('Grupo'));?>
        <?php echo $this->Form->input('Group', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'data-placeholder' => __('Selecione uma opção')));?>
      </div>
    <?php } ?>
    <?php if($this->Authake->isMemberOf(1) || $this->Authake->isMemberOf(2)){ ?>
      <div class="checkbox">
        <?php echo $this->Form->checkbox('disable', array('label'=>false, 'div'=>false, 'class'=>'material-icons'));?>
        <?php echo $this->Form->label('disable', __('Desactivado'));?>
      </div>
    <?php } ?>
    <div class="row footer">
      <div class="col-xs-12 col-sm-6 col-md-4"><?php echo $this->Form->submit(__('Adicionar Utilizador'),array('div'=>false, 'class'=>'material-button')); ?></div>
      <div class="col-xs-12 col-sm-6 col-md-4"><a href="/admin/users" class="material-button inverted-button">VOLTAR</a></div>
    </div>
    <?php echo $this->Form->end();?>
</div>
