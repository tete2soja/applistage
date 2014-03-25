<h2>Détails #<?php echo $convention->id; ?></h2>

<p>
	<strong>Numéro Etudiant:</strong>
	<?php echo Html::anchor('admin/etudiant/view/'.$convention->id, $convention->etudiant); ?></p>
<p>
	<strong>Etudiant:</strong>
	<?php echo $convention->etudiant_np; ?></p>
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
	<strong>Indemnité:</strong>
	<?php echo $convention->indemnite; ?></p>
<p>
	<strong>Entreprise:</strong>
	<?php echo Html::anchor('admin/entreprise/view/'.$convention->entreprise, $convention->ent_nom); ?></p>
<p>
	<strong>Responsable légal:</strong>
	<?php echo Html::anchor('admin/contact/view/'.$convention->responsable_tech, $convention->responsable_tech_np); ?></p>
<p>
	<strong>Responsable adm:</strong>
	<?php echo Html::anchor('admin/contact/view/'.$convention->responsable_adm, $convention->responsable_adm_np); ?></p>
<p>
	<strong>Contact urgence:</strong>
	<?php echo $convention->contact_urgence; ?></p>
<p>
	<strong>Représentant légal:</strong>
	<?php echo $convention->rpz_np; ?></p>
<p>
	<strong>Représentant légal adresse:</strong>
	<?php echo $convention->rpz_adresse; ?></p>
<p>
	<strong>Représentant légal tel:</strong>
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
	<strong>Durée:</strong>
	<?php echo $convention->duree; ?></p>
<p>
	<strong>Date de debut:</strong>
	<?php echo $convention->date_debut; ?></p>
<p>
	<strong>Date de fin:</strong>
	<?php echo $convention->date_fin; ?></p>
<p>
	<strong>Durée allongée :</strong>
	<?php echo $convention->allongee; ?></p>
<p>
	<strong>Nombre jour/semaine:</strong>
	<?php echo $convention->nb_jour_semaine; ?></p>
<p>
	<strong>Horaire hebdo:</strong>
	<?php echo $convention->horaire_hebdo; ?></p>
<p>
	<strong>Rétribution:</strong>
	<?php echo $convention->retribution; ?></p>
<p>
	<strong>Nature:</strong>
	<?php echo $convention->nature; ?></p>
<p>
	<strong>Etat:</strong>
	<?php echo $convention->etat; ?></p>

<form method="POST">
	<div class="btn-group">
		<button type="submit" name="imprime" class="btn btn-success" value=<?php echo "\"" . $convention->id . "\""; ?> >Imprimée</button>
		<button type="submit" name="incomplete" class="btn btn-warning" value=<?php echo "\"" . $convention->id . "\""; ?> >Incomplète</button>
	</div>
</form>
<?php echo Html::anchor('admin/convention/edit/'.$convention->id, 'Editer'); ?> |
<?php echo Html::anchor('admin/convention', 'Retour'); ?>