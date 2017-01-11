<?php echo $this->Form->create(null, array('url' => array('controller' => 'user', 'action'=>'verify')));?>
<?php
echo $this->Form->input('code');
?>
<?php echo $this->Form->end(array('label'=>__('Confirmar'));?>
