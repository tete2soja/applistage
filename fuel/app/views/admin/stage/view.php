<h2>Viewing #<?php echo $stage->id; ?></h2>

<p>
	<strong>Etudiant:</strong>
	<?php if(empty($stage->etudiant)) {
					echo 'aucun';
				} else { echo $stage->etudiant; } ?></p>
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
	<strong>Enseignant:</strong>
	<?php if(empty($stage->enseignant)) {
					echo 'aucun';
				} else { echo $stage->enseignant; } ?></p>
<p>
	<strong>Entreprise:</strong>
	<?php echo $stage->entreprise; ?></p>
<p>
	<strong>Sujet:</strong>
	<?php echo $stage->sujet; ?></p>
<p>
	<strong>Visibilite:</strong>
	<?php echo $stage->visibilite; ?></p>
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
	<strong>Public:</strong>
	<?php echo $stage->public; ?></p>
<p>
	<strong>Etat:</strong>
	<?php echo $stage->etat; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $stage->date; ?></p>

<?php echo Html::anchor('admin/stage/edit/'.$stage->id, 'Editer'); ?> |
<?php echo Html::anchor('admin/stage', 'Retour'); ?>