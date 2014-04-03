<?php
	if((isset($stage_saisi)) AND ($stage_saisi!=0)) {
		echo '<p><div class="alert alert-info"><strong>'. $stage_saisi .'</strong> stage(s) saisi(s) en attente de validation</div></p>';
	}
	if((isset($convention_saisi)) AND ($convention_saisi!=0)) {
		echo '<p><div class="alert alert-warning"><strong>'. $convention_saisi .'</strong> convention(s) en attente de validation</div></p>';
	}
?>
<div class="bs-callout bs-callout-warning">
	<h2>Gestion</h2>
	<p>Chaque bouton vous conduira vers la liste en question sous forme de tableau. Vous pourrez alors, pour chaque entrée, afficher plus de détails, l'éditer ou la supprimer.</p>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<?php echo Html::anchor('admin/etudiant', 'Etudiants', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
				<div class="col-md-3">
					<?php echo Html::anchor('admin/enseignant', 'Enseignants', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
				<div class="col-md-3">
					<?php echo Html::anchor('admin/contact', 'Contacts', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
				<div class="col-md-2">
					<?php echo Html::anchor('admin/entreprise', 'Entreprises', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-warning">
	<h2>Gérer les stages proposés</h2>
	<div class="row">
		<div class="col-md-6">
			<p>Vous pouvez vous même saisir une proposition en passant par le formulaire utilisé par les entreprise.</p>
			<?php echo Html::anchor('entreprise/formulaire', 'Saisir', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
		<div class="col-md-6">
			<p>Par filière :</p>
			<?php echo Html::anchor('admin/stage/', 'Tous', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
			<?php echo Html::anchor('admin/stage/index/dut', '2ème année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
			<?php echo Html::anchor('admin/stage/index/lp', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-warning">
	<h2>Gérer les conventions</h2>
	<div class="row">
		<div class="col-md-6">
			<p>Vous trouverez ici les listes des conventions des deux filières avec le status pour chacune d'entre elles.</p>
			<?php echo Html::anchor('admin/convention/', 'Toutes', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
			<?php echo Html::anchor('admin/convention/index/dut', '2ème année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
			<?php echo Html::anchor('admin/convention/index/lp', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
		<div class="col-md-6">
			<p>Une fois les conventions validées et générées, vous pouvez attribuer les tuteurs pour les étudiants en stage.</p>
			<?php echo Html::anchor('admin/#', '2ème année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?> <?php echo Html::anchor('admin/#', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-warning">
	<h2>Suivre les stages</h2>
	<div class="row">
		<div class="col-md-6">
			<p>Suivi des étudiants</p>
			<?php echo Html::anchor('admin/stage/suivi', '2ème année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?> <?php echo Html::anchor('admin/#', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
		<div class="col-md-6">
			<p>Suivi des tuteurs</p>
			<?php echo Html::anchor('admin/#', '2ème année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?> <?php echo Html::anchor('admin/#', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
</div>
<?php echo Html::anchor('admin/import', 'Modifier la configuration', array('type' => 'button', 'class' => 'btn btn-danger', 'style' => 'margin-left:40%;')); ?>