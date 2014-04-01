<h2>Passage des INFO1 en INFO2</h2>
<br>
<p>
	Par défaut, la case validant le changement d'années pour les étudiants est cochée. Vous devez donc seulement décocher les cases concernant les élèves redoublant leur première année.<br />
	Une seconde case peut-être coché pour les étudiants se réorientant ou démissionnaires afin de les supprimer de la base de données. vous devrez alors décocher la première avant de cocher la deuxième.
</p>
<br />
<?php if ($etudiants): ?>
<form role="form" method="POST" action="">
<div class="table-responsive">
<table class="table table-hover">
	<thead>
		<tr>
			<th>Numéro étudiant</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Passage en 2A</th>
			<th>Supprimer l'étudiant</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($etudiants as $etudiant):
if($etudiant->iut_annee==1) { ?>
		<tr>
			<td><?php echo $etudiant->no_etudiant; ?></td>
			<td><?php echo $etudiant->nom; ?></td>
			<td><?php echo $etudiant->prenom; ?></td>
			<td>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="passage[]" value=<?php echo "\"" . $etudiant->no_etudiant . "\""; ?> checked="checked" />
					</label>
				</div>
			</td>
			<td>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="suppression[]" value=<?php echo "\"" . $etudiant->no_etudiant . "\""; ?> />
					</label>
				</div>
			</td>
		</tr>
<?php } endforeach; ?>	</tbody>
</table>
</div>

<?php else: ?>
<p>Pas d'étudiant dans la base de données actuellement.</p>

<?php endif; ?><p>
	<br />
	<div class="row">
			<div class="col-md-12">
				<button type="submit" name="submit" value="submit" class="btn btn-default">Valider le passage en deuxième année</button>
			</div>
	</div>