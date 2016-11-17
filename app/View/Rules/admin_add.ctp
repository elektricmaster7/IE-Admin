<?php echo $this->Form->create('Rule');?>
<label>Descrição</label>
<?php echo $this->Form->input('name', array('label'=>false, 'type'=>'textarea', 'cols'=>'50', 'rows'=>'2');?>

<label>Grupo</label>
<?php echo $this->Form->input('group_id', array('label'=>false, 'empty'=>true));?>

<label>Ordem</label>
<?php echo $this->Form->input('order', array('label'=>false);?>

<label>Path <br /> (perl regex)</label>
<?php echo $this->Form->input('action', array('label'=>false, 'type'=>'textarea', 'cols'=>'50', 'rows'=>'3');?>

<label>Permissões</label>
<?php echo $this->Form->select('permission', array('1' => 'Permitir', '0' => 'Negar'), array('label'=>false, 'empty'=>false));?>
<?php echo $this->Form->input('forward');?>
<?php echo $this->Form->input('message', array('label'=>array('type'=>'textarea', 'cols'=>'50', 'rows'=>'2'));?>

<?php echo $this->Form->end(array('div'=>false,'label'=>'Adicionar Regra'));?>
