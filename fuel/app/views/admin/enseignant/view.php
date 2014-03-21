<h2><?php echo $enseignant->nom . " " . $enseignant->prenom; ?></h2>

<p>
	<strong>Nom:</strong>
	<?php echo $enseignant->nom; ?></p>
<p>
	<strong>Prenom:</strong>
	<?php echo $enseignant->prenom; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $enseignant->email; ?></p>

<?php echo Html::anchor('admin/enseignant/edit/'.$enseignant->id, 'Editer'); ?> |
<?php echo Html::anchor('admin/enseignant', 'Retour'); ?>