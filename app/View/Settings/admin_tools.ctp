<h2><?php echo __('DEFINIÇÕES'); ?></h2>
<div class="material-container">
  <?php echo $this->Form->create('Setting'); ?>
    <?php echo $this->Form->hidden('id'); ?>
    <div class="form-group">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <?php echo $this->Form->checkbox('translations', array('label'=>false, 'div'=>false, 'class'=>'material-icons'));?>
          <?php echo $this->Form->label('translations', __('Traduções'));?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <?php echo $this->Form->checkbox('notifications', array('label'=>false, 'div'=>false, 'class'=>'material-icons'));?>
          <?php echo $this->Form->label('notifications', __('Notificações'));?>
        </div>
      </div>
    </div>
    <div class="form-group">
      <?php echo $this->Form->label('lang', __('Linguagem')); ?>
      <?php echo $this->Form->input('lang', array('options' => array('pt' => 'Português', 'en' => 'English'), 'label' => false, 'div' => false, 'class' => 'form-control', 'data-placeholder' => __('Selecione uma opção'), 'data-flags')); ?>
    </div>
    <!--<div class="form-group">
      <?php //echo $this->Form->input('logo_path', array('label' => false, 'div' => false, 'class' => 'form-control')); ?>
      <?php //echo $this->Form->label('logo_path', __('Localização do logotipo')); ?>
    </div>-->
    <div class="row footer">
      <div class="col-xs-12 col-sm-6 col-md-4"><?php echo $this->Form->submit(__('Editar Definições'),array('div'=>false, 'class'=>'material-button')); ?></div>
    </div>
  <?php echo $this->Form->end(); ?>
</div>

<h2><?php echo __('FERRAMENTAS DE SISTEMA'); ?></h2>
<?php //$this->Html->languageSelect(); ?>
<div class="row">
  <div class="col-xs-12 col-md-4">
    <div class="material-card">
      <div class="row">
        <div class="col-xs-12"><i class="material-icons">insert_drive_file</i>MODEL</div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p><?php echo __("Este módulo gera o model indicado incluindo todas as pré-definições necessárias."); ?></p>
        </div>
      </div>
      <?php echo $this->Form->create('Setting', array('action' => 'generate_model')); ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <?php echo $this->Form->input('model_name', array(/*'options' => $tables, */'label'=>false, 'div'=>false, 'class'=>'form-control', 'error' => false));?>
              <?php echo $this->Form->label('model_name', __('Nome do Model'));?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12"><?php echo $this->Form->submit(__('GERAR MODEL'),array('div'=>false, 'class'=>'material-button col-xs-12')); ?></div>
        </div>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
  <div class="col-xs-12 col-md-4">
    <div class="material-card">
      <div class="row">
        <div class="col-xs-12"><i class="material-icons">translate</i><?php echo __("TRADUÇÕES");?></div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p><?php echo __("Este módulo gera a tabela de tradução da tabela selecionada.");?></p>
        </div>
      </div>
      <?php echo $this->Form->create('Setting', array('action' => 'generate_translation')); ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <?php echo $this->Form->label('table_name', __('Nome da Tabela'));?>
              <?php echo $this->Form->input('table_name', array('options' => $tables, 'label'=>false, 'div'=>false, 'class'=>'form-control', 'error' => false));?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12"><?php echo $this->Form->submit(__('GERAR TRADUÇÕES'),array('div'=>false, 'class'=>'material-button col-xs-12')); ?></div>
        </div>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
