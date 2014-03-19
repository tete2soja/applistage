<h2>Listing Enseignants</h2>
<br>
<?php if ($enseignants): ?>
<table class="table table-bordered">
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
				<?php echo Html::anchor('admin/enseignant/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/enseignant/edit/'.$item->id, 'Editer'); ?> |
				<?php echo Html::anchor('admin/enseignant/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Etes-vous sur ?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Enseignants.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/enseignant/create', 'Add new Enseignant', array('class' => 'btn btn-success')); ?>
</p>