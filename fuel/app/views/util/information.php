<h2>Modifier mes informations</h1>
<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<form role="form" action="" method="POST">
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" class="form-control" id="nom" placeholder=<?php
					$email = Auth::get_email();
					$id_info = Auth::get_groups();
					foreach ($id_info as $info) {
						if ($info[1] == "2") {
							$query = DB::query('SELECT `nom` FROM `etudiant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();
							break;
						}					
						else if ($info[1] == "3") {
							$query = DB::query('SELECT `nom` FROM `enseignant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();
							break;
						}
					}
					$tmp = serialize($query);
					try {
						list($null, $tmp) = explode(';s:', $tmp, 2);
						list($null, $tmp) = explode(':"', $tmp, 2);
						list($tmp, $null) = explode('";', $tmp, 2);
						print $tmp;
					} catch (Exception $e) {
						print "";
					}
					//echo "\"" . $tmp . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label for="prenom">Prénom</label>
				<input type="text" class="form-control" id="prenom" placeholder=<?php
					$email = Auth::get_email();
					$id_info = Auth::get_groups();
					foreach ($id_info as $info) {
						if ($info[1] == "2") {
							$query = DB::query('SELECT `prenom` FROM `etudiant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();
							break;
						}					
						else if ($info[1] == "3") {
							$query = DB::query('SELECT `prenom` FROM `enseignant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();
							break;
						}
					}
					$tmp = serialize($query);
					try {
						list($null, $tmp) = explode(';s:', $tmp, 2);
						list($null, $tmp) = explode(':"', $tmp, 2);
						list($tmp, $null) = explode('";', $tmp, 2);
						print $tmp;
					} catch (Exception $e) {
						print "";
					}
					//echo "\"" . $tmp . "\"";
				?>
				>
			</div>
			<div class="form-group">
				<label for="telephone">Téléphnone</label>
				<input type="text" class="form-control" id="telephone" placeholder=<?php
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
							echo $datetime = date('H:i:s d-m-Y', $last);
						?>
					</p>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-default" style="padding-top: 3px;">Envoyer</button>
		</form>
	</div>
	<div class="col-md-4">
	</div>
</div>