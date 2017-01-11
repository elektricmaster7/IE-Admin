<h1>Utilizadores</h1>
<div class="panel panel-material">
	<div class="panel-heading">
		<div class="row" data-table-id="users_table">
			<div class="col-xs-12 col-md-8"><!--table counters--></div>
			<div class="col-xs-12 col-md-4"><input type="text" class="form-control" data-datatables-search/><label><?php __("Pesquisa"); ?></label></div>
		</div>
	</div>
	<div class="panel-body">
		<table id="users_table" class="table">
			<thead>
				<tr>
					<th><?php echo __("ID"); ?></th>
					<th><?php echo __("Login"); ?></th>
					<th><?php echo __("Email"); ?></th>
					<th><?php echo __("Grupo"); ?></th>
					<th><?php echo __("Criado em"); ?></th>
					<th><?php echo __("Estado"); ?></th>
					<th><?php echo __("Acções"); ?></th>
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
	</div>
</div>
<div class="panel panel-material">
	<div class="panel-heading">
		<div class="row" data-table-id="users_table_2">
			<div class="col-xs-12 col-md-8"><a href="/admin/users/add" class="material-button">Adicionar</a></div>
			<div class="col-xs-12 col-md-4"><input type="text" class="form-control" data-datatables-search></input><label>Pesquisa</label></div>
		</div>
	</div>
	<div class="panel-body">
		<table id="users_table_2" class="table">
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
	</div>
</div>
<?php $this->element('admin-datatables'); ?>
