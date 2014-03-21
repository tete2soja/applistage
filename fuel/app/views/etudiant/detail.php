<h2>Stage #<?php echo $stage->id; ?></h2>

	<strong>Entreprise:</strong>
	<?php echo $stage->entreprise; ?></p>
<p>
	<strong>Ville:</strong>	
	<?php echo $stage->ent_ville; ?>
<p>
	<strong>Pays:</strong>	
	<?php echo $stage->ent_pays; ?>
</p>
<p>
	<strong>Sujet:</strong>
	<?php echo $stage->sujet; ?></p>
<p>
	<strong>Contexte:</strong>
	<?php echo $stage->contexte; ?></p>
<p>
	<strong>Resultats:</strong>
	<?php echo $stage->resultats; ?></p>
<p>
	<strong>Conditions:</strong>
	<?php if(empty($stage->conditions)) {
					echo 'aucun';
				} else { echo $stage->conditions; } ?></p>
<p>
	<strong>Url doc:</strong><?php if(empty($stage->url_doc)) {
					echo ' aucun';
				} else { echo ' ' . Html::anchor($stage->url_doc, $stage->url_doc); } ?>
<p>
	<strong>Date:</strong>
	<?php echo $stage->date; ?></p>
<br />
<?php echo Html::anchor('etudiant/proposition', 'Retour'); ?>