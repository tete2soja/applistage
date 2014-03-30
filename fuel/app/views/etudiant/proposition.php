<h2>Liste des propositions</h2>
<br />
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
					<th>Public</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$group=false;
				//On vérifie que l'étudiant est en DUT
				if ($groupe==2)
					{
						$public=2;
					}
				//On vérifie que l'étudiant est en LP
				elseif ($groupe==1)
					{
						$public=1;
					}
				//Si admin connecté, on affiche tous les stages
				else $public=3;
				foreach ($stages as $stage):
					//On affiche les stages validés et destinés au groupe de l'étudiant connecté
					if(($stage->etat==1)) {
						if($stage->public!=$public) {?>
							<tr>
								<td><?php $date = new DateTime($stage->date); echo $date->format('d/m/Y'); ?></td>
								<td><?php echo $stage->ent_nom; ?></td>
								<td><?php echo $stage->sujet; ?></td>
								<td><?php echo $stage->ent_ville.' ('.$stage->ent_code.')'; ?></td>
								<td><?php echo $stage->ent_pays; ?></td>
								<td><?php
									if ($stage->public == 0) {
										echo "Tout public";
									}
									else if ($stage->public == 1) {
										echo "DUT Info";
									}
									else
										echo "Licence Pro";
								?></td>
								<td>
									<?php echo Html::anchor('./etudiant/details/'.$stage->id, 'Voir'); ?>
								</td>
							</tr>
						<?php }
					}
				endforeach;?>
			</tbody>
		</table>
	</div>

<?php else: ?>
<p>Pas de stage proposé.</p>

<?php endif; ?>