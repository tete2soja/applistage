<h2>Détails #<?php echo $stage->id; ?></h2>

<p>
	<strong>Etudiant:</strong>
	<?php if(empty($stage->etudiant)) {
					echo 'aucun';
				} else { echo Html::anchor('admin/etudiant/view/'.$stage->etudiant, $stage->no_etudiant); } ?></p>
<p>
	<strong>Contact:</strong>
	<?php echo Html::anchor('admin/contact/view/'.$stage->contact, $stage->contact_nom); ?></p>
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
				} else { echo Html::anchor('admin/enseignant/view/'.$stage->enseignant, $stage->enseignant_nom); } ?></p>
<p>
	<strong>Entreprise:</strong>
	<?php echo Html::anchor('admin/entreprise/view/'.$stage->entreprise, $stage->ent_nom); ?></p>
<p>
	<strong>Sujet:</strong>
	<?php echo $stage->sujet; ?></p>
<p>
	<strong>Visibilité:</strong>
	<?php
		if ($stage->visibilite == 0) {
			echo 'non visible pour les entreprises';
		}
		else {
			echo 'visible par tous (entreprises et étudiants)';
		}
	?></p>
<p>
	<strong>Contexte:</strong>
	<?php echo $stage->contexte; ?></p>
<p>
	<strong>Résultats:</strong>
	<?php echo $stage->resultats; ?></p>
<p>
	<strong>Conditions:</strong>
	<?php if(empty($stage->conditions)) {
					echo 'aucun';
				} else { echo $stage->conditions; } ?></p>
<p>
	<strong>Url doc:</strong><?php if(empty($stage->url_doc)) {
					echo ' aucun';
				} else { echo ' ' . Html::anchor($stage->url_doc, $stage->url_doc); } ?></p>
<p>
	<strong>Doc joint:</strong><?php if(empty($stage->chemin_pdf)) {
					echo ' aucun';
				} else { echo ' ' . '<form method="POST"><button type="submit" name="doc" class="btn btn-success" value=' . "\"" . $stage->chemin_pdf . "\">Voir</button></form>"; } ?></p>
<p>
	<strong>Public:</strong>
	<?php
		if ($stage->public == 0) {
			echo '<span class="label label-default">Tout public</span>';
		}
		elseif ($stage->public == 1) {
			echo '<span class="label label-info">DUT Info</span>';
		}
		else {
			echo '<span class="label label-success">License Pro</span>';
		}
	?></p>
<p>
	<strong>Etat:</strong>
	<?php
		if ($stage->etat == 0) {
			echo '<span class="label label-info">Saisi</span>';
		}
		else if ($stage->etat == 1) {
			echo '<span class="label label-success">Validé</span>';
		}
		else if ($stage->etat == 2) {
			echo '<span class="label label-warning">Refusé</span>';
		}
		else if ($stage->etat == 3) {
			echo '<span class="label label-danger">Clos</span>';
		}
	?></p>
<p>
	<strong>Date d'ajout:</strong>
	<?php echo $stage->date; ?></p>
<br />
<form method="POST">
	<div class="btn-group">
		<button type="submit" name="valide" class="btn btn-success" value=<?php echo "\"" . $stage->id . "\""; ?> >Valider</button>
		<button type="submit" name="refus" class="btn btn-warning" value=<?php echo "\"" . $stage->id . "\""; ?> >Refuser</button>
		<button type="submit" name="clos" class="btn btn-danger" value=<?php echo "\"" . $stage->id . "\""; ?> >Clore</button>
	</div>
</form>
<br />
<?php echo Html::anchor('admin/stage', 'Retour'); ?>