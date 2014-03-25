<h2>Liste des contacts</h2>
<br>
<?php if ($contacts): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Téléphone</th>
			<th>Email</th>
			<th>Ville</th>
			<th>Code Postal</th>
			<th>Pays</th>
			<th>Entreprise</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($contacts as $item): ?>		<tr>

			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->prenom; ?></td>
			<td><?php echo $item->telephone; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->ville; ?></td>
			<td><?php echo $item->code_postal; ?></td>
			<td><?php echo $item->pays; ?></td>
			<td><?php echo '<a href="../entreprise/view/' . $item->entreprise . '" />' . $item->ent_nom;?></td>
			<td>
				<?php
					$status = "";
					if ($item->encadre == 1) {
						$status = $status . "Encadre ";
					}
					if ($item->signe == 1) {
						$status = $status . "Signe ";
					}
					if ($item->propose == 1) {
						$status = $status . "Propose";
					}
					echo $status;
				?>
			</td>
			<td>
				<?php echo Html::anchor('admin/contact/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/contact/edit/'.$item->id, 'Editer'); ?> |
				<?php echo Html::anchor('admin/contact/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes-vous sur ?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>Aucun contact.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/contact/create', 'Ajouter un contact', array('class' => 'btn btn-success')); ?>

</p>
