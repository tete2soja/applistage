<h2>Viewing #<?php echo $convention->id; ?></h2>

<p>
	<strong>Etudiant:</strong>
	<?php echo $convention->etudiant; ?></p>
<p>
	<strong>Sujet:</strong>
	<?php echo $convention->sujet; ?></p>
<p>
	<strong>Description stage:</strong>
	<?php echo $convention->description_stage; ?></p>
<p>
	<strong>Environnement dev:</strong>
	<?php echo $convention->environnement_dev; ?></p>
<p>
	<strong>Observations resp:</strong>
	<?php echo $convention->observations_resp; ?></p>
<p>
	<strong>Indemnite:</strong>
	<?php echo $convention->indemnite; ?></p>
<p>
	<strong>Entreprise:</strong>
	<?php echo $convention->entreprise; ?></p>
<p>
	<strong>Responsable legal:</strong>
	<?php echo $convention->responsable_legal; ?></p>
<p>
	<strong>Responsable adm:</strong>
	<?php echo $convention->responsable_adm; ?></p>
<p>
	<strong>Contact urgence:</strong>
	<?php echo $convention->contact_urgence; ?></p>
<p>
	<strong>Rpz np:</strong>
	<?php echo $convention->rpz_np; ?></p>
<p>
	<strong>Rpz adresse:</strong>
	<?php echo $convention->rpz_adresse; ?></p>
<p>
	<strong>Rpz tel:</strong>
	<?php echo $convention->rpz_tel; ?></p>
<p>
	<strong>Origine offre:</strong>
	<?php echo $convention->origine_offre; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $convention->type; ?></p>
<p>
	<strong>Langue:</strong>
	<?php echo $convention->langue; ?></p>
<p>
	<strong>Duree:</strong>
	<?php echo $convention->duree; ?></p>
<p>
	<strong>Date debut:</strong>
	<?php echo $convention->date_debut; ?></p>
<p>
	<strong>Date fin:</strong>
	<?php echo $convention->date_fin; ?></p>
<p>
	<strong>Allongee:</strong>
	<?php echo $convention->allongee; ?></p>
<p>
	<strong>Nb jour semaine:</strong>
	<?php echo $convention->nb_jour_semaine; ?></p>
<p>
	<strong>Horaire hebdo:</strong>
	<?php echo $convention->horaire_hebdo; ?></p>
<p>
	<strong>Retribution:</strong>
	<?php echo $convention->retribution; ?></p>
<p>
	<strong>Nature:</strong>
	<?php echo $convention->nature; ?></p>
<p>
	<strong>Etat:</strong>
	<?php echo $convention->etat; ?></p>

<?php echo Html::anchor('admin/convention/edit/'.$convention->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/convention', 'Back'); ?>