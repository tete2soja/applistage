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
			<th>Contexte</th>
			<th>Public</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($stages as $item): ?>
		<tr>

			<td><?php echo $item->date; ?></td>
			<td>
				<?php if(empty($item->etudiant))
					echo 'aucun';
				else
					echo '<a href="../etudiant/view/' . $item->etudiant . '" />' . $item->etudiant;
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
			<td><?php echo $item->contexte; ?></td>
			<td><?php
				if ($item->public == 0) {
					echo "Tout public";
				}
				else if ($item->public == 1) {
					echo "DUT Info";
				}
				else
					echo "Licence pro";
			?></td>
			<td><?php
				if ($item->valide == 0) {
					echo "Non validé";
				}
				else {
					echo "Validé";
				}
			?></td>
			<td>
				<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Editer'); ?> |
				<form method="POST">
					<button type="submit" name="submit" class="btn btn-success" value=<?php echo "\"" . $item->id . "\""; ?> >Valider</button>
				</form>|
				<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes vous sur ?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php else: ?>
<p>No Stages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/stage/create', 'Ajouter un stage', array('class' => 'btn btn-success')); ?>
</p>