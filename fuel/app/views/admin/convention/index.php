<h2>Liste des conventions</h2>
<br>
<?php if ($conventions): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Etudiant</th>
			<th>Sujet</th>
			<th>Entreprise</th>
			<th>Responsable legal</th>
			<th>Responsable adm</th>
			<th>Origine</th>
			<th>Type</th>
			<th>Langue</th>
			<th>Durée</th>
			<th>Début</th>
			<th>Fin</th>
			<th>Allongé</th>
			<th>Etat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($conventions as $item): ?>		<tr>

			<td><?php if(empty($item->etudiant))
					echo 'aucun';
				else
					echo '<a href="../etudiant/view/' . $item->etudiant . '" />' . $item->no_etudiant;
				?></td>
			<td><?php echo $item->sujet; ?></td>
			<td><?php echo '<a href="../entreprise/view/' . $item->entreprise . '" />' . $item->entreprise_nom; ?></td>
			<td><?php echo '<a href="../contact/view/' . $item->responsable_legal . '" />' . $item->responsable_legal_nom; ?></td>
			<td><?php echo '<a href="../contact/view/' . $item->responsable_adm . '" />' . $item->responsable_adm_nom; ?></td>
			<td><?php echo $item->origine_offre; ?></td>
			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->langue; ?></td>
			<td><?php echo $item->duree; ?></td>
			<td><?php echo $item->date_debut; ?></td>
			<td><?php echo $item->date_fin; ?></td>
			<td><?php echo $item->allongee; ?></td>
			<td><?php echo $item->etat; ?></td>
			<td>
				<?php echo Html::anchor('admin/convention/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Editer'); ?> |
				<?php echo Html::anchor('admin/convention/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes-vous sur ?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>Aucune convention.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/convention/create', 'Ajouter une convention', array('class' => 'btn btn-success')); ?>

</p>
