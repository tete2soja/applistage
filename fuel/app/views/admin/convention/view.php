<h2>Détails #<?php echo $convention->id; ?></h2>

<p>
	<strong>Numéro Etudiant:</strong>
	<?php if(isset($convention->etudiant)) echo Html::anchor('admin/etudiant/view/'.$convention->etudiant, $convention->no_etudiant); ?></p>
<p>
	<strong>Etudiant:</strong>
	<?php if(isset($convention->etudiant_np)) echo $convention->etudiant_np; ?></p>
<p>
	<strong>Stage:</strong>
	<?php echo Html::anchor('admin/stage/view/'.$convention->stage, $convention->stage); ?></p>
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
	<?php if(isset($convention->observations_resp)) echo $convention->observations_resp; ?></p>
<p>
	<strong>Indemnité:</strong>
	<?php echo $convention->indemnite; ?></p>
<p>
	<strong>Entreprise:</strong>
	<?php echo Html::anchor('admin/entreprise/view/'.$convention->entreprise, $convention->ent_nom); ?></p>
<p>
	<strong>Responsable technique:</strong>
	<?php echo Html::anchor('admin/contact/view/'.$convention->responsable_tech, $convention->responsable_tech_np); ?></p>
<p>
	<strong>Responsable administratif:</strong>
	<?php echo Html::anchor('admin/contact/view/'.$convention->responsable_adm, $convention->responsable_adm_np); ?></p>
<p>
	<strong>Contact urgence:</strong>
	<?php echo $convention->contact_urgence; ?></p>
<p>
	<strong>Contact urgence téléphone:</strong>
	<?php echo $convention->contact_urgence_tel; ?></p>
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
	<?php
		if ($convention->origine_offre == 0)
			echo "IUT";
		else
			echo "Etudiant";
	?></p>
<p>
	<strong>Type:</strong>
	<?php echo $convention->type; ?></p>
<p>
	<strong>Langue:</strong>
	<?php
		if ($convention->langue == 0)
			echo "Français";
		else
			echo "Anglais";
	?></p>
<p>
	<strong>Durée (semaines):</strong>
	<?php echo $convention->duree; ?></p>
<p>
	<strong>Date de debut:</strong>
	<?php echo $convention->date_debut; ?></p>
<p>
	<strong>Date de fin:</strong>
	<?php echo $convention->date_fin; ?></p>
<p>
	<strong>Durée allongée :</strong>
	<?php
		if ($convention->allongee == 0)
			echo "Non";
		else
			echo "Oui";
	?></p>
<p>
	<strong>Nombre jour/semaine:</strong>
	<?php echo $convention->nb_jour_semaine; ?></p>
<p>
	<strong>Horaire hebdo:</strong>
	<?php echo $convention->horaire_hebdo; ?></p>
<p>
	<strong>Rétribution:</strong>
	<?php if(isset($convention->retribution)) echo $convention->retribution; ?></p>
<p>
	<strong>Nature:</strong>
	<?php if(isset($convention->nature)) echo $convention->nature; ?></p>
<p>
	<strong>Etat:</strong>
	<?php
		if ($convention->etat == 0) {
			echo '<span class="label label-info">Saisie</span>';
		}
		else if ($convention->etat == 1) {
			echo '<span class="label label-warning">Incomplète</span>';
		}
		else if ($convention->etat == 2) {
			echo '<span class="label label-success">Générée</span>';
		}
		else if ($convention->etat == 3) {
			echo '<span class="label label-primary">Complète</span>';
		}
	?></p>
<p>
	<strong>Fichier :</strong>
	<?php
		if(isset($convention->chemin_file))
			echo Html::anchor($convention->chemin_file, $convention->chemin_file);
		else
			echo 'Aucun';
	?></p>
<br />
<form method="POST">
	<div class="btn-group">
		<button type="submit" name="incomplete" class="btn btn-warning" value=<?php echo "\"" . $convention->id . "\""; ?> >Incomplète</button>
		<button type="submit" name="complete" class="btn btn-primary" value=<?php echo "\"" . $convention->id . "\""; ?> >Complète</button>
	</div>
	<div class="btn-group">
		<button class="btn btn-info" data-toggle="modal" data-target="#modalUp" value=<?php echo "\"" . $convention->id . "\""; ?> >Uploader</button>
		<button type="submit" name="generee" class="btn btn-success" value=<?php echo "\"" . $convention->id . "\""; ?> >Générer</button>
	</div>
</form>
<br />
<?php echo Html::anchor('admin/convention/edit/'.$convention->id, 'Editer'); ?> |
<?php echo Html::anchor('admin/convention', 'Retour'); ?>

<div class="modal fade" id="modalUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Upload de la convention</h4>
			</div>
			<div class="modal-body">
				<form enctype='multipart/form-data' action="" method="POST">
					<input size='50' type='file' name='filename' /><br />
					<button type="submit" name="uploader" value=<?php echo "\"" . $convention->no_etudiant . "\""; ?> class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Envoyer</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>