<h2>Listing Etudiants</h2>
<br>
<?php if ($etudiants): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>No etudiant</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Datedenaissance</th>
			<th>Sexe</th>
			<th>Bac</th>
			<th>Mention</th>
			<th>Bac annee</th>
			<th>Email</th>
			<th>Adresse1</th>
			<th>Ville1</th>
			<th>Adresse2</th>
			<th>Ville2</th>
			<th>Telephone1</th>
			<th>Telephone2</th>
			<th>Iut annee</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($etudiants as $item): ?>		<tr>

			<td><?php echo $item->no_etudiant; ?></td>
			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->prenom; ?></td>
			<td><?php echo $item->datedenaissance; ?></td>
			<td><?php echo $item->sexe; ?></td>
			<td><?php echo $item->bac; ?></td>
			<td><?php echo $item->mention; ?></td>
			<td><?php echo $item->bac_annee; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->adresse1; ?></td>
			<td><?php echo $item->ville1; ?></td>
			<td><?php echo $item->adresse2; ?></td>
			<td><?php echo $item->ville2; ?></td>
			<td><?php echo $item->telephone1; ?></td>
			<td><?php echo $item->telephone2; ?></td>
			<td><?php echo $item->iut_annee; ?></td>
			<td>
				<?php echo Html::anchor('admin/etudiant/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/etudiant/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/etudiant/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Etudiants.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/etudiant/create', 'Add new Etudiant', array('class' => 'btn btn-success')); ?>

</p>
