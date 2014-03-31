<script>
  $(function() {
    $('#myTabs a').click(function (e) {
		e.preventDefault();
		var pane = $(this);
		pane.tab('show');
	});

	// load first tab content
	$('.active a').tab('show');
  });
</script>
<?php
	echo '<div class="btn-toolbar">';
	echo '<div class="btn-group">';
	echo Html::anchor('/admin/stage/', 'Tous', array('class' => 'btn btn-primary'));
	echo '</div>';
	echo '<div class="btn-group">';
	echo Html::anchor('/admin/stage/index/dut', 'DUT Info', array('class' => 'btn btn-primary'));
	echo Html::anchor('/admin/etudiant/index/lp', 'LP S2Ima', array('class' => 'btn btn-primary'));
	echo '</div>';
	echo '</div>';
	if ($promo==1) {
		echo "<h2>Liste des stages proposés aux DUT Info</h2>";
		$lp=1;
		$dut=1;
	}
	elseif ($promo==2) {
		echo "<h2>Liste des stages proposés aux LP S2IMa</h2>";
		$lp=2;
		$dut=2;
	}
	else {
		echo "<h2>Liste de tous les stages proposés</h2>";
		$lp=2;
		$dut=1;
	}
?>

<br />
<?php if ($stages): ?>
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTabs">
		  <li class="active">
		    <a href="#tabs-1">Tous</a>
		  </li>
		  <li><a href="#tabs-2">Saisis</a></li>
		  <li><a href="#tabs-3">Validés</a></li>
		  <li><a href="#tabs-4">Refusés</a></li>
		  <li><a href="#tabs-5">Clos</a></li>
		</ul>
		<br />
		<div class="tab-content">
			<div class="tab-pane active" id="tabs-1">
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
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stages as $item):
								if(($item->public==0) OR ($item->public==$dut) OR ($item->public==$lp)) {  ?>
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
									if ($item->etat == 0) {
										echo '<span class="label label-info">Saisi</span>';
									}
									else if ($item->etat == 1) {
										echo '<span class="label label-success">Validé</span>';
									}
									else if ($item->etat == 2) {
										echo '<span class="label label-warning">Refusé</span>';
									}
									else if ($item->etat == 3) {
										echo '<span class="label label-danger">Clos</span>';
									}
								?></td>
								<td style="width:170px;text-align:center;">
									<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Editer'); ?> |
									<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes vous sûr ?')")); ?>
									<form method="POST">
									<div class="btn-group">
										<button type="submit" name="valide" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Valider</button>
										<button type="submit" name="refus" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Refuser</button>
										<button type="submit" name="clos" class="btn btn-danger btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Clore</button>
									    </div>
									</form>
													
								</td>
							</tr>
						<?php } endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="tabs-2">
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
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stages as $item): ?>
						<?php if(($item->public==0) OR ($item->public==$dut) OR ($item->public==$lp) AND ($item->etat == 0)) { ?>
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
									if ($item->etat == 0) {
										echo '<span class="label">Saisi</span>';
									}
									else if ($item->etat == 1) {
										echo '<span class="label label-success">Validé</span>';
									}
									else if ($item->etat == 2) {
										echo '<span class="label label-warning">Refusé</span>';
									}
									else if ($item->etat == 3) {
										echo '<span class="label label-danger">Clos</span>';
									}
								?></td>
								<td style="width:170px;text-align:center;">
									<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Editer'); ?> |
									<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes vous sûr ?')")); ?>
									<form method="POST">
									<div class="btn-group">
										<button type="submit" name="valide" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Valider</button>
										<button type="submit" name="refus" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Refuser</button>
										<button type="submit" name="clos" class="btn btn-danger btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Clore</button>
									    </div>
									</form>
													
								</td>
							</tr>
						<?php } ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="tabs-3">
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
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stages as $item): ?>
						<?php if(($item->public==0) OR ($item->public==$dut) OR ($item->public==$lp) AND ($item->etat == 1)) { ?>
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
									if ($item->etat == 0) {
										echo '<span class="label">Saisi</span>';
									}
									else if ($item->etat == 1) {
										echo '<span class="label label-success">Validé</span>';
									}
									else if ($item->etat == 2) {
										echo '<span class="label label-warning">Refusé</span>';
									}
									else if ($item->etat == 3) {
										echo '<span class="label label-danger">Clos</span>';
									}
								?></td>
								<td style="width:170px;text-align:center;">
									<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Editer'); ?> |
									<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes vous sûr ?')")); ?>
									<form method="POST">
									<div class="btn-group">
										<button type="submit" name="valide" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Valider</button>
										<button type="submit" name="refus" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Refuser</button>
										<button type="submit" name="clos" class="btn btn-danger btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Clore</button>
									    </div>
									</form>
													
								</td>
							</tr>
						<?php } ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="tabs-4">
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
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stages as $item): ?>
						<?php if(($item->public==0) OR ($item->public==$dut) OR ($item->public==$lp) AND ($item->etat == 2)) { ?>
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
									if ($item->etat == 0) {
										echo '<span class="label">Saisi</span>';
									}
									else if ($item->etat == 1) {
										echo '<span class="label label-success">Validé</span>';
									}
									else if ($item->etat == 2) {
										echo '<span class="label label-warning">Refusé</span>';
									}
									else if ($item->etat == 3) {
										echo '<span class="label label-danger">Clos</span>';
									}
								?></td>
								<td style="width:170px;text-align:center;">
									<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Editer'); ?> |
									<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes vous sûr ?')")); ?>
									<form method="POST">
									<div class="btn-group">
										<button type="submit" name="valide" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Valider</button>
										<button type="submit" name="refus" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Refuser</button>
										<button type="submit" name="clos" class="btn btn-danger btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Clore</button>
									    </div>
									</form>
													
								</td>
							</tr>
						<?php } ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="tabs-5">
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
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stages as $item): ?>
						<?php if(($item->public==0) OR ($item->public==$dut) OR ($item->public==$lp) AND ($item->etat == 3)) { ?>
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
									if ($item->etat == 0) {
										echo '<span class="label">Saisi</span>';
									}
									else if ($item->etat == 1) {
										echo '<span class="label label-success">Validé</span>';
									}
									else if ($item->etat == 2) {
										echo '<span class="label label-warning">Refusé</span>';
									}
									else if ($item->etat == 3) {
										echo '<span class="label label-danger">Clos</span>';
									}
								?></td>
								<td style="width:170px;text-align:center;">
									<?php echo Html::anchor('admin/stage/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/stage/edit/'.$item->id, 'Editer'); ?> |
									<?php echo Html::anchor('admin/stage/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Êtes vous sûr ?')")); ?>
									<form method="POST">
									<div class="btn-group">
										<button type="submit" name="valide" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Valider</button>
										<button type="submit" name="refus" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Refuser</button>
										<button type="submit" name="clos" class="btn btn-danger btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Clore</button>
									    </div>
									</form>
													
								</td>
							</tr>
						<?php } ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php else: ?>
	<p>Aucun stage.</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('admin/stage/create', 'Ajouter un stage', array('class' => 'btn btn-success')); ?>
</p>