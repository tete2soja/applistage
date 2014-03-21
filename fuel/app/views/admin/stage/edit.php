<h2>Editing Stage</h2>
<br>

<?php echo render('admin/stage/_form'); ?>
<p>
	<?php echo Html::anchor('admin/stage/view/'.$stage->id, 'Voir'); ?> |
	<?php echo Html::anchor('admin/stage', 'Retour'); ?></p>
