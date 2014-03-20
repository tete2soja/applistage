<h2>Editing Stage</h2>
<br>

<?php echo render('admin/stage/_form'); ?>
<p>
	<?php echo Html::anchor('admin/stage/view/'.$stage->id, 'View'); ?> |
	<?php echo Html::anchor('admin/stage', 'Back'); ?></p>
