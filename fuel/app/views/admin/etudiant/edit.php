<h2>Editing Etudiant</h2>
<br>

<?php echo render('admin/etudiant/_form'); ?>
<p>
	<?php echo Html::anchor('admin/etudiant/view/'.$etudiant->id, 'View'); ?> |
	<?php echo Html::anchor('admin/etudiant', 'Back'); ?></p>
