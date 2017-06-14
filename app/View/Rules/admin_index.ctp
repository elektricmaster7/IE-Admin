<h2><?php echo __("Regras"); ?></h2>
<div class="panel panel-material">
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th><?php echo __("Descrição"); ?></th>
					<th><?php echo __("Grupo"); ?></th>
					<th><?php echo __("Permissões"); ?></th>
					<th><?php echo __("Path"); ?></th>
		      <th><?php echo __("Ordem"); ?></th>
					<th><?php echo __("Acções"); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rules as $k => $rule){ ?>
					<tr>
						<td><?php echo $rule['Rule']['name'];?></td>
						<td><?php echo $rule['Group']['name'];?></td>
		        <td><?php echo $rule['Rule']['permission'];?></td>
		        <td><?php echo $rule['Rule']['action'];?></td>
						<td><?php echo $rule['Rule']['order']; ?></td>
						<td><!--EDIT DELETE-->
							<?php echo $this->Material->editButton('rules', $rule['Rule']['id']); ?>
							<?php echo $this->Material->deleteButton('rules', $rule['Rule']['id'], array(
								'confirm' => true,
								'title' => __('Eliminar regra'),
								'message' => __('Tem a certeza que pretende eliminar a regra?')
							)); ?>
						</td>
					</tr>
		    <?php } ?>
		  </tbody>
		</table>
	</div>
</div>
<!--BUTTON BAR-->
<div class="button-bar">
	<a href="/admin/rules/add" class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="<?php echo __('Adicionar'); ?>"><i class="material-icons md-24 round-button">add</i></a>
</div>
<?php $this->element('admin-datatables'); ?>
