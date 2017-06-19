<h2><?php echo __('FERRAMENTAS DE SISTEMA'); ?></h2>
<!--<pre>
<?php //print_r($tables); ?>
</pre>-->
<div class="row">
  <div class="col-xs-12 col-md-4">
    <div class="material-card">
      <div class="row">
        <div class="col-xs-12"><i class="material-icons">translate</i>TRADUÇÕES</div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p>Este módulo gera a tabela de tradução da tabela selecionada.</p>
        </div>
      </div>
      <?php echo $this->Form->create('Setting'); ?>
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
