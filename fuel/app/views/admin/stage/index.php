<h2>Liste des stages</h2>
<br>
<?php if ($stages): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Date</th>
			<th>Etudiant</th>
			<th>Enseignant</th>
			<th>Entreprise</th>
			<th>Sujet</th>
			<th>Ville</th>
			<th>Pays</th>
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
					echo '<a href="../etudiant/view/' . $item->etudiant . '">' . $item->no_etudiant.'</a>';
				?>
			</td>
			<td>
				<?php if(empty($item->enseignant))
						echo 'aucun';
					else
						echo '<a href="../enseignant/view/' . $item->enseignant . '">' . $item->enseignant_nom.'</a>';
				?>
			</td>
			<td><?php echo '<a href="../entreprise/view/' . $item->entreprise . '">' . $item->ent_nom.'</a>';?></td>
			<td><?php echo $item->sujet; ?></td>
			<td><?php echo $item->ent_ville.' ('.$item->ent_code.')'; ?></td>
			<td><?php echo $item->ent_pays; ?></td>
			<td><?php
				if ($item->public == 0) {
					echo "Tout public";
				}
				else if ($item->public == 1) {
					echo "DUT Info";
				}
				else
					echo "Licence Pro";
			?></td>
			<td><?php
				if ($item->etat == 0) {
					echo "Saisi";
				}
				else if ($item->etat == 1) {
					echo "Validé";
				}
				else if ($item->etat == 2) {
					echo "Refusé";
				}
				else if ($item->etat == 3) {
					echo "Clos";
				}
			?></td>
			<td style="width:201px;text-align:center;">
				<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Editer'); ?>
				<form method="POST">
				<div class="btn-group">
					<button type="submit" name="valide" class="btn btn-success" value=<?php echo "\"" . $item->id . "\""; ?> >Valider</button>
					<button type="submit" name="refus" class="btn btn-warning" value=<?php echo "\"" . $item->id . "\""; ?> >Refuser</button>
					<button type="submit" name="clos" class="btn btn-danger" value=<?php echo "\"" . $item->id . "\""; ?> >Clore</button>
				    </div>
				</form>
				<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes vous sur ?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php else: ?>
<p>Aucun stage.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/stage/create', 'Ajouter un stage', array('class' => 'btn btn-success')); ?>
</p>