<h2>Listing Stages</h2>
<br>
<?php if ($stages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Etudiant</th>
			<th>Contact</th>
			<th>Enseignant</th>
			<th>Entreprise</th>
			<th>Sujet</th>
			<th>Visibilite</th>
			<th>Contexte</th>
			<th>Resultats</th>
			<th>Conditions</th>
			<th>Url doc</th>
			<th>Public</th>
			<th>Valide</th>
			<th>Date</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stages as $item): ?>		<tr>

			<td><?php echo $item->etudiant; ?></td>
			<td><?php echo $item->contact; ?></td>
			<td><?php echo $item->enseignant; ?></td>
			<td><?php echo $item->entreprise; ?></td>
			<td><?php echo $item->sujet; ?></td>
			<td><?php echo $item->visibilite; ?></td>
			<td><?php echo $item->contexte; ?></td>
			<td><?php echo $item->resultats; ?></td>
			<td><?php echo $item->conditions; ?></td>
			<td><?php echo $item->url_doc; ?></td>
			<td><?php echo $item->public; ?></td>
			<td><?php echo $item->valide; ?></td>
			<td><?php echo $item->date; ?></td>
			<td>
				<?php echo Html::anchor('admin/stage/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/stage/create', 'Add new Stage', array('class' => 'btn btn-success')); ?>

</p>
