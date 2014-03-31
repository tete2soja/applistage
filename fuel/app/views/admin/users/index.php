<?php
	echo '<div class="btn-toolbar">';
	echo '<div class="btn-group">';
	echo Html::anchor('/admin/users/', 'Tous', array('class' => 'btn btn-primary'));
	echo '</div>';
	echo '<div class="btn-group">';
	echo Html::anchor('/admin/users/index/admin', 'Admin', array('class' => 'btn btn-primary'));
	echo Html::anchor('/admin/users/index/enseignant', 'Enseignant', array('class' => 'btn btn-primary'));
	echo Html::anchor('/admin/users/index/dut', 'DUT', array('class' => 'btn btn-primary'));
	echo Html::anchor('/admin/users/index/lp', 'LP', array('class' => 'btn btn-primary'));
	echo '</div>';
	echo '</div>';
	if ($promo==10) {
		echo "<h2>Liste des administrateurs</h2>";
	}
	elseif ($promo==2) {
		echo "<h2>Liste des étudiants en DUT Info</h2>";
	}
	elseif ($promo==1) {
		echo "<h2>Liste des étudiants en LP S2IMa</h2>";
	}
	elseif ($promo==3) {
		echo "<h2>Liste des enseignants</h2>";
	}
	else {
		echo "<h2>Liste de tous les utilisateurs</h2>";
	}
?>
<br>

<?php if ($users): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Group</th>
			<th>Last login</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>

			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php
				if($item->group==1)
					echo '<span class="label label-default">LP</span>';
				elseif($item->group==2)
					echo '<span class="label label-info">DUT</span>'; 
				elseif($item->group==3)
					echo '<span class="label label-warning">Enseignant</span>';
				else
					echo '<span class="label label-danger">Admin</span>';
			?></td>
			<td><?php echo $item->last_login; ?></td>
			<td>
				<?php echo Html::anchor('admin/users/view/'.$item->id, 'Voir'); ?> |
				<?php echo Html::anchor('admin/users/edit/'.$item->id, 'Editer'); ?> |
				<?php echo Html::anchor('admin/users/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes-vous sûr ?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/users/create', 'Ajouter un utilisateur', array('class' => 'btn btn-success')); ?>

</p>
