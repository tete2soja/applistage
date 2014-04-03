<?php echo Asset::js('checkform_etud.js'); ?>
<script language="JavaScript" type="text/javascript">
$(function() {
    var availablePays = <?php echo str_replace('&quot;', '"', $liste_pays) ?>;
    var availableEnt = <?php echo str_replace('&quot;', '"', $liste_ent) ?>;
    var availableSujet = <?php echo str_replace('&quot;', '"', $liste_sujet) ?>;
    var availableVille = <?php echo str_replace('&quot;', '"', $liste_ville) ?>;
    var availableCode = <?php echo str_replace('&quot;', '"', $liste_code) ?>;
    $( "#ent_pays" ).autocomplete({
    source: availablePays
    });
    $( "#ent_nom" ).autocomplete({
    source: availableEnt
    });
    $( "#sujetStage" ).autocomplete({
    source: availableSujet
    });
    $( "#ent_ville" ).autocomplete({
    source: availableVille
    });
    $( "#ent_codepostal" ).autocomplete({
    source: availableCode
    });
  });
</script>
<?php
	if(isset($fiche->observations_resp)) {
		echo '<p><div class="alert alert-warning"><strong>Observations du responsable :</strong> '.$fiche->observations_resp.'</div></p>';
	}
?>
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
	<h2>Formulaire de saisie de la convention de stage</h2>
	<hr />
	<p>Si l'entreprise édite la convention, cliquez sur 'Entreprise', sinon cliquez sur 'Etudiant'.</p>
	<button type="button" class="btn btn-primary" onclick="byEtd()">Etudiant</button>
	<button type="button" class="btn btn-success" onclick="byEnt()">Entreprise</button>
	<hr />
	<form class="form-horizontal" id="formulaire_etudiant" name="formulaire_etudiant" role="form" method="POST" action="" value="submit" onsubmit="return checkform();">
	<p><font color="red"><b>*</b></font> : Champs obligatoires</p>
		<div class="form-group">
			<label for="idEtudiant" class="col-sm-2 control-label" >N° Etudiant</label>
			<div class="col-sm-10">
					<input type="text" class="form-control" id="idEtudiant" name="idEtudiant" placeholder="" disabled value=<?php echo '"' . Auth::get('username') . '"';?>>
			</div>
		</div>
		<div class="form-group">
			<label for="derniereModif" class="col-sm-2 control-label" >Dernière modification</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="derniereModif" placeholder="" disabled value=<?php 
						if(isset($fiche->last_edit))
							echo '"' . $fiche->last_edit . '"';
						?>>
			</div>
		</div>
		<hr />
		<div class="form-group">
			<label for="contact_urgence" class="col-sm-2 control-label">Contact en cas d'urgence<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="contact_urgence_div">
					<input type="text" class="form-control" id="contact_urgence" name="contact_urgence" placeholder="Nom, Prénom et Téléphone" value=<?php 
						if(isset($fiche->contact_urgence))
							echo '"' . $fiche->contact_urgence . '"';
						?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="rep_nom" class="col-sm-2 control-label" >Représentant légal<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="rep_nom_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="rep_nom" name="rep_nom" placeholder="Nom et Prénom" value=<?php 
						if(isset($fiche->rpz_np))
							echo '"' . $fiche->rpz_np . '"';
						?>>
				</div>
				<div id="rep_adresse_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="rep_adresse" name="rep_adresse" placeholder="Adresse" value=<?php 
						if(isset($fiche->rpz_adresse))
							echo '"' . $fiche->rpz_adresse . '"';
						?>>
				</div>
				<div id="rep_tel_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="rep_tel" name="rep_tel" placeholder="Téléphone" value=<?php 
						if(isset($fiche->rpz_tel))
							echo '"' . $fiche->rpz_tel . '"';
						?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="sujetStage" class="col-sm-2 control-label">Sujet du stage<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="sujetStage_div"><input type="text" class="form-control" id="sujetStage" name="sujetStage" placeholder="" value=<?php 
					if(isset($fiche->sujet))
							echo '"' . $fiche->sujet . '"';
					elseif(isset($stage)) {
						echo '"' . $stage->sujet . '"';
					}?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Origine de l'offre<font color="red">*</font></label>
			<div class="col-sm-10">
				<select name="origine" id="origine" class="form-control">
					<?php 
						if(isset($stage->origine_offre))
							echo '<option value="0" selected="selected">Offre IUT</option>';
						else {
					 		echo '<option value="0" selected="selected">Offre IUT</option>';
							echo '<option value="1">Etudiant</option>';
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="ent_nom" class="col-sm-2 control-label" >Entreprise<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="ent_nom_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_nom" name="ent_nom" placeholder="Nom" value=<?php 
					if(isset($fiche->ent_nom))
							echo '"' . $fiche->ent_nom . '"';
					elseif(isset($stage->ent_nom))
						echo '"' . $stage->ent_nom . '"';
					?>>
				</div>
				<div id="ent_adresse_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_adresse" name="ent_adresse" placeholder="Adresse" value=<?php 
					if(isset($fiche->ent_adresse))
							echo '"' . $fiche->ent_adresse . '"';
					elseif(isset($stage->ent_adresse))
						echo '"' . $stage->ent_adresse . '"';
					?>>
				</div>
				<div id="ent_codepostal_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_codepostal" name="ent_codepostal" placeholder="Code Postal" value=<?php 
					if(isset($fiche->ent_code))
							echo '"' . $fiche->ent_code . '"';
					elseif(isset($stage->ent_code))
						echo '"' . $stage->ent_code . '"';
					?>>
				</div>
				<div id="ent_ville_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_ville" name="ent_ville" placeholder="Ville" value=<?php 
					if(isset($fiche->ent_ville))
							echo '"' . $fiche->ent_ville . '"';
					elseif(isset($stage->ent_ville))
						echo '"' . $stage->ent_ville . '"';
					?>>
				</div>
				<div id="ent_pays_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_pays" name="ent_pays" placeholder="Pays" value=<?php 
					if(isset($fiche->ent_pays))
							echo '"' . $fiche->ent_pays . '"';
					elseif(isset($stage->ent_pays))
						echo '"' . $stage->ent_pays . '"';
					?>>
				</div>
				<div id="ent_div" style="margin-bottom:9px;"><input type="text" class="form-control" id="ent_url" name="ent_url" placeholder="URL" value=<?php 
					if(isset($fiche->ent_url))
							echo '"' . $fiche->ent_url . '"';
					elseif(isset($stage->ent_url))
						echo '"' . $stage->ent_url . '"';
					?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="resT_nom" class="col-sm-2 control-label" >Responsable technique<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="resT_nom_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resT_nom" name="resT_nom" placeholder="Nom" value=<?php 
						if(isset($fiche->responsable_tech_nom))
							echo '"' . $fiche->responsable_tech_nom . '"';
						?>>
				</div>
				<div id="resT_prenom_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resT_prenom" name="resT_prenom" placeholder="Prénom" value=<?php 
						if(isset($fiche->responsable_tech_prenom))
							echo '"' . $fiche->responsable_tech_prenom . '"';
						?>>
				</div>
				<div id="resT_email_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resT_email" name="resT_email" placeholder="Email" value=<?php 
						if(isset($fiche->responsable_tech_email))
							echo '"' . $fiche->responsable_tech_email . '"';
						?>>
				</div>
				<div id="resT_tel_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resT_tel" name="resT_tel" placeholder="Téléphone" value=<?php 
						if(isset($fiche->responsable_tech_tel))
							echo '"' . $fiche->responsable_tech_tel . '"';
						?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="resA_nom" class="col-sm-2 control-label" >Responsable administratif<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="resA_nom_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resA_nom" name="resA_nom" placeholder="Nom" value=<?php 
						if(isset($fiche->responsable_adm_nom))
							echo '"' . $fiche->responsable_adm_nom . '"';
						?>>
				</div>
				<div id="resA_prenom_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resA_prenom" name="resA_prenom" placeholder="Prénom" value=<?php 
						if(isset($fiche->responsable_adm_prenom))
							echo '"' . $fiche->responsable_adm_prenom . '"';
						?>>
				</div>
				<div id="resA_email_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resA_email" name="resA_email" placeholder="Email" value=<?php 
						if(isset($fiche->responsable_adm_email))
							echo '"' . $fiche->responsable_adm_email . '"';
						?>>
				</div>
				<div id="resA_tel_div" style="margin-bottom:9px;">
					<input type="text" class="form-control" id="resA_tel" name="resA_tel" placeholder="Téléphone" value=<?php 
						if(isset($fiche->responsable_adm_tel))
							echo '"' . $fiche->responsable_adm_tel . '"';
						?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Langue de la convention<font color="red">*</font></label>
			<div class="col-sm-10">
				<select id="langue_conv" name="langue_conv" class="form-control">
					<option value="0" selected="selected">Français</option>
					<option value="1">Anglais</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Type de convention<font color="red">*</font></label>
			<div class="col-sm-10">
				<select id="type_conv" name="type_conv"class="form-control">
					<option value="0" selected="selected">Entreprise</option>
					<option value="1">Secteur-public</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="duree_stage" class="col-sm-2 control-label">Durée du stage en semaines<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="duree_stage_div">
					<input type="number" class="form-control" id="duree_stage" name="duree_stage" placeholder="10" value=<?php 
						if(isset($fiche->duree))
							echo '"' . $fiche->duree . '"';
						else echo "10";
						?>>
				</div>
			</div>
		</div>
		<p>Les dates doivent être au format suivant : AAAA-MM-JJ (ex : 2014-04-07)</p>
		<div class="form-group">
			<label for="date_debut" class="col-sm-2 control-label">Date de début de stage<font color="red">*</font></label>
			<div class="col-sm-10">
					<input id="date_debut" name="date_debut" class="span2" size="16" type="date" value=<?php if(isset($fiche->date_debut)) echo '"' . $fiche->date_debut . '"'; elseif (isset($date_debut)) echo '"' . $date_debut .'"'; ?>>
			</div>
		</div>
		<div class="form-group">
			<label for="date_fin" class="col-sm-2 control-label">Date de fin de stage<font color="red">*</font></label>
			<div class="col-sm-10">
					<input id="date_fin" name="date_fin" class="span2" size="16" type="date" value=<?php if(isset($fiche->date_fin)) echo '"' . $fiche->date_fin . '"'; elseif (isset($date_fin)) echo '"' . $date_fin .'"'; ?>>
			</div>
		</div>
		<div class="form-group">
			<label for="nb_jour_travailles" class="col-sm-2 control-label">Nombre de jours travaillés par semaine<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="nb_jour_travailles_div"><input type="number" class="form-control" id="nb_jour_travailles" name="nb_jour_travailles" placeholder="" value=<?php 
						if(isset($fiche->nb_jour_semaine))
							echo '"' . $fiche->nb_jour_semaine . '"';
						else echo "5";
						?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="horaire_hebdo" class="col-sm-2 control-label">Horaire hebdomadaire maximum<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="horaire_hebdo_div"><input type="number" class="form-control" id="horaire_hebdo" name="horaire_hebdo" value=<?php 
						if(isset($fiche->horaire_hebdo))
							echo '"' . $fiche->horaire_hebdo . '"';
						else echo "35";
						?>>
				</div>
			</div>
		</div>
		<p>Soit salaire mensuel brut soit indémnité mensuelle net<?php if (isset($remuneration)) echo ' (minimum : '.$remuneration.'€)';?></p>
		<div class="form-group">
			<label for="retribution" class="col-sm-2 control-label">Salaire mensuel brut<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="retribution_div"><input type="number" class="form-control" id="retribution" name="retribution" placeholder="" value=<?php 
						if(isset($fiche->retribution))
							echo '"' . $fiche->retribution . '"';
						else echo "0";
						?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="montant" class="col-sm-2 control-label">Indémnité mensuelle nette<font color="red">*</font></label>
			<div class="col-sm-10" id="montant_div">
				<div id="montantdiv"><input type="number" class="form-control" id="montant" name="montant" placeholder="" value=<?php if(isset($fiche->indemnite)) echo '"' . $fiche->indemnite . '"'; elseif (isset($remuneration)) echo '"' . $remuneration .'"'; ?>></div>
			</div>
		</div>
		<div class="form-group">
			<label for="nature" class="col-sm-2 control-label">Avantage en nature<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="nature_div"><input type="text" class="form-control" id="nature" name="nature" placeholder="" value=<?php 
						if(isset($fiche->nature))
							echo '"' . $fiche->nature . '"';
						else echo "aucun";
						?>>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="description_sujet" class="col-sm-2 control-label">Description détaillée du sujet de stage<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="description_sujet_div">
					<textarea id="description_sujet" name="description_sujet" class="form-control" rows="3"><?php if(isset($fiche->description_stage)) echo $fiche->description_stage; elseif((isset($stage->contexte)) AND (isset($stage->resultats))) echo $stage->contexte .'\n'. $stage->resultats; ?>
					</textarea>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Votre mission</label>
			<div class="col-sm-10">
				<input type="checkbox" id="inlineCheckbox1" name="inlineCheckbox1" value="1"><label for="inlineCheckbox1">Analyse</label>
				<input type="checkbox" id="inlineCheckbox2" name="inlineCheckbox2" value="2"><label for="inlineCheckbox2">Conception</label>
				<input type="checkbox" id="inlineCheckbox3" name="inlineCheckbox3" value="3"><label for="inlineCheckbox3">Réalisation</label>
				<input type="checkbox" id="inlineCheckbox4" name="inlineCheckbox4" value="4"><label for="inlineCheckbox4">Test</label>
				<input type="checkbox" id="inlineCheckbox5" name="inlineCheckbox5" value="5"><label for="inlineCheckbox5">Mise en production</label>	
			</div>
		</div>
		<div class="form-group">
			<label for="environnement" class="col-sm-2 control-label">Environnement de développement<font color="red">*</font></label>
			<div class="col-sm-10">
				<div id="environnement_div">
					<textarea id="environnement" name="environnement" class="form-control" rows="3" value="Outils et Langages"><?php if(isset($fiche->environnement_dev)) echo $fiche->environnement_dev; elseif(isset($stage->conditions)) echo $stage->conditions; ?>
					</textarea>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="observations" class="col-sm-2 control-label">Observations du responsable</label>
			<div class="col-sm-10">
				<textarea id="observations" name="observations" class="form-control" rows="3" disabled><?php if(isset($fiche->observations_resp)) echo $fiche->observations_resp; ?>
				</textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				<button id="valider" type="submit" class="btn btn-success">Valider</button>
				<button type="submit" class="btn btn-danger" onclick="return effacer('#formulaire_etudiant')">RAZ</button>
			</div>
		</div>
	</form>
</div>