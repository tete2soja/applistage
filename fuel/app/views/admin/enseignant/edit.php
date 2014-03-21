<h2>Editing Enseignant</h2>
<br>

<?php echo render('admin/enseignant/_form'); ?>
<p>
	<?php echo Html::anchor('admin/enseignant/view/'.$enseignant->id, 'Voir'); ?> |
	<?php echo Html::anchor('admin/enseignant', 'Retour'); ?></p>
