<h2>Viewing #<?php echo $etudiant->id; ?></h2>

<p>
	<strong>No etudiant:</strong>
	<?php echo $etudiant->no_etudiant; ?></p>
<p>
	<strong>Nom:</strong>
	<?php echo $etudiant->nom; ?></p>
<p>
	<strong>Prenom:</strong>
	<?php echo $etudiant->prenom; ?></p>
<p>
	<strong>Datedenaissance:</strong>
	<?php echo $etudiant->datedenaissance; ?></p>
<p>
	<strong>Sexe:</strong>
	<?php echo $etudiant->sexe; ?></p>
<p>
	<strong>Bac:</strong>
	<?php echo $etudiant->bac; ?></p>
<p>
	<strong>Mention:</strong>
	<?php echo $etudiant->mention; ?></p>
<p>
	<strong>Bac annee:</strong>
	<?php echo $etudiant->bac_annee; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $etudiant->email; ?></p>
<p>
	<strong>Adresse1:</strong>
	<?php echo $etudiant->adresse1; ?></p>
<p>
	<strong>Ville1:</strong>
	<?php echo $etudiant->ville1; ?></p>
<p>
	<strong>Adresse2:</strong>
	<?php echo $etudiant->adresse2; ?></p>
<p>
	<strong>Ville2:</strong>
	<?php echo $etudiant->ville2; ?></p>
<p>
	<strong>Telephone1:</strong>
	<?php echo $etudiant->telephone1; ?></p>
<p>
	<strong>Telephone2:</strong>
	<?php echo $etudiant->telephone2; ?></p>
<p>
	<strong>Iut annee:</strong>
	<?php echo $etudiant->iut_annee; ?></p>

<?php echo Html::anchor('admin/etudiant/edit/'.$etudiant->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/etudiant', 'Back'); ?>