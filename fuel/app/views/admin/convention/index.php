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

<h2>Liste des conventions</h2>
<br />
<?php if ($conventions): ?>
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTabs">
		  <li class="active">
		    <a href="#tabs-1">Toutes</a>
		  </li>
		  <li><a href="#tabs-2">Saisies</a></li>
		  <li><a href="#tabs-3">Complètes</a></li>
		  <li><a href="#tabs-4">Incomplètes</a></li>
		  <li><a href="#tabs-5">Imprimées</a></li>
		</ul>
		<br />
		<div class="tab-content">
			<div class="tab-pane active" id="tabs-1">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Etudiant</th>
							<th>Enseignant</th>
							<th>Sujet</th>
							<th>Entreprise</th>
							<th>Etat</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($conventions as $item): ?>
							<tr>
								<td><?php if(empty($item->etudiant))
										echo 'aucun';
									else
										echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
									?></td>
								<td><?php if(empty($item->enseignant))
										echo 'aucun';
									else
										echo Html::anchor('admin/enseignant/view/'.$item->enseignant, $item->enseignant_np);
									?></td>
								<td><?php echo $item->sujet; ?></td>
								<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom); ?></td>
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
									else if ($item->etat == 3) {
										echo '<span class="label label-primary">Complète</span>';
									}
								?></td>
								<td style="text-align:center;">
									<?php echo Html::anchor('admin/convention/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Editer'); ?>
									<form method="POST">
										<div class="btn-group">
											<button type="submit" name="complete" class="btn btn-primary btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Complète</button>
											<button type="submit" name="incomplete" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Incomplète</button>
									    </div>
									    <button type="submit" name="imprime" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Imprimer</button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="tabs-2">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Etudiant</th>
							<th>Enseignant</th>
							<th>Sujet</th>
							<th>Entreprise</th>
							<th>Etat</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($conventions as $item): ?>
						<?php if ($item->etat == 0) { ?>
							<tr>
								<td><?php if(empty($item->etudiant))
										echo 'aucun';
									else
										echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
									?></td>
								<td><?php if(empty($item->enseignant))
										echo 'aucun';
									else
										echo Html::anchor('admin/enseignant/view/'.$item->enseignant, $item->enseignant_np);
									?></td>
								<td><?php echo $item->sujet; ?></td>
								<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom); ?></td>
								<td><?php echo Html::anchor('admin/contact/view/'.$item->responsable_tech, $item->responsable_tech_np); ?></td>
								<td><?php echo Html::anchor('admin/contact/view/'.$item->responsable_adm, $item->responsable_adm_np); ?></td>
								<td><?php echo $item->origine_offre; ?></td>
								<td><?php echo $item->type; ?></td>
								<td><?php echo $item->langue; ?></td>
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
									else if ($item->etat == 3) {
										echo '<span class="label label-primary">Complète</span>';
									}
								?></td>
								<td style="text-align:center;">
									<?php echo Html::anchor('admin/convention/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Editer'); ?>
									<form method="POST">
										<div class="btn-group">
											<button type="submit" name="complete" class="btn btn-primary btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Complète</button>
											<button type="submit" name="incomplete" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Incomplète</button>
									    </div>
									    <button type="submit" name="imprime" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Imprimer</button>
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
							<th>Etudiant</th>
							<th>Enseignant</th>
							<th>Sujet</th>
							<th>Entreprise</th>
							<th>Etat</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($conventions as $item): ?>
						<?php if ($item->etat == 3) { ?>
							<tr>
								<td><?php if(empty($item->etudiant))
										echo 'aucun';
									else
										echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
									?></td>
								<td><?php if(empty($item->enseignant))
										echo 'aucun';
									else
										echo Html::anchor('admin/enseignant/view/'.$item->enseignant, $item->enseignant_np);
									?></td>
								<td><?php echo $item->sujet; ?></td>
								<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom); ?></td>
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
									else if ($item->etat == 3) {
										echo '<span class="label label-primary">Complète</span>';
									}
								?></td>
								<td style="text-align:center;">
									<?php echo Html::anchor('admin/convention/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Editer'); ?>
									<form method="POST">
										<div class="btn-group">
											<button type="submit" name="complete" class="btn btn-primary btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Complète</button>
											<button type="submit" name="incomplete" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Incomplète</button>
									    </div>
									    <button type="submit" name="imprime" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Imprimer</button>
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
							<th>Etudiant</th>
							<th>Enseignant</th>
							<th>Sujet</th>
							<th>Entreprise</th>
							<th>Etat</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($conventions as $item): ?>
						<?php if ($item->etat == 1) { ?>
							<tr>
								<td><?php if(empty($item->etudiant))
										echo 'aucun';
									else
										echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
									?></td>
								<td><?php if(empty($item->enseignant))
										echo 'aucun';
									else
										echo Html::anchor('admin/enseignant/view/'.$item->enseignant, $item->enseignant_np);
									?></td>
								<td><?php echo $item->sujet; ?></td>
								<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom); ?></td>
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
									else if ($item->etat == 3) {
										echo '<span class="label label-primary">Complète</span>';
									}
								?></td>
								<td style="text-align:center;">
									<?php echo Html::anchor('admin/convention/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Editer'); ?>
									<form method="POST">
										<div class="btn-group">
											<button type="submit" name="complete" class="btn btn-primary btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Complète</button>
											<button type="submit" name="incomplete" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Incomplète</button>
									    </div>
									    <button type="submit" name="imprime" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Imprimer</button>
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
							<th>Etudiant</th>
							<th>Enseignant</th>
							<th>Sujet</th>
							<th>Entreprise</th>
							<th>Etat</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($conventions as $item): ?>
						<?php if ($item->etat == 2) { ?>
							<tr>
								<td><?php if(empty($item->etudiant))
										echo 'aucun';
									else
										echo Html::anchor('admin/etudiant/view/'.$item->etudiant, $item->no_etudiant);
									?></td>
								<td><?php if(empty($item->enseignant))
										echo 'aucun';
									else
										echo Html::anchor('admin/enseignant/view/'.$item->enseignant, $item->enseignant_np);
									?></td>
								<td><?php echo $item->sujet; ?></td>
								<td><?php echo Html::anchor('admin/entreprise/view/'.$item->entreprise, $item->ent_nom); ?></td>
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
									else if ($item->etat == 3) {
										echo '<span class="label label-primary">Complète</span>';
									}
								?></td>
								<td style="text-align:center;">
									<?php echo Html::anchor('admin/convention/view/'.$item->id, 'Voir'); ?> |
									<?php echo Html::anchor('admin/convention/edit/'.$item->id, 'Editer'); ?>
									<form method="POST">
										<div class="btn-group">
											<button type="submit" name="complete" class="btn btn-primary btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Complète</button>
											<button type="submit" name="incomplete" class="btn btn-warning btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Incomplète</button>
									    </div>
									    <button type="submit" name="imprime" class="btn btn-success btn-xs" value=<?php echo "\"" . $item->id . "\""; ?> >Imprimer</button>
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
	<p>Aucune convention.</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('admin/convention/create', 'Ajouter une convention', array('class' => 'btn btn-success')); ?>
</p>
