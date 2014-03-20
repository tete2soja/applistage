<h2>Viewing #<?php echo $stage->id; ?></h2>

<p>
	<strong>Etudiant:</strong>
	<?php echo $stage->etudiant; ?></p>
<p>
	<strong>Contact:</strong>
	<?php echo $stage->contact; ?></p>
<p>
	<strong>Enseignant:</strong>
	<?php echo $stage->enseignant; ?></p>
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
	<?php echo $stage->conditions; ?></p>
<p>
	<strong>Url doc:</strong>
	<?php echo $stage->url_doc; ?></p>
<p>
	<strong>Public:</strong>
	<?php echo $stage->public; ?></p>
<p>
	<strong>Valide:</strong>
	<?php echo $stage->valide; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $stage->date; ?></p>

<?php echo Html::anchor('admin/stage/edit/'.$stage->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/stage', 'Back'); ?>