<h2><?php echo $entreprise->nom; ?></h2>

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
	<?php if(empty($entreprise->url_entreprise)) {
					echo 'Aucun';
				} else { echo ' ' . Html::anchor($entreprise->url_entreprise, $entreprise->url_entreprise); } ?></p>
<p>
	<strong>Stagiaire:</strong>
	<?php if(empty($entreprise->stagiaire)) {
					echo 'Aucun';
				} else { echo $entreprise->stagiaire; } ?></p>

<?php echo Html::anchor('admin/entreprise', 'Retour'); ?>