		<?php echo Asset::js('checkform_ent.js'); ?>
<script language="JavaScript" type="text/javascript">
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
		<div style="width:90%;
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
			<form class="form-horizontal" id="formulaire_entreprise" role="form" method="POST" action="" onsubmit="return checkform();">
				<div class="form-group">
					<label for="sujet" class="col-sm-2 control-label" >Sujet</label>
					<div class="col-sm-10">
						<div id="sujet_div"><input type="text" class="form-control" id="sujet" name="sujet" placeholder=""></div>
					</div>
				</div>
				<div class="form-group">
					<label for="contact_nom" class="col-sm-2 control-label" >Contact</label>
					<div class="col-sm-10">
						<div id="contact_nom_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="contact_nom" name="contact_nom" placeholder="Nom"></div>
						<div id="contact_prenom_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="contact_prenom" name="contact_prenom" placeholder="Prénom"></div>
						<div id="contact_codepostal_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="contact_codepostal" name="contact_codepostal" placeholder="Code Postal"></div>
						<div id="contact_ville_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="contact_ville" name="contact_ville" placeholder="Ville"></div>
						<div id="contact_pays_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="contact_pays" name="contact_pays" placeholder="Pays"></div>
						<div id="contact_mail_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="contact_mail" name="contact_mail" placeholder="Adresse mail"></div>
						<div id="contact_tel_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="contact_tel" name="contact_tel" placeholder="Téléphone"></div>
					</div>
				</div>
				<div class="form-group">
					<label for="ent_nom" class="col-sm-2 control-label" >Entreprise</label>
					<div class="col-sm-10">
						<div id="ent_nom_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_nom" name="ent_nom" placeholder="Nom"></div>
						<div id="ent_adresse_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_adresse" name="ent_adresse" placeholder="Adresse"></div>
						<div id="ent_codepostal_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_codepostal" name="ent_codepostal" placeholder="Code Postal"></div>
						<div id="ent_ville_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_ville" name="ent_ville" placeholder="Ville"></div>
						<div id="ent_pays_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_pays" name="ent_pays" placeholder="Pays"></div>
						<div id="ent_url_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_url" name="ent_url" placeholder="URL"></div>
					</div>
				</div>
				<div class="form-group">
				    <label for="public" class="col-sm-2 control-label">Montrer cette offre au public</label>
				    <div class="col-sm-10">
				      <input type="checkbox" id="public" name="public" value="option1" checked="true">
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
			      <div id="contexte_div"><textarea id="contexte" name="contexte" class="form-control" rows="3"></textarea></div>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="resultats_attendus" class="col-sm-2 control-label">Résultats attendus</label>
			    <div class="col-sm-10">
			      <div id="resultats_attendus_div"><textarea id="resultats_attendus" name="resultats_attendus" class="form-control" rows="3"></textarea></div>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="conditions_part" class="col-sm-2 control-label">Conditions particulières</label>
			    <div class="col-sm-10">
			      <div id="conditions_part_div"><textarea id="conditions_part" name="conditions_part" class="form-control" rows="3"></textarea></div>
			    </div>
			  </div>
			  <div class="form-group">
					<label for="url_doc_prez" class="col-sm-2 control-label" >URL d'un document de présentation</label>
					<div class="col-sm-10">
						<div id="url_doc_prez_div"><input type="text" class="form-control" id="url_doc_prez" name="url_doc_prez" placeholder=""></div>
					</div>
				</div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="reset" class="btn btn-default" onclick="return effacer('#formulaire_entreprise')">RAZ</button>
			      <button type="submit" name="submit" value="submit" class="btn btn-default">Valider</button>
			    </div>
			  </div>
			</form>
		</div>