<h1>Regras</h1>
<div class="panel panel-material">
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>Descrição</th>
					<th>Grupo</th>
					<th>Permissões</th>
					<th>Path</th>
		      <th>Ordem</th>
					<th>Acções</th>
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
