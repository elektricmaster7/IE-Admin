<h2><?php echo __("Utilizadores"); ?></h2>
<div class="panel panel-material">
	<div class="panel-heading">
		<div class="row" data-table-id="users_table">
			<div class="col-xs-12 col-md-8"></div>
			<div class="col-xs-12 col-md-4"><input type="text" class="form-control" data-datatables-search/><label><?php echo __("Pesquisa"); ?></label></div>
		</div>
	</div>
	<div class="panel-body">
		<table id="users_table" class="table material-table table-responsive">
			<thead>
				<tr>
					<th><?php echo __("ID"); ?></th>
					<th><?php echo __("Login"); ?></th>
					<th><?php echo __("Email"); ?></th>
					<th><?php echo __("Grupo"); ?></th>
					<!--<th><?php //echo __("Criado em"); ?></th>-->
					<!--<th><?php //echo __("Estado"); ?></th>-->
					<th><?php echo __("Acções"); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user){ ?>
					<?php if($user['User']['id'] == 1 && !$this->Authake->isMemberOf(1)){ continue; } ?>
					<?php if(($user['User']['id'] == 1 || $user['User']['id'] == 2) && (!$this->Authake->isMemberOf(1) && !$this->Authake->isMemberOf(2))){ continue; } ?>
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
						<!--<td><?php //echo $this->Time->format('d/m/Y', $user['User']['created']); ?>&nbsp;</td>-->
						<!--<td>
							<?php
							//DISABLED
							//if ($user['User']['disable']) echo __('Desactivado').'&nbsp;';
							//EXPIRED
							//$exp = $user['User']['expire_account'];
							//if ($exp != '0000-00-00' && $this->Time->fromString($exp) < time()) echo __('Expirado');
							?>
						</td>-->
						<td><!--EDIT DELETE-->
							<?php echo $this->Material->editButton('users', $user['User']['id']); ?>
							<?php if($user['User']['id'] != 1 && $user['User']['id'] != 2){ ?>
								<?php echo $this->Material->deleteButton('users', $user['User']['id'], array(
									'confirm' => true,
									'title' => __('Eliminar utilizador'),
									'message' => __('Tem a certeza que pretende eliminar o utilizador?')
								)); ?>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<!--BUTTON BAR-->
<div class="button-bar">
	<a href="/admin/users/add" class="material-tooltip" data-toggle="tooltip" data-placement="auto top" title="<?php echo __('Adicionar'); ?>"><i class="material-icons md-24 round-button">add</i></a>
</div>
<?php $this->element('admin-datatables'); ?>
