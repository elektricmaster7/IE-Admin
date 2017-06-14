<h2><?php echo __("Grupos"); ?></h2>
<div class="panel panel-material">
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th><?php echo __("Nome"); ?></th>
					<th><?php echo __("Acções"); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($groups as $group){ ?>
					<tr>
						<td><?php echo $group['Group']['name'];?></td>
						<td><!--EDIT DELETE-->
							<?php echo $this->Material->editButton('groups', $group['Group']['id']); ?>
							<?php echo $this->Material->deleteButton('groups', $group['Group']['id'], array(
								'confirm' => true,
								'title' => __('Eliminar grupo'),
								'message' => __('Tem a certeza que pretende eliminar o grupo?')
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
	<a href="/admin/groups/add" class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="<?php echo __('Adicionar'); ?>"><i class="material-icons md-24 round-button">add</i></a>
</div>
<?php $this->element('admin-datatables'); ?>
