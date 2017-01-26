<h1><?php echo __("Grupos"); ?></h1>
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
							<a href="/admin/groups/edit/<?php echo $group['Group']['id']; ?>"><i class="material-icons md-18">edit</i></a>
							<a href="/admin/groups/delete/<?php echo $group['Group']['id']; ?>"><i class="material-icons md-18">delete</i></a>
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
