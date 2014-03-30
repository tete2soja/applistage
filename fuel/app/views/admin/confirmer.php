<h2>Confirmation de l'importation</h2>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No etudiant</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Date de naissance</th>
			<th>Adresse 1</th>
			<th>Code postal 1</th>
			<th>Ville 1</th>
			<th>Adresse 2</th>
			<th>Code postal 2</th>
			<th>Ville 2</th>
			<th>Télephone 1</th>
			<th>Téléphone 2</th>
			<th>Bac</th>
			<th>Bac mention</th>
			<th>Bac année</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
	<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $nom; ?></td>
			<td><?php echo $prenom; ?></td>
			<td><?php echo $datenaissance; ?></td>
			<td><?php echo $adresse1; ?></td>
			<td><?php echo $codepostal1; ?></td>
			<td><?php echo $ville1; ?></td>
			<td><?php echo $adresse2; ?></td>
			<td><?php echo $codepostal2; ?></td>
			<td><?php echo $ville2; ?></td>
			<td><?php echo $telephone1; ?></td>
			<td><?php echo $telephone2; ?></td>
			<td><?php echo $bac; ?></td>
			<td><?php echo $bac_mention; ?></td>
			<td><?php echo $bac_annee; ?></td>
			<td><?php echo $email; ?></td>
		</tr></tbody>
</table>
<form action="" method="POST">
	<button type="submit" name="annuler" value="annuler" class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Annuler</button>
	<button type="submit" name="confirmer" value="confirmer" class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Confirmer</button>
</form>