<h2>Editing Enseignant</h2>
<br>

<?php echo render('admin/enseignant/_form'); ?>
<p>
	<?php echo Html::anchor('admin/enseignant/view/'.$enseignant->id, 'View'); ?> |
	<?php echo Html::anchor('admin/enseignant', 'Back'); ?></p>
