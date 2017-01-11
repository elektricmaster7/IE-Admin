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
						<td><!--EDIT DELETE--></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
