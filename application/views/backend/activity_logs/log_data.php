<?php foreach ($check as $log): ?>
	<tr>
		<td><?= $log->name ?></td>
		<td><?= $log->action_controller ?></td>
		<td><?= $log->action_method ?></td>
		<td><?= date('l, j-F-Y h:i:sa', strtotime($log->date_time)) ?></td>
		<td><a href="<?= base_url('activity_logs/log_detail/').$log->log_id ?>" type="button" class="btn bg-gradient-primary btn-sm" title="View"><li class="fa fa-eye"></li></a></td>
	</tr>
<?php endforeach; ?>
