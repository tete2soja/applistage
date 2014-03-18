			<div class="row">
				<div class="col-md-6 bs-callout bs-callout-info" style="height: 250px;">
					<h2>Importations</h2>
					<hr/>
					<p>Sélection le fichier CSV à importer</p>
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