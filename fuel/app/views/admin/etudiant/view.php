<h2><?php echo $etudiant->nom . " " . $etudiant->prenom; ?></h2>

<p>
	<strong>No étudiant:</strong>
	<?php echo $etudiant->no_etudiant; ?></p>
<p>
	<strong>Nom:</strong>
	<?php echo $etudiant->nom; ?></p>
<p>
	<strong>Prénom:</strong>
	<?php echo $etudiant->prenom; ?></p>
<p>
	<strong>Stage:</strong>
	<?php if(isset($etudiant->stage_id)) echo Html::anchor('admin/stage/view/'.$etudiant->stage_id, $etudiant->stage_id); ?></p>
<p>
	<strong>Date de naissance:</strong>
	<?php echo $etudiant->datenaissance; ?></p>
<p>
	<strong>Sexe:</strong>
	<?php echo $etudiant->sexe; ?></p>
<p>
	<strong>Bac:</strong>
	<?php echo $etudiant->bac; ?></p>
<p>
	<strong>Mention:</strong>
	<?php echo $etudiant->bac_mention; ?></p>
<p>
	<strong>Bac année:</strong>
	<?php echo $etudiant->bac_annee; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $etudiant->email; ?></p>
<p>
	<strong>Adresse1:</strong>
	<?php echo $etudiant->adresse1; ?></p>
<p>
	<strong>Ville1:</strong>
	<?php echo $etudiant->ville1.' ('.$etudiant->code_postal1.')'; ?></p>
<p>
	<strong>Adresse2:</strong>
	<?php echo $etudiant->adresse2; ?></p>
<p>
	<strong>Ville2:</strong>
	<?php echo $etudiant->ville2.' ('.$etudiant->code_postal2.')'; ?></p>
<p>
	<strong>Telephone1:</strong>
	<?php echo $etudiant->telephone1; ?></p>
<p>
	<strong>Telephone2:</strong>
	<?php echo $etudiant->telephone2; ?></p>
<p>
	<strong>Iut année:</strong>
	<?php
		if ($etudiant->iut_annee == 1)
			echo '<span class="label label-info">DUT 1ère année</span>';
		else if ($etudiant->iut_annee == 2)
			echo '<span class="label label-info">DUT 2ème année</span>';
		else if ($etudiant->iut_annee == 3)
			echo '<span class="label label-default">Licence Pro</span>';
	?></p>

<?php echo Html::anchor('admin/etudiant', 'Retour'); ?>