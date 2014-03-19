<h2>Listing Contacts</h2>
<br>
<?php if ($contacts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Telephone</th>
			<th>Email</th>
			<th>Entreprise</th>
			<th>Encadre</th>
			<th>Signe</th>
			<th>Propose</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contacts as $item): ?>		<tr>

			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->prenom; ?></td>
			<td><?php echo $item->telephone; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->entreprise; ?></td>
			<td><?php echo $item->encadre; ?></td>
			<td><?php echo $item->signe; ?></td>
			<td><?php echo $item->propose; ?></td>
			<td>
				<?php echo Html::anchor('admin/contact/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/contact/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/contact/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Contacts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/contact/create', 'Add new Contact', array('class' => 'btn btn-success')); ?>

</p>
