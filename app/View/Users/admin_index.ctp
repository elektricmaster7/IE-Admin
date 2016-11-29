<h1>UTILIZADORES</h1>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Login</th>
			<th>Email</th>
			<th>Grupo</th>
      <th>Criado em</th>
			<th>Estado</th>
			<th>Acções</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user){ ?>
			<tr>
				<td><?php echo $user['User']['id']; ?></td>
				<td><?php echo $user['User']['login']; ?></td>
				<td><?php echo $user['User']['email']; ?></td>
				<td>
					<?php
						$gr = array();
						foreach($user['Group'] as $k=>$group){
							$gr[] = $group['name'];
						}
						echo implode(', ', $gr);
					?>
				</td>
				<td><?php echo $this->Time->format('d/m/Y', $user['User']['created']); ?>&nbsp;</td>
				<td>
					<?php
						//DISABLED
						if ($user['User']['disable']) echo 'Desactivado&nbsp;';
						//EXPIRED
						$exp = $user['User']['expire_account'];
						if ($exp != '0000-00-00' && $this->Time->fromString($exp) < time()) echo 'Expirado';
					?>
				</td>
				<td><!--EDIT DELETE--></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
