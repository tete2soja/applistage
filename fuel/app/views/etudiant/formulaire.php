<!-- 					JAVASCRIPT FORMULAIRE					-->
<script language="JavaScript" type="text/javascript">
function checkform ( form )
{
	var alt = "";
	var ret = false;
	//----------------------------------------------------------------------------
	//							CHAMPS VIDES									//	
	//----------------------------------------------------------------------------
	if (form.contact_urgence.value == "") {
		alt += "Champ \"Contact d'urgence\" vide." + "\n";
		document.getElementById("urgence").className += " has-error has-feedback";
		ret = false;
	}
	if (form.rep_nom.value == "") {
		alt += "Champ \"Nom\" (responsable legal) vide" + "\n";
		document.getElementById("rep").className += " has-error";
		ret = false;
	}
	if (form.rep_adresse.value == "") {
		alt += "Champ \"Adresse\" (responsable legal) vide" + "\n";
		document.getElementById("rep").className += " has-error";
		ret = false;
	}
	if (form.rep_tel.value == "") {
		alt = "Champ \"Téléphone\" (responsable legal) vide" + "\n";
		document.getElementById("rep").className += " has-error";
		ret = false;
	}
	if (form.sujetStage.value == "") {
		alt += "Champ \"Sujet Stage\" vide" + "\n";
		document.getElementById("sujetstage").className += " has-error";
		ret = false;
	}
	if (form.ent_nom.value == "") {
		alt += "Champ \"Nom\" (entreprise) vide" + "\n";
		document.getElementById("entreprise").className += " has-error";
		ret = false;
	}
	if (form.ent_adresse.value == "") {
		alt = "Champ \"Adresse\" (entreprise) vide" + "\n";
		document.getElementById("entreprise").className += " has-error";
		ret = false;
	}
	if (form.ent_codepostal.value == "") {
		alt += "Champ \"Code Postal\" (entreprise) vide" + "\n";
		document.getElementById("entreprise").className += " has-error";
		ret = false;
	}
	if (form.ent_pays.value == "") {
		alt += "Champ \"Pays\" (entreprise) vide" + "\n";
		document.getElementById("entreprise").className += " has-error";
		ret = false;
	}
	if (form.ent_url.value == "") {
		alt += "Champ \"URL\" (entreprise) vide" + "\n";
		document.getElementById("entreprise").className += " has-error";
		ret = false;
	}
	if (form.resT_nom.value == "") {
		alt += "Champ \"Nom\" vide" + "\n";
		document.getElementById("resT").className += " has-error";
		ret = false;
	}
	if (form.resT_email.value == "") {
		alt += "Champ \"Email\" vide" + "\n";
		document.getElementById("resT").className += " has-error";
		ret = false;
	}
	if (form.resT_tel.value == "") {
		alt += "Champ \"Téléphone\" vide" + "\n";
		document.getElementById("resT").className += " has-error";
		ret = false;
	}
	if (form.resA_nom.value == "") {
		alt += "Champ \"Nom\" vide" + "\n";
		document.getElementById("resA").className += " has-error";
		ret = false;
	}
	if (form.resA_email.value == "") {
		alt += "Champ \"Email\" vide" + "\n";
		document.getElementById("resA").className += " has-error";
		ret = false;
	}
	if (form.resA_tel.value == "") {
		alt += "Champ \"Téléphone\" vide" + "\n";
		document.getElementById("resA").className += " has-error";
		ret = false;
	}
	if (form.adresse_stage.value == "") {
		alt += "Champ \"Adresse stage\" vide" + "\n";
		document.getElementById("adresse_stage").className += " has-error";
		ret = false;
	}
	if (form.duree_stage.value == "") {
		alt += "Champ \"Durée stage\" vide" + "\n";
		document.getElementById("duree_stage").className += " has-error";
		ret = false;
	}
	if (form.date_debut.value == "") {
		alt += "Champ \"Date début\" vide" + "\n";
		document.getElementById("date_debut").className += " has-error";
		ret = false;
	}
	if (form.date_fin.value == "") {
		alt += "Champ \"Date fin\" vide" + "\n";
		document.getElementById("date_fin").className += " has-error";
		ret = false;
	}
	if (form.nb_jour_travailles.value == "") {
		alt += "Champ \"Nombre de jours travaillés\" vide" + "\n";
		document.getElementById("nb_jour").className += " has-error";
		ret = false;
	}
	if (form.horaire_hebdo.value == "") {
		alt += "Champ \"Horaire hebdo\" vide" + "\n";
		document.getElementById("nb_heure").className += " has-error";
		ret = false;
	}
	if (form.retribution.value == "") {
		alt += "Champ \"Rétribution\" vide" + "\n";
		document.getElementById("retribution").className += " has-error";
		ret = false;
	}
	if (form.montant.value == "") {
		alt += "Champ \"Montant\" vide" + "\n";
		document.getElementById("montant").className += " has-error";
		ret = false;
	}
	if (form.nature.value == "") {
		alt += "Champ \"Nature\" vide" + "\n";
		document.getElementById("nature").className += " has-error";
		ret = false;
	}
	if (form.environnement.value == "") {
		alt += "Champ \"Environnement\" vide" + "\n";
		document.getElementById("environnement").className += " has-error";
		ret = false;
	}
	if (form.description_sujet.value == "") {
		alt += "Champ \"Observations\" vide" + "\n";
		document.getElementById("description_sujet").className += " has-error";
		ret = false;
	}
	//----------------------------------------------------------------------------
	//							CHAMPS CHIFFRES									//	
	//----------------------------------------------------------------------------
	if (isNaN(form.montant.value)) {
		alt += "Le champ \"Montant\" doit contenir seulement des chiffres" + "\n";
		document.getElementById("montant").className += " has-error";
		ret = false;
	}
	if (isNaN(form.rep_tel.value)) {
		alt += "Le champ \"Téléphone\" (responsable légale) doit contenir seulement des chiffres" + "\n";
		ret = false;
	}
	if (isNaN(form.resT_tel.value)) {
		alt += "Le champ \"Téléphone\" (responsable technique) doit contenir seulement des chiffres" + "\n";
		ret = false;
	}
	if (isNaN(form.resA_tel.value)) {
		alt += "Le champ \"Téléphone\" (responsable administratif) doit contenir seulement des chiffres" + "\n";
		ret = false;
	}
	if (isNaN(form.nb_jour_travailles.value)) {
		alt += "Le champ \"Nombre de jours\" doit contenir seulement des chiffres" + "\n";
		ret = false;
	}

	if (!ret) {
		alert( alt );
		return false ;
	}
	return true ;
}
function raz ( form ) {
	document.getElementById("urgence").value = "";
	document.getElementById("rep").value = "";
	document.getElementById("rep").value = "";
	document.getElementById("rep").value = "";
	document.getElementById("sujetstage").value = "";
	document.getElementById("entreprise").value = "";
	document.getElementById("entreprise").value = "";
	document.getElementById("entreprise").value = "";
	document.getElementById("entreprise").value = "";
	document.getElementById("entreprise").value = "";
	document.getElementById("resT").value = "";
	document.getElementById("resT").value = "";
	document.getElementById("resT").value = "";
	document.getElementById("resA").value = "";
	document.getElementById("resA").value = "";
	document.getElementById("resA").value = "";
	document.getElementById("adresse_stage").value = "";
	document.getElementById("duree_stage").value = "";
	document.getElementById("date_debut").value = "";
	document.getElementById("date_fin").value = "";
	document.getElementById("nb_jour").value = "";
	document.getElementById("nb_heure").value = "";
	document.getElementById("retribution").value = "";
	document.getElementById("montant").value = "";
	document.getElementById("nature").value = "";
	document.getElementById("environnement").value = "";
	document.getElementById("description_sujet").value = "";
}
</script>
<!-- 					JAVASCRIPT FORMULAIRE					-->

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
			<form class="form-horizontal" role="form" method="POST" action="" value="submit" onsubmit="return checkform(this);">
				<div class="form-group">
					<label for="idEtudiant" class="col-sm-2 control-label" >Id Etudiant</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="idEtudiant" placeholder="" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="derniereModif" class="col-sm-2 control-label" >Dernière modification</label>
					<div class="col-sm-10">
			    	<input type="email" class="form-control" id="derniereModif" placeholder="" disabled>
			    </div>
			</div>
			<div class="form-group" id="urgence">
				<label for="contact_urgence" class="col-sm-2 control-label">Contact en cas d'urgence</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="contact_urgence" placeholder="Nom et Prénom">
				</div>
			</div>
			<div class="form-group" id="rep">
				<label for="rep_nom" class="col-sm-2 control-label" >Représentant légal</label>
				<div class="col-sm-10">
						<input type="text" class="form-control" id="rep_nom" placeholder="Nom et Prénom">
						<input type="text" class="form-control" id="rep_adresse" placeholder="Adresse">
						<input type="text" class="form-control" id="rep_tel" placeholder="Téléphone">
				</div>
			</div>
			<div class="form-group" id="sujetstage">
			    <label for="sujetStage" class="col-sm-2 control-label">Sujet du stage</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="sujetStage" placeholder="">
			    </div>
			</div>
			<div class="form-group">
			    <label for="" class="col-sm-2 control-label">Origine de l'offre</label>
			    <div class="col-sm-10">
			      	<select class="form-control">
					  <option>offre_iut</option>
					  <option>etudiant</option>
					</select>
			    </div>
			</div>
			<div class="form-group" id="entreprise">
				<label for="ent_nom" class="col-sm-2 control-label" >Entreprise</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="ent_nom" placeholder="Nom">
					<input type="text" class="form-control" id="ent_adresse" placeholder="Adresse">
					<input type="text" class="form-control" id="ent_codepostal" placeholder="Code Postal">
					<input type="text" class="form-control" id="ent_pays" placeholder="Pays">
					<input type="text" class="form-control" id="ent_url" placeholder="URL">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Type de convention</label>
			    <div class="col-sm-10">
			      	<select class="form-control">
					  <option>entreprise</option>
					  <option>secteur-public</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group" id="resT">
					<label for="resT_nom" class="col-sm-2 control-label" >Responsable technique</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="resT_nom" placeholder="Nom">
						<input type="text" class="form-control" id="resT_email" placeholder="Email">
						<input type="text" class="form-control" id="resT_tel" placeholder="Téléphone">
					</div>
				</div>
			  <div class="form-group" id="resA">
					<label for="resA_nom" class="col-sm-2 control-label" >Responsable administratif</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="resA_nom" placeholder="Nom">
						<input type="text" class="form-control" id="resA_email" placeholder="Email">
						<input type="text" class="form-control" id="resA_tel" placeholder="Téléphone">
					</div>
				</div>
				<div class="form-group" id="adresse_stage">
			    <label for="adresse_stage" class="col-sm-2 control-label">Adresse du lieu du stage</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="adresse_stage" placeholder="">
			    </div>
			  </div>
			  <div class="form-group" id="adresse_stage">
			    <label for="" class="col-sm-2 control-label">Langue du stage</label>
			    <div class="col-sm-10">
			      	<select class="form-control">
					  <option>Francais</option>
					  <option>Anglais</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group" id="duree_stage">
			    <label for="duree_stage" class="col-sm-2 control-label">Durée du stage en semaines</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="duree_stage" placeholder="10">
			    </div>
			  </div>
			  <div class="form-group" id="date_debut">
			    <label for="date_debut" class="col-sm-2 control-label">Date de début de stage</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="date_debut" placeholder="13/06/2014">
			    </div>
			  </div>
			  <div class="form-group" id="date_fin">
			    <label for="date_fin" class="col-sm-2 control-label">Date de fin de stage</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="date_fin" placeholder="13/06/2014">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="" class="col-sm-2 control-label">Stage à durée allongée</label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="duree_allongee" value="option1">
			    </div>
			  </div>
			  <div class="form-group" id="nb_jour">
			    <label for="nb_jour_travailles" class="col-sm-2 control-label">Nombre de jours travaillés par semaine</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="nb_jour_travailles" placeholder="">
			    </div>
			  </div>
			  <div class="form-group" id="nb_heure">
			    <label for="horaire_hebdo" class="col-sm-2 control-label">Horaire hebdomadaire maximum</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="horaire_hebdo" placeholder="">
			    </div>
			  </div>
			  <div class="form-group" id="retribution">
			    <label for="retribution" class="col-sm-2 control-label">Rétribution proposée</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="retribution" placeholder="">
			    </div>
			  </div>
			  <div class="form-group" id="montant">
			    <label for="montant" class="col-sm-2 control-label">Montant mensuel prévu</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="montant" placeholder="">
			    </div>
			  </div>
			  <div class="form-group" id="nature">
			    <label for="nature" class="col-sm-2 control-label">En nature</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nature" placeholder="">
			    </div>
			  </div>
			  <div class="form-group" id="description_sujet">
			    <label for="description_sujet" class="col-sm-2 control-label">Description détaillée du sujet de stage</label>
			    <div class="col-sm-10">
			      <textarea id="description_sujet" class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="" class="col-sm-2 control-label">Votre mission</label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1"> <label for="inlineCheckbox1">Analyse</label>
			      <input type="checkbox" id="inlineCheckbox2" value="option2"> <label for="inlineCheckbox2">Conception</label>
			      <input type="checkbox" id="inlineCheckbox3" value="option3"> <label for="inlineCheckbox3">Réalisation</label>
			      <input type="checkbox" id="inlineCheckbox4" value="option4"> <label for="inlineCheckbox4">Test</label>
			      <input type="checkbox" id="inlineCheckbox5" value="option5"> <label for="inlineCheckbox5">Mise en production</label>  
			    </div>
			  </div>
			  <div class="form-group" id="environnement">
			    <label for="environnement" class="col-sm-2 control-label">Environnement de développement</label>
			    <div class="col-sm-10">
			      <textarea id="environnement" class="form-control" rows="3" value="Outils et Langages"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="valideCheckbox1" class="col-sm-2 control-label">Stage accepté</label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="valideCheckbox1" value="option1" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="observations" class="col-sm-2 control-label">Observations du responsable</label>
			    <div class="col-sm-10">
			      <textarea id="observations" class="form-control" rows="3" disabled></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default" onclick="raz(this);">RAZ</button>
			      <button type="submit" class="btn btn-default">Valider</button>
			    </div>
			  </div>
			</form>
		</div>