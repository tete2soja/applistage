<h2>Listing Etudiants</h2>
<br>
<?php if ($etudiants): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No etudiant</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Datenaissance</th>
			<th>Iut annee</th>
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
<p>No Etudiants.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/etudiant/create', 'Add new Etudiant', array('class' => 'btn btn-success')); ?>

</p>
