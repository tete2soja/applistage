<div class="bs-callout bs-callout-warning">
	<h2>Voir</h2>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<?php echo Html::anchor('admin/stage', 'Propositions affichées', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
				<div class="col-md-6">
					<?php echo Html::anchor('admin/etudiant', 'Etudiants', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<?php echo Html::anchor('admin/enseignant', 'Enseignants', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
				<div class="col-md-6">
					<?php echo Html::anchor('admin/contact', 'Professionnels', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-warning">
	<h2>Gérer les propositions</h2>
	<div class="row">
		<div class="col-md-4">
			<p>Vous pouvez vous même saisir une proposition en passant par le formulaire.</p>
			<?php echo Html::anchor('entreprise/formulaire', 'Saisir', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
		<div class="col-md-4">
			<p>Vous pouvez afficher l'ensemble des propositions actuelles et modifier chacune d'elles.</p>
			<?php echo Html::anchor('admin/stage', 'Modifier et valider', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
		<div class="col-md-4">
			<p>Vous trouverez ici l'ensemble des entreprises présentes dans la base de données.</p>
			<?php echo Html::anchor('admin/entreprise', 'Entreprise, Mailings', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-warning">
	<h2>Gérer les conventions</h2>
	<div class="row">
		<div class="col-md-6">
			<p>Vous permez de gérer les étudiants en deuxième année d'IUT concernant l'année <?php echo date("Y")-1; ?></p>
			<?php echo Html::anchor('admin/convention', 'Deuxième année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?> <?php echo Html::anchor('admin/#', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
		<div class="col-md-6">
			<p>Attribuer les tuteurs</p>
			<?php echo Html::anchor('admin/convention', 'Deuxième année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?> <?php echo Html::anchor('admin//#', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-warning">
	<h2>Suivre les stages</h2>
	<div class="row">
		<div class="col-md-6">
			<p>Suivi des étudiants</p>
			<?php echo Html::anchor('admin/stage/suivi', 'Deuxième année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?> <?php echo Html::anchor('admin/stage/suivi', 'LP S2IMa', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
		<div class="col-md-6">
			<p>Suivi des tuteurs</p>
			<?php echo Html::anchor('admin/convention', 'Deuxième année DUT info', array('type' => 'button', 'class' => 'btn btn-primary')); ?> <?php echo Html::anchor('admin/#', 'Entreprise', array('type' => 'button', 'class' => 'btn btn-primary')); ?>
		</div>
	</div>
</div>
<?php echo Html::anchor('admin/import', 'Modifier la configuration', array('type' => 'button', 'class' => 'btn btn-danger', 'style' => 'margin-left:40%;')); ?>