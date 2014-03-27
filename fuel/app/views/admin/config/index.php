<h2>Modifier la configuration</h2>
<hr>
<p>
	Vous pourrez ici modifier les informations concernant la structure du fichier CSV contenant la liste des étudiants afin de faire correspondre l'ordre des colonnes lors de l'importation dans la base
	de données.<br />
	Vous pouvez également modifier les informations concernant les conventions.
</p>
<?php if ($configs): ?>
<h3>Partie import des étudiants</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Colonne 1</th>
			<th>Colonne 2</th>
			<th>Colonne 3</th>
			<th>Colonne 4</th>
			<th>Colonne 5</th>
			<th>Colonne 6</th>
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
		</tr>
<?php endforeach; ?>	</tbody>
</table>
</table>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Colonne 7</th>
			<th>Colonne 8</th>
			<th>Colonne 9</th>
			<th>Colonne 10</th>
			<th>Colonne 11</th>
			<th>Colonne 12</th>
		</tr>
	</thead>
		<tbody>
<?php foreach ($configs as $item): ?>		<tr>

			<td><?php echo $item->colonne_7; ?></td>
			<td><?php echo $item->colonne_8; ?></td>
			<td><?php echo $item->colonne_9; ?></td>
			<td><?php echo $item->colonne_10; ?></td>
			<td><?php echo $item->colonne_11; ?></td>
			<td><?php echo $item->colonne_12; ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Colonne 13</th>
			<th>Colonne 14</th>
			<th>Colonne 15</th>
			<th>Colonne 16</th>
			<th>Colonne 17</th>
			<th>Colonne 18</th>
		</tr>
	</thead>
		<tbody>
<?php foreach ($configs as $item): ?>		<tr>

			<td><?php echo $item->colonne_13; ?></td>
			<td><?php echo $item->colonne_14; ?></td>
			<td><?php echo $item->colonne_15; ?></td>
			<td><?php echo $item->colonne_16; ?></td>
			<td><?php echo $item->colonne_17; ?></td>
			<td><?php echo $item->colonne_18; ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Colonne 20</th>
			<th>Colonne 21</th>
			<th>Colonne 22</th>
			<th>Colonne 23</th>
			<th>Colonne 24</th>
		</tr>
	</thead>
		<tbody>
<?php foreach ($configs as $item): ?>		<tr>

			<td><?php echo $item->colonne_20; ?></td>
			<td><?php echo $item->colonne_21; ?></td>
			<td><?php echo $item->colonne_22; ?></td>
			<td><?php echo $item->colonne_23; ?></td>
			<td><?php echo $item->colonne_24; ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<hr>
<h3>Partie convention</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Date debut</th>
			<th>Date fin</th>
			<th>Année du stage</th>
			<th>Remuneration</th>
		</tr>
	</thead>
		<tbody>
<?php foreach ($configs as $item): ?>		<tr>

			<td><?php echo $item->date_debut; ?></td>
			<td><?php echo $item->date_fin; ?></td>
			<td><?php echo $item->annee_courante; ?></td>
			<td><?php echo $item->remuneration; ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<?php echo Html::anchor('admin/config/edit/'.$item->id, 'Modifier', array('class' => 'btn btn-primary', 'style' => 'margin-left: 50%;')); ?>

<?php else: ?>
<p>No Configs.</p>

<?php endif; ?><p>

</p>
