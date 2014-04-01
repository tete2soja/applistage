<h2>Gestion des INFO2</h2>
<br>
<p>
	Vous devez ici coché les cases qui correpondent au élèves de deuxième année qui redoublent ou qui se sont réorientés en cours d'année. Si aucune case n'est cochée, les étudiants seront déplacés vers la table `etudiant_diplome`.
	La case 'reboublement' maintient l'étudiant dans la table tant dis que la deuxième le supprime sans le déplacer dans la table `etudiant_diplome`.
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
			<th>Redoublement en 2A</th>
			<th>Réorientation</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($etudiants as $etudiant):
if($etudiant->iut_annee==2) { ?>
		<tr>
			<td><?php echo $etudiant->no_etudiant; ?></td>
			<td><?php echo $etudiant->nom; ?></td>
			<td><?php echo $etudiant->prenom; ?></td>
			<td>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="redoublement[]" value=<?php echo "\"" . $etudiant->no_etudiant . "\""; ?>>
					</label>
				</div>
			</td>
			<td>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="reorientation[]" value=<?php echo "\"" . $etudiant->no_etudiant . "\""; ?>>
					</label>
				</div>
			</td>
		</tr>
<?php } endforeach; ?>	</tbody>
</table>
</div>

<?php else: ?>
<p>Pas d'étudiants dans la base de données actuellement.</p>

<?php endif; ?><p>
	<br />
	<div class="row">
			<div class="col-md-12">
				<button type="submit" name="submit" value="submit" class="btn btn-default">Valider</button>
			</div>
		</div>
</form>