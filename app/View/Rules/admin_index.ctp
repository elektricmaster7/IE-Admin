<h1><?php echo __("Regras"); ?></h1>
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
		        <td><!--EDIT DELETE--></td>
					</tr>
		    <?php } ?>
		  </tbody>
		</table>
	</div>
</div>
