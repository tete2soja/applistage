<h2>Listing Conventions</h2>
<br>
<?php if ($conventions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Etudiant</th>
			<th>Sujet</th>
			<th>Description stage</th>
			<th>Environnement dev</th>
			<th>Observations resp</th>
			<th>Indemnite</th>
			<th>Entreprise</th>
			<th>Responsable legal</th>
			<th>Responsable adm</th>
			<th>Contact urgence</th>
			<th>Rpz np</th>
			<th>Rpz adresse</th>
			<th>Rpz tel</th>
			<th>Origine offre</th>
			<th>Type</th>
			<th>Langue</th>
			<th>Duree</th>
			<th>Date debut</th>
			<th>Date fin</th>
			<th>Allongee</th>
			<th>Nb jour semaine</th>
			<th>Horaire hebdo</th>
			<th>Retribution</th>
			<th>Nature</th>
			<th>Etat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($conventions as $item): ?>		<tr>

			<td><?php echo $item->etudiant; ?></td>
			<td><?php echo $item->sujet; ?></td>
			<td><?php echo $item->description_stage; ?></td>
			<td><?php echo $item->environnement_dev; ?></td>
			<td><?php echo $item->observations_resp; ?></td>
			<td><?php echo $item->indemnite; ?></td>
			<td><?php echo $item->entreprise; ?></td>
			<td><?php echo $item->responsable_legal; ?></td>
			<td><?php echo $item->responsable_adm; ?></td>
			<td><?php echo $item->contact_urgence; ?></td>
			<td><?php echo $item->rpz_np; ?></td>
			<td><?php echo $item->rpz_adresse; ?></td>
			<td><?php echo $item->rpz_tel; ?></td>
			<td><?php echo $item->origine_offre; ?></td>
			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->langue; ?></td>
			<td><?php echo $item->duree; ?></td>
			<td><?php echo $item->date_debut; ?></td>
			<td><?php echo $item->date_fin; ?></td>
			<td><?php echo $item->allongee; ?></td>
			<td><?php echo $item->nb_jour_semaine; ?></td>
			<td><?php echo $item->horaire_hebdo; ?></td>
			<td><?php echo $item->retribution; ?></td>
			<td><?php echo $item->nature; ?></td>
			<td><?php echo $item->etat; ?></td>
			<td>
				<?php echo Html::anchor('admin/convention/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/convention/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Conventions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/convention/create', 'Add new Convention', array('class' => 'btn btn-success')); ?>

</p>
