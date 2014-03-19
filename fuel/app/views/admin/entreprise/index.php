<h2>Listing Entreprises</h2>
<br>
<?php if ($entreprises): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Adresse</th>
			<th>Ville</th>
			<th>Pays</th>
			<th>Url entreprise</th>
			<th>Stagiaire</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($entreprises as $item): ?>		<tr>

			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->adresse; ?></td>
			<td><?php echo $item->ville; ?></td>
			<td><?php echo $item->pays; ?></td>
			<td><?php echo $item->url_entreprise; ?></td>
			<td><?php echo $item->stagiaire; ?></td>
			<td>
				<?php echo Html::anchor('admin/entreprise/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/entreprise/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/entreprise/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Entreprises.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/entreprise/create', 'Add new Entreprise', array('class' => 'btn btn-success')); ?>

</p>
