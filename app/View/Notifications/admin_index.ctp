<h1><?php echo __("Notificações"); ?></h1>
<div class="panel panel-material">
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th><?php echo __("Notificação"); ?></th>
          <th><?php echo __("Data"); ?></th>
          <th><?php echo __("Acções"); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($notifications as $notification){ ?>
					<tr>
            <td><?php echo $notification['Notification']['message'];?></td>
						<td><?php echo date('Y-m-d H:i',strtotime($notification['Notification']['created']));?></td>
            <td>
              <?php echo $this->Material->viewButton('notifications', $notification['Notification']['id']); ?>
            </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->element('admin-datatables'); ?>
