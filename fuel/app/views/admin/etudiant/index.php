<h2>Liste des Etudiants</h2>
<br>
<?php if ($etudiants): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No etudiant</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Date de naissance</th>
			<th>Iut année</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($etudiants as $item): ?>		<tr>
			<td><?php echo $item->no_etudiant; ?></td>
			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->prenom; ?></td>
			<td><?php echo $item->datenaissance; ?></td>
			<td><?php echo $item->iut_annee; ?></td>
			<td>
				<?php echo Html::anchor('admin/etudiant/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/etudiant/edit/'.$item->id, 'Editer'); ?> |
				<?php echo Html::anchor('admin/etudiant/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Etes-vous sur ?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>Au Etudiant.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/etudiant/create', 'Ajouter un Etudiant', array('class' => 'btn btn-success')); ?>
</p>