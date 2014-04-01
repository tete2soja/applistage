<h2>Liste des Enseignants</h2>
<br>
<?php if ($enseignants): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Email</th>
			<th>Voeu 1</th>
			<th>Voeu 2</th>
			<th>Voeu 3</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($enseignants as $item): ?>		<tr>

			<td><?php echo $item->nom; ?></td>
			<td><?php echo $item->prenom; ?></td>
			<td><?php echo $item->email; ?></td>
			<td>
				<?php
					if(isset($item->voeux_1))
						echo '<a href="stage/view/' . $item->voeux_1 . '"><span class="label label-success">Pris</span></a>';
					else
						echo '<span class="label label-warning">Aucun</span>';
				?>
			</td>
			<td>
				<?php
					if(isset($item->voeux_2))
						echo '<a href="stage/view/' . $item->voeux_2 . '"><span class="label label-success">Pris</span></a>';
					else
						echo '<span class="label label-warning">Aucun</span>';
				?>
			</td>
			<td>
				<?php
					if(isset($item->voeux_2))
						echo '<a href="stage/view/' . $item->voeux_2 . '"><span class="label label-success">Pris</span></a>';
					else
						echo '<span class="label label-warning">Aucun</span>';
				?>
			</td>
			<td>
				<?php echo Html::anchor('admin/enseignant/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/enseignant/edit/'.$item->id, 'Editer'); ?> |
				<?php echo Html::anchor('admin/enseignant/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes-vous sur ?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>Aucun Enseignant.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/enseignant/create', 'Ajouter un enseignant', array('class' => 'btn btn-success')); ?>
</p>