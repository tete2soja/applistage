<h2>Editing Proposition</h2>
<br>

<?php echo render('admin/proposition/_form'); ?>
<p>
	<?php echo Html::anchor('admin/proposition/view/'.$proposition->id, 'View'); ?> |
	<?php echo Html::anchor('admin/proposition', 'Back'); ?></p>
