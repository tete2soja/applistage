<h2>Liste des propositions</h2>
<br>
<?php if ($stages): ?>
<div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Date</th>
			<th>Entreprise</th>
			<th>Sujet</th>
			<th>Ville</th>
			<th>Pays</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stages as $stage):?>
<?php	//if($stage->valide==1) { ?>
		<tr>
			<td><?php echo $stage->date; ?></td>
			<td><?php echo $stage->entreprise; ?></td>
			<td><?php echo $stage->sujet; ?></td>
			<td><?php echo $stage->ent_ville; ?></td>
			<td><?php echo $stage->ent_pays; ?></td>
			<td>
				<?php echo Html::anchor('./etudiant/proposition/'.$stage->id, 'Voir'); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
</div>

<?php else: ?>
<p>Pas de stage proposé.</p>

<?php endif; ?><p>
	<div class="row">
			<div class="col-md-12">
				<a href="../entreprise/formulaire" type="button" class="btn btn-default btn-info" style="padding-top:15px;font-size:15px;width:auto;">
					<p>Ajouter une proposition</p>
				</a>
			</div>
		</div>

</p>