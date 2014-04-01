<?php session_start(); ?>
<style type="text/css">
	.row {
		margin-right: 0px;
		margin-left: 0px;
	}
</style>
<div class="bs-callout bs-callout-warning">
	<h2>Modification de la configuration</h2>
	<p>Avant de continuer à utiliser Applistage ou d'importer les données des étudiants, vous devez éditer la configuration. Vous devrez faire cela pour chaque nouvelle année : les dates et la 
	rémunération minimale au minimum.</p>
	<div class="row">
		<div class="col-md-12">
			<?php echo Html::anchor('admin/config', 'Modifer la table `config`', array('type' => 'button', 'class' => 'btn btn-danger')); ?>
			<?php echo Html::anchor('admin/enseignant', 'Modifer la table `enseignants`', array('type' => 'button', 'class' => 'btn btn-danger')); ?>
			<?php echo Html::anchor('admin/users', 'Modifer la table `users`', array('type' => 'button', 'class' => 'btn btn-danger')); ?>
		</div>
	</div>
</div>
<div class="row" style="margin-top: -20px;margin-bottom: -20px;">
	<div class="col-md-6 bs-callout bs-callout-info" style="height: 350px;width: 49%;">
		<h2>Importation des étudiants</h2>
		<p>Sélectionnez d'abord le fichier CSV contenant les étudiants de premières années. Vous l'obtiendrez en l'exportant du fichier Excel fourmit chaque année par la
		scolarité.<br />
		Vous devrez avant de faire ceci, modifier la table `config` afin de rentrer dans l'ordre, les noms des colonnes du fichier CSV.<br />
		Vous aurez ensuite, un aperçu des données avant de valider l'insertion du fichier dans la base de données.</p>
		<form enctype='multipart/form-data' action="" method="POST">
			<input size='50' type='file' name='filename' /><br />
			<button type="submit" name="submit" value="submit" class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Envoyer</button>
		</form>
	</div>
	<div class="row">
		<div class="col-md-6 bs-callout bs-callout-info" style="height: 350px;width: 49%;float: right;">
			<h2>Exportations</h2>
			<p>Pour chacun des exports, l'application récupérera l'ensemble des données de la table séléectionnée (le nom des collones compris).<br />
			Il vous sera ensuite proposer de le télécharger via	une fenêtre de dialogue qui apparaitra alors.</p>
			<div class="col-md-4">
				<form enctype='multipart/form-data' action="" method="POST">
					<button type="etudiant" name="etudiant" value="etudiant" class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Etudiants</button>
				</form>
			</div>
			<div class="col-md-4">
				<form enctype='multipart/form-data' action="" method="POST">
					<button type="entreprise" name="entreprise" value="entreprise" class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Entreprises</button>
				</form>
			</div>
			<div class="col-md-4">
				<form enctype='multipart/form-data' action="" method="POST">
					<button type="contact" name="contact" value="contact" class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Contacts</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-warning">
	<h2>Gestion des promotions</h2>
	<div class="row">
		<div class="col-md-6">
			<p>Vous permez de gérer les étudiants en deuxième année d'IUT concernant l'année <?php echo date("Y")-1; ?></p>
			<?php echo Html::anchor('admin/gestion', 'Deuxième année DUT info', array('type' => 'button', 'class' => 'btn btn-danger')); ?>
		</div>
		<div class="col-md-6">
			<p>Vous permez de gérer les étudiants en première année pour leur passage en deuxième année concernant l'année <?php echo date("Y")-1; ?></p>
			<?php echo Html::anchor('admin/passage', 'Passage en DUT info 2', array('type' => 'button', 'class' => 'btn btn-danger')); ?>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-danger">
	<h2>Avancé</h2>
	<div class="row">
		<div class="col-md-6">
			<p>Cela entrainera la sauvegarde des espaces de rendus (suivi de stage) et de toutes les conventions de stages dans une archive ZIP.</p>
			<form action="" method="POST">
				<button type="submit" name="archivage" value="archivage" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir archiver ?')">Archivage</button>
			</form>
		</div>
		<div class="col-md-6">
			<p>
				Cela entrainera la suppression des données des propositions de stages et les documents qui y sont associés (PDF), des conventions de stages, du suivi des enseignants et de l'espace de rendu.<br />
				La fiche personnelle de stage sera mise à jour avec les nouvelles données de l'année à venir (date de début et de fin et rénumération).
				Enfin, cela entrainera également le lancement de la fonction pour la gestion des promotions.
			</p>
			<form action="" method="POST">
				<button type="submit" name="raz" value="raz" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir remettre applistage à zéro ?')">Remise à zéro</button>
		</div>
	</div>
</div>