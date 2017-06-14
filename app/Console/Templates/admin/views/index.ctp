<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
<div class="panel panel-material">
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<?php foreach($fields as $field){ ?>
						<th><?php echo "<?php echo __('{$field}'); ?>"; ?></th>
						<th><?php echo "<?php echo __('Acções')?>"; ?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php
					echo "<?php foreach(\${$pluralVar} as \${$singularVar}){ ?>\n";
					echo "\t<tr>\n";
						foreach($fields as $field){
							$isKey = false;
							if(!empty($associations['belongsTo'])){
								foreach($associations['belongsTo'] as $alias => $details){
									if($field === $details['foreignKey']){
										$isKey = true;
										echo "\t\t<td>\n\t\t\t<?php echo \${$singularVar}['{$alias}']['{$details['displayField']}']; ?>\n\t\t</td>\n";
										break;
									}
								}
							}
							if($isKey !== true){
								echo "\t\t<td><?php echo \${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
							}
						}

						echo "\t\t<td>\n";
						echo "\t\t\t<?php echo \$this->Material->editButton({$pluralVar}, \${$singularVar}['{$modelClass}']['{$primaryKey}']); ?>\n";
						echo "\t\t\t<?php echo \$this->Material->deleteButton({$pluralVar}, \${$singularVar}['{$modelClass}']['{$primaryKey}'], array('confirm' => true, 'title' => __('Eliminar {$singularVar}'), 'message' => __('Tem a certeza que pretende eliminar?')));?>\n";
						echo "\t\t</td>\n";

					echo "\t</tr>\n";
					echo "<?php } ?>\n";
				?>
			</tbody>
		</table>
	</div>
</div>
<!-- BUTTON BAR -->
<?php $add_text_funct = "<?php echo __('Adicionar'); ?>"; ?>
<div class="button-bar">
	<a href="/admin/<?php echo $pluralVar; ?>/add" class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="<?php echo $add_text_funct; ?>"><i class="material-icons md-24 round-button">add</i></a>
</div>
<?php echo "<?php \$this->element('admin-datatables'); ?>"; ?>
