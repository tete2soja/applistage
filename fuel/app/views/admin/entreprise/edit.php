<h2>Editing Entreprise</h2>
<br>

<?php echo render('admin/entreprise/_form'); ?>
<p>
	<?php echo Html::anchor('admin/entreprise/view/'.$entreprise->id, 'Voir'); ?> |
	<?php echo Html::anchor('admin/entreprise', 'Retour'); ?></p>
