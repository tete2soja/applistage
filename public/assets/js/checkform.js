// -------------------------------------------------------------------------------------------
//					FONCTION CHECK DU FORMULAIRE
// -------------------------------------------------------------------------------------------
function checkform()  
{
	var ent = repL = resT = resA = false, ret = true;
	var repLeg = entChamps = respTech = respAdmin = "Champs vide :";
	// --------------------------------------------------------
	//				CHAMPS VIDES
	// --------------------------------------------------------
	if (!$("#contact_urgence").val()) {
		showNull("#urgence");
		ret = false;
	}
	else {
		hideCheck("#urgence");
	}
	//-----------------------------------
	//			Representant legal
		if (!$("#rep_nom").val()) {
			showNull("#rep_nom_div");
			repL = true;
			ret = false;
		}
		else {
			hideCheck("#rep_nom_div");
		}
		//-----------------------------------
		if (!$("#rep_adresse").val()) {
			showNull("#rep_adresse_div");
			repL = true;
			ret = false;
		}
		else {
			hideCheck("#rep_adresse_div");
		}
		//-----------------------------------
		if (!$("#rep_tel").val()) {
			showNull("#rep_tel_div");
			repL = true;
			ret = false;
		}
		else {
			hideCheck("#rep_tel_div");
		}
		//--- Test pour savoir si plusieurs champs sont vide ---
		/*if (repL) {
			if (repLeg.length > 20) {
				showNullMulti("#rep",repLeg);
			}
			else {
				showNull("#rep");
			}
		}*/
	//-----------------------------------
	if (!$("#sujetStage").val()) {
		showNull("#sujetstage");
		ret = false;
	}
	else {
		hideCheck("#sujetstage");
	}
	//-----------------------------------
	//				Entreprise
		if (!$("#ent_nom").val()) {
			showNull("#ent_nom_div");
			entChamps += "\nNom";
			ret = false;
		}
		else {
			hideCheck("#entreprise");
		}
		//-----------------------------------
		if (!$("#ent_adresse").val()) {
			showNull("#ent_adresse_div");
			entChamps += "\nAdresse";
			ret = false;
		}
		else {
			hideCheck("#entreprise");
		}
		//-----------------------------------
		if (!$("#ent_codepostal").val()) {
			showNull("#ent_codepostal_div");
			entChamps += "\nCode Postale";
			ret = false;
		}
		else {
			hideCheck("#entreprise");
		}
		//-----------------------------------
		if (!$("#ent_pays").val()) {
			showNull("#ent_pays_div");
			entChamps += "\nPays";
			ret = false;
		}
		else {
			hideCheck("#entreprise");
		}
		//--- Test pour savoir si plusieurs champs sont vide ---
		/*if (entChamps.length > 13) {
			if (entChamps.length > 20) {
				showNullMulti("#entreprise",entChamps);
			}
			else {
				showNull("#entreprise");
			}
		}*/
	//-----------------------------------
	//				Responsable Technique
		if (!$("#resT_nom").val()) {
			respTech += "\nNom";
			resT = true;
			ret = false;
		}
		else {
			hideCheck("#resT");
		}
		//-----------------------------------
		if (!$("#resT_email").val()) {
			respTech += "\nEmail";
			resT = true;
			ret = false;
		}
		else {
			hideCheck("#resT");
		}
		//-----------------------------------
		if (!$("#resT_tel").val()) {
			respTech += "\nTélephone";
			resT = true;
			ret = false;
		}
		else {
			hideCheck("#resT");
		}
		//--- Test pour savoir si plusieurs champs sont vide ---
		if (respTech.length > 13) {
			if (respTech.length > 20) {
				showNullMulti("#resT",respTech);
			}
			else {
				showNull("#resT");
			}
		}
	//-----------------------------------
	//				Responsable Admin
		if (!$("#resA_nom").val()) {
			respAdmin += "\nNom";
			resA = true;
			ret = false;
		}
		else {
			hideCheck("#resA");
		}
		//-----------------------------------
		if (!$("#resA_email").val()) {
			respAdmin += "\nEmail";
			resA = true;
			ret = false;
		}
		else {
			hideCheck("#resA");
		}
		//-----------------------------------
		if (!$("#resA_tel").val()) {
			respAdmin += "\nTélephone";
			resA = true;
			ret = false;
		}
		else {
			hideCheck("#resA");;
		}
		//--- Test pour savoir si plusieurs champs sont vide ---
		if (respAdmin.length > 13) {
			if (respAdmin.length > 20) {
				showNullMulti("#resA",respAdmin);
			}
			else {
				showNull("#resA");
			}
		}
	//-----------------------------------
	if (!$("#adresse_stage").val()) {
		showNull("#adressestage");
		ret = false;
	}
	else {
		hideCheck("#adressestage");
	}
	//-----------------------------------
	if (!$("#duree_stage").val()) {
		showNull("#duree_stage_stage");
		ret = false;
	}
	else {
		hideCheck("#duree_stage_stage");
	}
	//-----------------------------------
	if (!$("#date_debut").val()) {
		showNull("#date_debut_stage");
		ret = false;
	}
	else {
		hideCheck("#date_debut_stage");
	}
	//-----------------------------------
	if (!$("#date_fin").val()) {
		showNull("#date_fin_stage");
		ret = false;
	}
	else {
		hideCheck("#date_fin_stage");
	}
	//-----------------------------------
	if (!$("#nb_jour_travailles").val()) {
		showNull("#nb_jour");
		ret = false;
	}
	else {
		hideCheck("#nb_jour");
	}
	//-----------------------------------
	if (!$("#horaire_hebdo").val()) {
		showNull("#nb_heure");
		ret = false;
	}
	else {
		hideCheck("#nb_heure");
	}
	//-----------------------------------
	if (!$("#retribution").val()) {
		showNull("#retribution_propose");
		ret = false;
	}
	else {
		hideCheck("#retribution_propose");
	}
	//-----------------------------------
	if (!$("#montant").val()) {
		showNull("#montant_mens");
		ret = false;
	}
	else {
		hideCheck("#montant_mens");
	}
	//-----------------------------------
	if (!$("#nature").val()) {
		showNull("#nature_bonus");
		ret = false;
	}
	else {
		hideCheck("#nature_bonus");
	}
	//-----------------------------------
	if (!$("#description_sujet").val()) {
		showNull("#description_sujet_det");
		ret = false;
	}
	else {
		hideCheck("#description_sujet_det");
	}
	//-----------------------------------
	if (!$("#environnement").val()) {
		showNull("#environnement_dev");
		ret = false;
	}
	else {
		hideCheck("#environnement_dev");
	}

	// --------------------------------------------------------
	//				EMAIL VALIDE
	// --------------------------------------------------------
	if((!isValidEmailAddress($("#resT_email").val()))&&(!resT)) {
		showNullMulti("#resT","Email non valide");
		ret = false;
	}
	if((!isValidEmailAddress($("#resA_email").val()))&&(!resA)) {
		showNullMulti("#resA","Email non valide");
		ret = false;
	}

	// --------------------------------------------------------
	//				URL VALIDE
	// --------------------------------------------------------
	if ((!$("#ent_url").val())&&(!isValidURL($("#ent_url").val()))) {
		showNullMulti("#ent_url_div","URL non valide");
		ret = false;
	}
	else {
		hideCheck("#ent_url_div");
	}

	// --------------------------------------------------------
	//				NOMBRES VALIDES
	// --------------------------------------------------------
	if (!$.isNumeric($("#montant").val())&&($("#montant").val() != "")) {
		showNullMulti("#montant_div","Montant non valide");
		ret = false;
	}
	else {
		hideCheck("#ent_url_div");
	}
	
	if (!$.isNumeric($("#rep_tel").val())&&($("#rep_tel").val() != "")) {
		showNullMulti("#rep_tel_div","Téléphone non valide");
		ret = false;
	}
	else {
		hideCheck("#ent_url_div");
	}
	return ret;
}

// -------------------------------------------------------------------------------------------
//					SOUS - FONCTIONS
// -------------------------------------------------------------------------------------------
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

function isValidURL(url) {
	var pattern = new RegExp(/^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i);
	return pattern.test(url);
}

function hideCheck(div) {
	$(div).popover('destroy');
	$(div).removeClass('has-error has-feedback');
};

function showNull(div) {
	$(div).popover({container: "body", content: "Champ vide"});
	$(div).popover('show');
	$(div).addClass('has-error has-feedback');
};

function showNullMulti(div,string) {
	$(div).popover({container: "body", content: string});
	$(div).popover('show');
	$(div).addClass('has-error has-feedback');
};


// -------------------------------------------------------------------------------------------
//					FONCTION RESET DU FORMULAIRE
// -------------------------------------------------------------------------------------------

function effacer () {
	$("*").popover('destroy'); 						// Supprime les popover
	$("*").removeClass('has-error has-feedback');	// Supprime la mise en forme rouge
	$(':input','#formulaire_etudiant')				// Vide tout les champs
	 .not(':button, :submit, :reset, :hidden')
	 .val('')
	 .removeAttr('checked')
	 .removeAttr('selected');
   return false;									// Empeche de recharger la page
}