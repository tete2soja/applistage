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
		if ((!empty($item->etudiant))&&($item->etat == 1)) {
	?>
		<tr>

			<td><?php echo $item->date; ?></td>
			<td>
				<?php if(empty($item->etudiant))
					echo 'aucun';
				else
					echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
				?>
			</td>
			<td><?php echo Html::anchor('admin/contact/view/'.$item->contact, $item->contact_nom); ?></td>
			<td>
				<?php if(empty($item->enseignant))
						echo 'aucun';
					else
						echo Html::anchor('admin/enseignant/view/'.$item->enseignant, $item->enseignant_nom);
				?>
			</td>
			<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom); ?></td>
			<td><?php echo $item->sujet; ?></td>
			<td>
				<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?>

			</td>
		</tr>
<?php } endforeach; ?>
</tbody>
</table>

<?php else: ?>
<p>Aucun stage.</p>
<?php endif; ?><p>