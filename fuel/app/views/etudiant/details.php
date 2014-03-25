<h2>Stage #<?php echo $stage->id; ?></h2>
<p>
	<strong>Entreprise:</strong>
	<?php echo $stage->ent_nom; ?></p>
<p>
	<strong>Contact:</strong>
	<?php echo $stage->contact_nom; ?></p>
<p>
	<strong>Contact email:</strong>
	<?php if(empty($stage->contact_email)) {
					echo 'aucun';
				} else { echo $stage->contact_email; } ?></p>
<p>
	<strong>Contact tél:</strong>
	<?php if(empty($stage->contact_tel)) {
					echo 'aucun';
				} else { echo $stage->contact_tel; } ?></p>
<p>
	<strong>Ville:</strong>	
	<?php echo $stage->ent_ville; ?></p>
<p>
	<strong>Code Postal:</strong>	
	<?php echo $stage->ent_code; ?></p>
<p>
	<strong>Pays:</strong>	
	<?php echo $stage->ent_pays; ?></p>
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
<?php echo Html::anchor('etudiant/formulaire/'.$stage->id, 'Prendre ce stage', array('class' => 'btn btn-success')); ?> |
<?php echo Html::anchor('etudiant/proposition', 'Retour'); ?>