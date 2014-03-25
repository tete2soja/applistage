<h2>Liste des conventions</h2>
<br>
<?php if ($conventions): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Etudiant</th>
			<th>Sujet</th>
			<th>Entreprise</th>
			<th>Responsable tech</th>
			<th>Responsable adm</th>
			<th>Origine</th>
			<th>Type</th>
			<th>Langue</th>
			<th>Durée</th>
			<th>Etat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($conventions as $item): ?>		<tr>

			<td><?php if(empty($item->etudiant))
					echo 'aucun';
				else
					echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
				?></td>
			<td><?php echo $item->sujet; ?></td>
			<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom); ?></td>
			<td><?php echo Html::anchor('admin/contact/view/'.$item->responsable_tech, $item->responsable_tech_np); ?></td>
			<td><?php echo Html::anchor('admin/contact/view/'.$item->responsable_adm, $item->responsable_adm_np); ?></td>
			<td><?php echo $item->origine_offre; ?></td>
			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->langue; ?></td>
			<td><?php echo $item->duree; ?></td>
			<td><?php
				if ($item->etat == 0) {
					echo '<span class="label label-info">Saisie</span>';
				}
				else if ($item->etat == 1) {
					echo '<span class="label label-warning">Incomplète</span>';
				}
				else if ($item->etat == 2) {
					echo '<span class="label label-success">Imprimée</span>';
				}
			?></td>
			<td style="width:220px;text-align:center;">
				<?php echo Html::anchor('admin/convention/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Editer'); ?>
				<form method="POST">
				<div class="btn-group">
					<button type="submit" name="incomplete" class="btn btn-warning" value=<?php echo "\"" . $item->id . "\""; ?> >Incomplète</button>
					<button type="submit" name="imprime" class="btn btn-success" value=<?php echo "\"" . $item->id . "\""; ?> >Imprimée</button>
				    </div>
				</form>
				<!--<?php echo Html::anchor('admin/convention/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes-vous sur ?')")); ?>-->

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>Aucune convention.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/convention/create', 'Ajouter une convention', array('class' => 'btn btn-success')); ?>

</p>
