<?php echo $this->Form->create('Group');?>
<label>Nome</label>
<?php echo $this->Form->input('name', array('label'=>false));?>

<label>Utilizadores no grupo (Pressione 'Control' para selecionar vários)</label>
<?php echo $this->Form->input('User', array('label'=>false));?>

<?php echo $this->Form->end(array('div'=>false,'label'=>'Adicionar Grupo'));?>
