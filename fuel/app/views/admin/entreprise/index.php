<h2>Liste des Entreprises</h2>
<br>
<?php if ($entreprises): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Adresse</th>
			<th>Ville</th>
			<th>Pays</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($entreprises as $item): ?>		<tr>

			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->adresse; ?></td>
			<td><?php echo $item->ville; ?></td>
			<td><?php echo $item->pays; ?></td>
			<td>
				<?php echo Html::anchor('admin/entreprise/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/entreprise/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes-vous sur ?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>Aucune Entreprise.</p>

<?php endif; ?><p>
