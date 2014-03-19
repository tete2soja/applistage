<h2>Modifier mes informations</h1>
<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<form role="form" action="" method="POST">
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" class="form-control" id="nom" placeholder=<?php
					echo $nom;
					//echo "\"" . $tmp . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label for="prenom">Prénom</label>
				<input type="text" class="form-control" id="prenom" placeholder=<?php
					echo $prenom;
					//echo "\"" . $tmp . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label for="telephone">Téléphnone</label>
				<input type="text" class="form-control" id="telephone" placeholder=<?php
					echo "\"" . $phone . "\"";
				?>
				<?php
					echo $datetime;
					//echo "\"" . $tmp . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" placeholder=<?php
					echo "\"" . $email . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label>Dernière connexion</label>
					<p class="form-control-static">
						<?php
							echo $datetime;
						?>
					</p>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-default" style="padding-top: 3px;">Envoyer</button>
		</form>
	</div>
	<div class="col-md-4">
	</div>
</div>