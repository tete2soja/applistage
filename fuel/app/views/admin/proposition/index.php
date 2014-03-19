<h2>Listing Propositions</h2>
<br>
<?php if ($propositions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Sujet</th>
			<th>Nomcontact</th>
			<th>Publicproposition</th>
			<th>Contextestage</th>
			<th>Conditionstage</th>
			<th>Proposition</th>
			<th>Indemnite</th>
			<th>Public</th>
			<th>Entreprise</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($propositions as $item): ?>		<tr>

			<td><?php echo $item->sujet; ?></td>
			<td><?php echo $item->nomcontact; ?></td>
			<td><?php echo $item->publicproposition; ?></td>
			<td><?php echo $item->contextestage; ?></td>
			<td><?php echo $item->conditionstage; ?></td>
			<td><?php echo $item->proposition; ?></td>
			<td><?php echo $item->indemnite; ?></td>
			<td><?php echo $item->public; ?></td>
			<td><?php echo $item->entreprise; ?></td>
			<td>
				<?php echo Html::anchor('admin/proposition/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/proposition/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/proposition/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Propositions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/proposition/create', 'Add new Proposition', array('class' => 'btn btn-success')); ?>

</p>
