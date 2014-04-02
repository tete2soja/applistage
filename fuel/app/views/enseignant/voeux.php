<h1>Mes voeux</h1>
<hr/>
<p>Vous pouvez ici choisir trois stages qui constituront alors vos voeux.</p>
<hr/>
<?php if ($stages): ?>
<table class="table table-bordered">
					<thead>
						<tr>
							<th>Date</th>
							<th>Etudiant</th>
							<th>Enseignant</th>
							<th>Entreprise</th>
							<th>Sujet</th>
							<th>Ville</th>
							<th>Pays</th>
							<th>Public</th>
							<th>Statut</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stages as $item): ?>
							<tr>
								<td><?php $date = new DateTime($item->date); echo $date->format('d/m/Y'); ?></td>
								<td>
									<?php if(empty($item->etudiant))
										echo 'aucun';
									else
										echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
									?>
								</td>
								<td>
									<?php if(empty($item->enseignant))
											echo 'aucun';
										else
											echo Html::anchor('admin/enseignant/view/'.$item->enseignant, $item->enseignant_nom);
									?>
								</td>
								<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom);?></td>
								<td><?php echo $item->sujet; ?></td>
								<td><?php echo $item->ent_ville.' ('.$item->ent_code.')'; ?></td>
								<td><?php echo $item->ent_pays; ?></td>
								<td><?php
									if ($item->public == 0) {
										echo "Tout public";
									}
									else if ($item->public == 1) {
										echo "DUT Info";
									}
									else
										echo "Licence Pro";
								?></td>
								<td><?php
									if (($voeux_1 == $item->id)||($voeux_2 == $item->id)||($voeux_3 == $item->id)) {
										echo '<span class="label label-info">Voeu déjà pris</span>';
									}
								?></td>
								<td style="width:170px;text-align:center;">
									<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?>
									<form method="POST">
									<div class="btn-group">
										<button type="submit" name="postuler" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Postuler</button>
										<button type="submit" name="supprimer" class="btn btn-danger btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Supprimer</button>
									    </div>
									</form>
													
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

<?php else: ?>
<p>Aucun voeux possibles.</p>

<?php endif; ?><p>