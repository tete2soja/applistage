<h2>Viewing #<?php echo $entreprise->id; ?></h2>

<p>
	<strong>Nom:</strong>
	<?php echo $entreprise->nom; ?></p>
<p>
	<strong>Adresse:</strong>
	<?php echo $entreprise->adresse; ?></p>
<p>
	<strong>Ville:</strong>
	<?php echo $entreprise->ville; ?></p>
<p>
	<strong>Pays:</strong>
	<?php echo $entreprise->pays; ?></p>
<p>
	<strong>Url entreprise:</strong>
	<?php echo $entreprise->url_entreprise; ?></p>
<p>
	<strong>Stagiaire:</strong>
	<?php echo $entreprise->stagiaire; ?></p>

<?php echo Html::anchor('admin/entreprise/edit/'.$entreprise->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/entreprise', 'Back'); ?>