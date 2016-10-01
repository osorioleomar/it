
<div class="col-md-6" style="margin:100px">
	<?php foreach ($logs as $log) { ?>
		<div class="bs-callout bs-callout-success">
			<p><em><?php echo $log->time ?></em></p>
			<p><?php echo $log->log; ?></p>
			<hr>
		</div>
	<?php } ?>
</div>
