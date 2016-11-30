<h1>ADICIONAR REGRA</h1>
<?php echo $this->Form->create('Rule');?>
<div class="form-group">
  <label>Descrição</label>
  <?php echo $this->Form->input('name', array('label'=>false, 'div'=>false, 'class'=>'form-control' ,'type'=>'textarea', 'cols'=>'50', 'rows'=>'2'));?>
</div>

<div class="form-group">
  <label>Grupo</label>
  <?php echo $this->Form->input('group_id', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'empty'=>true));?>
</div>

<div class="form-group">
  <label>Ordem</label>
  <?php echo $this->Form->input('order', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Path <br /> (perl regex)</label>
  <?php echo $this->Form->input('action', array('label'=>false, 'div'=>false, 'type'=>'textarea', 'class'=>'form-control', 'cols'=>'50', 'rows'=>'3'));?>
</div>

<div class="form-group">
  <label>Permissões</label>
  <?php echo $this->Form->select('permission', array('1' => 'Permitir', '0' => 'Negar'), array('label'=>false, 'div'=>false, 'empty'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Redireccionar</label>
  <?php echo $this->Form->input('forward', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Mensagem</label>
  <?php echo $this->Form->input('message', array('label'=>false, 'div'=>false, 'type'=>'textarea', 'class'=>'form-control', 'cols'=>'50', 'rows'=>'2'));?>
</div>

<?php echo $this->Form->end(array('div'=>false,'label'=>'Adicionar Regra'));?>
