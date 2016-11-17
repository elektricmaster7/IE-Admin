<?php echo $this->Form->create('Group');?>
<?php echo $this->Form->input('id');?>
<label>Nome</label>
<?php echo $this->Form->input('name', array('label'=>false));?>

<label>Utilizadores no grupo (Pressione 'Control' para selecionar vários)</label>
<?php echo $this->Form->input('User', array('label'=>false));?>

<?php echo $this->Form->end(array('div'=>false,'label'=>'Editar Grupo'));?>
