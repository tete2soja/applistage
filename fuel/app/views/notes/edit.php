<h2>Editing Note</h2>
<br>

<?php echo render('notes/_form'); ?>
<p>
	<?php echo Html::anchor('notes/view/'.$note->id, 'View'); ?> |
	<?php echo Html::anchor('notes', 'Back'); ?></p>
