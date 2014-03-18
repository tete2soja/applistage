<style type="text/css">
	.row {
		margin-right: 0px;
		margin-left: 0px;
	}
</style>
<div class="row">
				<div class="col-md-6 bs-callout bs-callout-info" style="height: 250px;">
					<h2>Importation des étudiants</h2>
					<hr/>
					<p>Sélection du fichier CSV à importer</p>
					<form enctype='multipart/form-data' action="" method="POST">
						<input size='50' type='file' name='filename' /><br />
						<button type="submit" name="submit" value="submit" class="btn btn-default btn-danger" style="padding-top:8px;font-size:15px;width:auto;">Envoyer</button>
					</form>
				</div>
			<div class="row">
				<div class="col-md-6 bs-callout bs-callout-info" style="height: 250px;">
					<h2>Exportations</h2>
					<hr/>
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
<div class="bs-callout bs-callout-warning">
	<h2>Gestion des promotions</h2>
	<div class="row">
		<div class="col-md-6">
			<a href="gestion" type="button" class="btn btn-danger">Deuxième année DUT info</a>
			<p>Vous permez de gérer les étudiants en deuxième année d'IUT concernant l'année <?php echo date("Y")-1; ?></p>
		</div>
		<div class="col-md-6">
			<a href="passage" type="button" class="btn btn-danger">Passage en DUT info 2</a>
			<p>Vous permez de gérer les étudiants en première année pour leur passage en deuxième année concernant l'année <?php echo date("Y")-1; ?></p>
		</div>
	</div>
</div>
<div class="bs-callout bs-callout-danger">
	<h2>Avancé</h2>
	<div class="row">
		<div class="col-md-6">
			<button type="button" class="btn btn-danger">Archivage</button>
			<p>Cela entrainera la sauvegarde des espaces de rendus (suivi de stage) et de toutes les conventions de stages dans une archive ZIP.</p>
		</div>
		<div class="col-md-6">
			<button type="button" class="btn btn-danger">Remise à zéro</button>
			<p>
				Cela entrainera la suppression des données des propositions de stages et les documents qui y sont associés (PDF), des conventions de stages, du suivi des enseignants et de l'espace de rendu.<br />
				La fiche personnelle de stage sera mise à jour avec les nouvelles données de l'année à venir (date de début et de fin et rénumération).
				Enfin, cela entrainera également le lancement de la fonction pour la gestion des promotions.
			</p>
		</div>
	</div>
</div>