<h2>Modifier mes informations</h1>
<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<form role="form">
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" class="form-control" id="nom" placeholder="Nom">
			</div>
			<div class="form-group">
				<label for="prenom">Prénom</label>
				<input type="text" class="form-control" id="prenom" placeholder="Prénom">
			</div>
			<div class="form-group">
				<label for="prenom">Téléphnone</label>
				<input type="text" class="form-control" id="prenom" placeholder=<?php
					$phone = Auth::get('telephone');
					echo "\"" . $phone . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" placeholder=<?php
					$email = Auth::get_email();
					echo "\"" . $email . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label>Dernière connexion</label>
					<p class="form-control-static">
						<?php
							$last = Auth::get('last_login');
							echo $last;
						?>
					</p>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	<div class="col-md-4">
	</div>
</div>