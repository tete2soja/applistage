<!-- 					JAVASCRIPT FORMULAIRE					-->
<script language="JavaScript" type="text/javascript">
function checkform ( form )
{
	
}
$(function() {
    var availablePays = [
    	"Afghanistan",
	    "Afrique du Sud",
	    "Albanie",
	    "Algérie",
	    "Allemagne",
	    "Andorre",
	    "Angola",
	    "Anguilla",
	    "Antarctique",
	    "Antigua-et-Barbuda",
	    "Antilles néerlandaises",
	    "Arabie saoudite",
	    "Argentine",
	    "Arménie",
	    "Aruba",
	    "Australie",
	    "Autriche",
	    "Azerbaïdjan",
	    "Bénin",
	    "Bahamas",
	    "Bahreïn",
	    "Bangladesh"
	    ];
    $( "#ent_pays" ).autocomplete({
    source: availablePays
    });
  });
</script>
		<div style="width:70%;
			margin:auto;
			padding-left:30px;
			padding-right:30px;
			border: 3px solid #DBDBDB;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			overflow: hidden;
			text-align:center;">
			<h2>Formulaire de saisie d'une proposition de stage</h2>
			<br />
			<form class="form-horizontal" role="form" method="POST" action="formulaire.php">
				<div class="form-group">
					<label for="sujet" class="col-sm-2 control-label" >Sujet</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="sujet" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="contact_nom" class="col-sm-2 control-label" >Contact</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="contact_nom" placeholder="Nom">
						<input type="text" class="form-control" id="contact_prenom" placeholder="Prénom">
						<input type="text" class="form-control" id="contact_codepostal" placeholder="Code Postal">
						<input type="text" class="form-control" id="contact_ville" placeholder="Ville">
						<input type="text" class="form-control" id="contact_pays" placeholder="Pays">
						<input type="text" class="form-control" id="contact_mail" placeholder="Adresse mail">
						<input type="text" class="form-control" id="contact_tel" placeholder="Téléphone">
					</div>
				</div>
				<div class="form-group">
					<label for="ent_nom" class="col-sm-2 control-label" >Entreprise</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="ent_nom" placeholder="Nom">
						<input type="text" class="form-control" id="ent_adresse" placeholder="Adresse">
						<input type="text" class="form-control" id="ent_codepostal" placeholder="Code Postal">
						<input type="text" class="form-control" id="ent_ville" placeholder="Ville">
						<input type="text" class="form-control" id="ent_pays" placeholder="Pays">
						<input type="text" class="form-control" id="ent_url" placeholder="URL">
					</div>
				</div>
				<div class="form-group">
				    <label for="public" class="col-sm-2 control-label">Montrer cette offre au public</label>
				    <div class="col-sm-10">
				      <input type="checkbox" id="public" value="option1" checked="true">
				    </div>
				</div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">Public visé</label>
				    <div class="col-sm-10">
				      	<select class="form-control">
						  <option>Indifférent</option>
						  <option>DUT Avril-Juin</option>
						  <option>LP Février-Juin</option>
						</select>
				    </div>
				    </div>
			  <div class="form-group">
			    <label for="contexte" class="col-sm-2 control-label">Contexte du stage</label>
			    <div class="col-sm-10">
			      <textarea id="contexte" class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="resultats_attendus" class="col-sm-2 control-label">Résultats attendus</label>
			    <div class="col-sm-10">
			      <textarea id="resultats_attendus" class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="conditions_part" class="col-sm-2 control-label">Conditions particulières</label>
			    <div class="col-sm-10">
			      <textarea id="conditions_part" class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
					<label for="url_doc_prez" class="col-sm-2 control-label" >URL d'un document de présentation</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="url_doc_prez" placeholder="">
					</div>
				</div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="reset" class="btn btn-default">Reset</button>
			      <button type="submit" class="btn btn-default">Valider</button>
			    </div>
			  </div>
			</form>
		</div>