<h2><?php echo $enseignant->nom . " " . $enseignant->prenom; ?></h2>

<p>
	<strong>Nom:</strong>
	<?php echo $enseignant->nom; ?></p>
<p>
	<strong>Prénom:</strong>
	<?php echo $enseignant->prenom; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $enseignant->email; ?></p>
<p>
	<strong>Voeu 1:</strong>
	<?php
		if (isset($enseignant->voeux_1))
			echo $enseignant->voeux_1;
	?></p>
<p>
	<strong>Voeu 2:</strong>
	<?php
		if (isset($enseignant->voeux_2))
			echo $enseignant->voeux_2;
	?></p>
<p>
	<strong>Voeu 3:</strong>
	<?php
		if (isset($enseignant->voeux_3))
			echo $enseignant->voeux_3;
	?></p>

<?php echo Html::anchor('admin/enseignant/edit/'.$enseignant->id, 'Editer'); ?> |
<?php echo Html::anchor('admin/enseignant', 'Retour'); ?>