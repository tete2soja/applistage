<script type="text/javascript">
	$(document).ready(function() {
		$("#password_new_check").keyup(validate);
	});
	function validate() {
		var password1 = $("#password_new").val();
		var password2 = $("#password_new_check").val();
		if(password1 == password2) {
			$("#password_check_div").removeClass('has-error has-feedback');
			$("#password_check_div").popover('destroy');  
		}
		else {
			$("#password_check_div").popover({container: "body", content: "Non identique"});
			$("#password_check_div").popover('show');
			$("#password_check_div").addClass('has-error has-feedback');
		}
	}
</script>

<h1>Changer le mot de passe</h1>
<form class="form-horizontal" role="form" action="" method="POST">
	<div class="form-group">
		<label for="password_back" class="col-sm-2 control-label">Mot de passe actuel</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password_back" name="password_back" placeholder="">
		</div>
	</div>
	<div class="form-group">
		<label for="password_new" class="col-sm-2 control-label">Nouveau mot de passe</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password_new" name="password_new" placeholder="">
		</div>
	</div>
	<div class="form-group">
		<label for="password_new_check" class="col-sm-2 control-label">Vérification</label>
		<div class="col-sm-10" id="password_check_div">
			<input type="password" class="form-control" id="password_new_check" name="password_new_check" placeholder="">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" value="submit" class="btn btn-default">Valider</button>
		</div>
	</div>
</form>