<style type="text/css">
	form {
    padding-left: 15px;
    padding-right: 15px;
	}
</style>
<h2>Edition Contact</h2>
<br>

<?php echo render('admin/contact/_form'); ?>
<p>
	<?php echo Html::anchor('admin/contact/view/'.$contact->id, 'Voir'); ?> |
	<?php echo Html::anchor('admin/contact', 'Retour'); ?></p>
