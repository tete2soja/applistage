<h2>Listing Enseignants</h2>
<br>
<?php if ($enseignants): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($enseignants as $item): ?>		<tr>

			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->prenom; ?></td>
			<td><?php echo $item->email; ?></td>
			<td>
				<?php echo Html::anchor('admin/enseignant/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/enseignant/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/enseignant/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Enseignants.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/enseignant/create', 'Add new Enseignant', array('class' => 'btn btn-success')); ?>

</p>
