<h2>Editing Convention</h2>
<br>

<?php echo render('admin/convention/_form'); ?>
<p>
	<?php echo Html::anchor('admin/convention/view/'.$convention->id, 'Voir'); ?> |
	<?php echo Html::anchor('admin/convention', 'Retour'); ?></p>
