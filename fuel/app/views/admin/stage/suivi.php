<h2>Liste des stages</h2>
<br>
<?php if ($stages): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Date</th>
			<th>Etudiant</th>
			<th>Contact</th>
			<th>Enseignant</th>
			<th>Entreprise</th>
			<th>Sujet</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($stages as $item):
		if ((!empty($item->etudiant))&&($item->valide == 1)) {
	?>
		<tr>

			<td><?php echo $item->date; ?></td>
			<td>
				<?php if(empty($item->etudiant))
					echo 'aucun';
				else
					echo $item->etudiant;
				?>
			</td>
			<td><?php echo $item->contact; ?></td>
			<td>
				<?php if(empty($item->enseignant))
						echo 'aucun';
					else
						echo $item->enseignant;
				?>
			</td>
			<td><?php echo $item->entreprise; ?></td>
			<td><?php echo $item->sujet; ?></td>
			<td>
				<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?>

			</td>
		</tr>
<?php } endforeach; ?>
</tbody>
</table>

<?php else: ?>
<p>No Stages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/stage/create', 'Add new Stage', array('class' => 'btn btn-success')); ?>
</p>