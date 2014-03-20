<h2>Listing Configs</h2>
<br>
<?php if ($configs): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Colonne 1</th>
			<th>Colonne 2</th>
			<th>Colonne 3</th>
			<th>Colonne 4</th>
			<th>Colonne 5</th>
			<th>Colonne 6</th>
			<th>Colonne 8</th>
			<th>Colonne 9</th>
			<th>Colonne 10</th>
			<th>Colonne 11</th>
			<th>Colonne 12</th>
			<th>Colonne 13</th>
			<th>Colonne 14</th>
			<th>Colonne 15</th>
			<th>Colonne 16</th>
			<th>Colonne 17</th>
			<th>Colonne 18</th>
			<th>Colonne 20</th>
			<th>Colonne 21</th>
			<th>Colonne 22</th>
			<th>Colonne 23</th>
			<th>Colonne 24</th>
			<th>Remuneration</th>
			<th>Date debut</th>
			<th>Date fin</th>
			<th>Annee courante</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($configs as $item): ?>		<tr>

			<td><?php echo $item->colonne_1; ?></td>
			<td><?php echo $item->colonne_2; ?></td>
			<td><?php echo $item->colonne_3; ?></td>
			<td><?php echo $item->colonne_4; ?></td>
			<td><?php echo $item->colonne_5; ?></td>
			<td><?php echo $item->colonne_6; ?></td>
			<td><?php echo $item->colonne_8; ?></td>
			<td><?php echo $item->colonne_9; ?></td>
			<td><?php echo $item->colonne_10; ?></td>
			<td><?php echo $item->colonne_11; ?></td>
			<td><?php echo $item->colonne_12; ?></td>
			<td><?php echo $item->colonne_13; ?></td>
			<td><?php echo $item->colonne_14; ?></td>
			<td><?php echo $item->colonne_15; ?></td>
			<td><?php echo $item->colonne_16; ?></td>
			<td><?php echo $item->colonne_17; ?></td>
			<td><?php echo $item->colonne_18; ?></td>
			<td><?php echo $item->colonne_20; ?></td>
			<td><?php echo $item->colonne_21; ?></td>
			<td><?php echo $item->colonne_22; ?></td>
			<td><?php echo $item->colonne_23; ?></td>
			<td><?php echo $item->colonne_24; ?></td>
			<td><?php echo $item->remuneration; ?></td>
			<td><?php echo $item->date_debut; ?></td>
			<td><?php echo $item->date_fin; ?></td>
			<td><?php echo $item->annee_courante; ?></td>
			<td>
				<?php echo Html::anchor('admin/config/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/config/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/config/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Configs.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/config/create', 'Add new Config', array('class' => 'btn btn-success')); ?>

</p>
