<h2>Editer l'utilisateur</h2>
<br>

<?php echo render('admin/users/_form'); ?>
<p>
	<?php echo Html::anchor('admin/users/view/'.$user->id, 'View'); ?> |
	<?php echo Html::anchor('admin/users', 'Back'); ?></p>
