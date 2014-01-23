<h2>Listing Notes</h2>
<br>
<?php if ($notes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Titre</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($notes as $item): ?>		<tr>

			<td><?php echo $item->titre; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
				<?php echo Html::anchor('notes/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('notes/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('notes/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Notes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('notes/create', 'Add new Note', array('class' => 'btn btn-success')); ?>

</p>
