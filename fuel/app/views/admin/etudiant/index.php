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
	echo Html::anchor('/admin/etudiant/', 'Tous', array('class' => 'btn btn-primary'));
	echo '</div>';
	echo '<div class="btn-group">';
	echo Html::anchor('/admin/etudiant/index/annee1', '1ère année DUT', array('class' => 'btn btn-primary'));
	echo Html::anchor('/admin/etudiant/index/annee2', '2ème année DUT', array('class' => 'btn btn-primary'));
	echo Html::anchor('/admin/etudiant/index/lp', 'LP S2Ima', array('class' => 'btn btn-primary'));
	echo '</div>';
	echo '</div>';
	if ($promo==1) {
		echo "<h2>Liste des étudiants en 1ère année DUT Info</h2>";
	}
	elseif ($promo==2) {
		echo "<h2>Liste des étudiants en 2ème année DUT Info</h2>";
	}
	elseif ($promo==3) {
		echo "<h2>Liste des étudiants en LP S2IMa</h2>";
	}
	else {
		echo "<h2>Liste de tous les étudiants</h2>";
	}
?>

<br />
<?php if ($etudiants): ?>
	<div class="container-fluid">
		<ul class="nav nav-tabs" id="myTabs">
		  <li class="active">
		    <a href="#tabs-1">Tous</a>
		  </li>
		  <li><a href="#tabs-2">Avec stage</a></li>
		  <li><a href="#tabs-3">Sans stage</a></li>
		</ul>
		<br />
		<div class="tab-content">
			<div class="tab-pane active" id="tabs-1">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No étudiant</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Date de naissance</th>
							<th>Iut année/filière</th>
							<th>Stage</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($etudiants as $item): ?>
								<tr>
									<td><?php echo $item->no_etudiant; ?></td>
									<td><?php echo $item->nom; ?></td>
									<td><?php echo $item->prenom; ?></td>
									<td><?php echo $item->datenaissance; ?></td>
									<td>
									<?php if($item->iut_annee==1) {
											echo '<span class="label label-default">1ère année</span>';
											} elseif($item->iut_annee==2) {
												echo '<span class="label label-info">2ème année</span>'; 
											} else {
												echo '<span class="label label-warning">LP S2Ima</span>';
										} ?>
									</td>
									<td>
									<?php if(!empty($item->stage)) {
											if ($item->stage_etat<=1) {
												echo '<span class="label label-danger">Aucun</span>';
											} else {
												echo '<span class="label label-success">' . Html::anchor('admin/convention/view/'.$item->stage, 'Trouvé', array('style' => 'color:#FFF')) . '</span>';
											}
										} else echo '<span class="label label-danger">Aucun</span>';?>
									</td>
									<td>
										<?php echo Html::anchor('admin/etudiant/view/'.$item->id, 'Voir'); ?> |
										<?php echo Html::anchor('admin/etudiant/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Etes-vous sur ?')")); ?>
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
							<th>No étudiant</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Date de naissance</th>
							<th>Iut année/filière</th>
							<th>Stage</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($etudiants as $item): 
							if(!empty($item->stage)) {
								if (!empty($item->stage_etat) AND ($item->stage_etat>=2)) {?>
									<tr>
										<td><?php echo $item->no_etudiant; ?></td>
										<td><?php echo $item->nom; ?></td>
										<td><?php echo $item->prenom; ?></td>
										<td><?php echo $item->datenaissance; ?></td>
										<td>
										<?php if($item->iut_annee==1) {
												echo '<span class="label label-default">1ère année</span>';
											} elseif($item->iut_annee==2) {
												echo '<span class="label label-info">2ème année</span>'; 
											} else {
												echo '<span class="label label-warning">LP S2Ima</span>';
											} ?>
										</td>
										<td>
										<?php if(!empty($item->stage)) {
												if ($item->stage_etat<=1) {
													echo '<span class="label label-danger">Aucun</span>';
												} else {
													echo '<span class="label label-success">' . Html::anchor('admin/convention/view/'.$item->stage, 'Trouvé', array('style' => 'color:#FFF')) . '</span>';
												}
											} else echo '<span class="label label-danger">Aucun</span>';?>
										</td>
										<td>
											<?php echo Html::anchor('admin/etudiant/view/'.$item->id, 'Voir'); ?> |
											<?php echo Html::anchor('admin/etudiant/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Etes-vous sur ?')")); ?>
										</td>
									</tr>
								<?php }
						} endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="tabs-3">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No étudiant</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Date de naissance</th>
							<th>Iut année/filière</th>
							<th>Stage</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($etudiants as $item):
								if ((empty($item->stage)) OR (!empty($item->stage_etat) AND ($item->stage_etat<=1))) {?>
									<tr>
										<td><?php echo $item->no_etudiant; ?></td>
										<td><?php echo $item->nom; ?></td>
										<td><?php echo $item->prenom; ?></td>
										<td><?php echo $item->datenaissance; ?></td>
										<td>
										<?php if($item->iut_annee==1) {
												echo '<span class="label label-default">1ère année</span>';
											} elseif($item->iut_annee==2) {
												echo '<span class="label label-info">2ème année</span>'; 
											} else {
												echo '<span class="label label-warning">LP S2Ima</span>';
											} ?>
										</td>
										<td>
										<?php if(!empty($item->stage)) {
												if ($item->stage_etat<=1) {
													echo '<span class="label label-danger">Aucun</span>';
												} else {
													echo '<span class="label label-success">' . Html::anchor('admin/convention/view/'.$item->stage, 'Trouvé', array('style' => 'color:#FFF')) . '</span>';
												}
											} else echo '<span class="label label-danger">Aucun</span>';?>
										</td>
										<td>
											<?php echo Html::anchor('admin/etudiant/view/'.$item->id, 'Voir'); ?> |
											<?php echo Html::anchor('admin/etudiant/delete/'.$item->id, 'Supprimer', array('onclick' => "return confirm('Etes-vous sur ?')")); ?>
										</td>
									</tr>
							<?php } endforeach; ?>
					</tbody>
				</table>
			</div>
<?php else: ?>
<p>Aucun Etudiant.</p>

<?php endif; ?><p>