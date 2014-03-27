<h2>Détails #<?php echo $contact->id; ?></h2>

<p>
	<strong>Nom:</strong>
	<?php echo $contact->nom; ?></p>
<p>
	<strong>Prénom:</strong>
	<?php echo $contact->prenom; ?></p>
<p>
	<strong>Téléphone:</strong>
	<?php echo $contact->telephone; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $contact->email; ?></p>
<p>
	<strong>Entreprise:</strong>
	<?php echo Html::anchor('admin/entreprise/view/'.$contact->entreprise, $contact->ent_nom); ?></p>
<p>
	<strong>Encadre:</strong>
	<?php echo $contact->encadre; ?></p>
<p>
	<strong>Signe:</strong>
	<?php echo $contact->signe; ?></p>
<p>
	<strong>Propose:</strong>
	<?php echo $contact->propose; ?></p>

<?php echo Html::anchor('admin/contact/edit/'.$contact->id, 'Editer'); ?> |
<?php echo Html::anchor('admin/contact', 'Retour'); ?>