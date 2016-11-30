<h1>EDITAR GRUPO</h1>
<?php echo $this->Form->create('Group');?>
<?php echo $this->Form->input('id');?>
<div class="form-group">
  <label>Nome</label>
  <?php echo $this->Form->input('name', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<div class="form-group">
  <label>Utilizadores no grupo (Pressione 'Control' para selecionar vários)</label>
  <?php echo $this->Form->input('User', array('label'=>false, 'div'=>false, 'class'=>'form-control'));?>
</div>

<?php echo $this->Form->end(array('div'=>false,'label'=>'Editar Grupo'));?>
