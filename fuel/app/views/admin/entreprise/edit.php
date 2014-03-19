<h2>Editing Entreprise</h2>
<br>

<?php echo render('admin/entreprise/_form'); ?>
<p>
	<?php echo Html::anchor('admin/entreprise/view/'.$entreprise->id, 'View'); ?> |
	<?php echo Html::anchor('admin/entreprise', 'Back'); ?></p>
