<h2>Edition Etudiant</h2>
<br>

<?php echo render('admin/etudiant/_form'); ?>
<p>
	<?php echo Html::anchor('admin/etudiant/view/'.$etudiant->id, 'Voir'); ?> |
	<?php echo Html::anchor('admin/etudiant', 'Retour'); ?></p>
