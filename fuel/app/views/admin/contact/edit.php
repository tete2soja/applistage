<h2>Editing Contact</h2>
<br>

<?php echo render('admin/contact/_form'); ?>
<p>
	<?php echo Html::anchor('admin/contact/view/'.$contact->id, 'View'); ?> |
	<?php echo Html::anchor('admin/contact', 'Back'); ?></p>
