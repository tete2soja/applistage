// -------------------------------------------------------------------------------------------
//					FONCTION CHECK DU FORMULAIRE
// -------------------------------------------------------------------------------------------
function checkform()  
{
	var ret = true;
	// --------------------------------------------------------
	//				CHAMPS VIDES
	// --------------------------------------------------------
	if (!$("#contact_urgence").val()) {
		showNull("#contact_urgence_div");
		ret = false;
	}
	else {
		hideCheck("#contact_urgence_div");
	}
	//-----------------------------------
	//			Representant legal
		if (!$("#rep_nom").val()) {
			showNull("#rep_nom_div");
			ret = false;
		}
		else {
			hideCheck("#rep_nom_div");
		}
		//-----------------------------------
		if (!$("#rep_adresse").val()) {
			showNull("#rep_adresse_div");
			ret = false;
		}
		else {
			hideCheck("#rep_adresse_div");
		}
		//-----------------------------------
		if (!$("#rep_tel").val()) {
			showNull("#rep_tel_div");
			ret = false;
		}
		else {
			hideCheck("#rep_tel_div");
		}
	//-----------------------------------
	if (!$("#sujetStage").val()) {
		showNull("#sujetStage_div");
		ret = false;
	}
	else {
		hideCheck("#sujetStage_div");
	}
	//-----------------------------------
	//				Entreprise
		if (!$("#ent_nom").val()) {
			showNull("#ent_nom_div");
			ret = false;
		}
		else {
			hideCheck("#ent_nom_div");
		}
		//-----------------------------------
		if (!$("#ent_adresse").val()) {
			showNull("#ent_adresse_div");
			ret = false;
		}
		else {
			hideCheck("#ent_adresse_div");
		}
		//-----------------------------------
		if (!$("#ent_codepostal").val()) {
			showNull("#ent_codepostal_div");
			ret = false;
		}
		else {
			hideCheck("#ent_codepostal_div");
		}
		//-----------------------------------
		if (!$("#ent_pays").val()) {
			showNull("#ent_pays_div");
			ret = false;
		}
		else {
			hideCheck("#ent_pays_div");
		}
		//-----------------------------------
		if (!$("#ent_url").val()) {
			showNull("#ent_div");
			ret = false;
		}
		else {
			hideCheck("#ent_div");
		}
	//-----------------------------------
	//				Responsable Technique
		if (!$("#resT_nom").val()) {
			showNull("#resT_nom_div");
			ret = false;
		}
		else {
			hideCheck("#resT_nom_div");
		}
		//-----------------------------------
		if (!$("#resT_email").val()) {
			showNull("#resT_email_div");
			ret = false;
		}
		else {
			hideCheck("#resT_email_div");
		}
		//-----------------------------------
		if (!$("#resT_tel").val()) {
			showNull("#resT_tel_div");
			ret = false;
		}
		else {
			hideCheck("#resT_tel_div");
		}
	//-----------------------------------
	//				Responsable Admin
		if (!$("#resA_nom").val()) {
			showNull("#resA_nom_div");
			ret = false;
		}
		else {
			hideCheck("#resA_nom_div");
		}
		//-----------------------------------
		if (!$("#resA_email").val()) {
			showNull("#resA_email_div");
			ret = false;
		}
		else {
			hideCheck("#resA_email_div");
		}
		//-----------------------------------
		if (!$("#resA_tel").val()) {
			showNull("#resA_tel_div");
			ret = false;
		}
		else {
			hideCheck("#resA_tel_div");;
		}
	//-----------------------------------
	if (!$("#adresse_stage").val()) {
		showNull("#adresse_stage_div");
		ret = false;
	}
	else {
		hideCheck("#adresse_stage_div");
	}
	//-----------------------------------
	if (!$("#duree_stage").val()) {
		showNull("#duree_stage_div");
		ret = false;
	}
	else {
		hideCheck("#duree_stage_div");
	}
	//-----------------------------------
	if (!$("#date_debut").val()) {
		showNull("#date_debut_div");
		ret = false;
	}
	else {
		hideCheck("#date_debut_div");
	}
	//-----------------------------------
	if (!$("#date_fin").val()) {
		showNull("#date_fin_div");
		ret = false;
	}
	else {
		hideCheck("#date_fin_div");
	}
	//-----------------------------------
	if (!$("#nb_jour_travailles").val()) {
		showNull("#nb_jour_travailles_div");
		ret = false;
	}
	else {
		hideCheck("#nb_jour_travailles_div");
	}
	//-----------------------------------
	if (!$("#horaire_hebdo").val()) {
		showNull("#horaire_hebdo_div");
		ret = false;
	}
	else {
		hideCheck("#horaire_hebdo_div");
	}
	//-----------------------------------
	if (!$("#retribution").val()) {
		showNull("#retribution_div");
		ret = false;
	}
	else {
		hideCheck("#retribution_div");
	}
	//-----------------------------------
	if (!$("#montant").val()) {
		showNull("#montantdiv");
		ret = false;
	}
	else {
		hideCheck("#montantdiv");
	}
	//-----------------------------------
	if (!$("#nature").val()) {
		showNull("#nature_div");
		ret = false;
	}
	else {
		hideCheck("#nature_div");
	}
	//-----------------------------------
	if (!$("#description_sujet").val()) {
		showNull("#description_sujet_div");
		ret = false;
	}
	else {
		hideCheck("#description_sujet_div");
	}
	//-----------------------------------
	if (!$("#environnement").val()) {
		showNull("#environnement_div");
		ret = false;
	}
	else {
		hideCheck("#environnement_div");
	}
	// --------------------------------------------------------
	//				EMAIL VALIDE (cf fonction)
	// --------------------------------------------------------
	if((!isValidEmailAddress($("#resT_email").val()))&&($("#resT_email").val())) {
		showNullMulti("#resT_email_div","Email non valide");
		ret = false;
	}
	if((!isValidEmailAddress($("#resA_email").val()))&&($("#resA_email").val())) {
		showNullMulti("#resT_email_div","Email non valide");
		ret = false;
	}
	// --------------------------------------------------------
	//				URL VALIDE (cf fonction)
	// --------------------------------------------------------
	if((!isValidURL($("#ent_url").val()))) {
		showNullMulti("#ent_div","URL non valide");
		ret = false;
	}
	// --------------------------------------------------------
	//				NOMBRES VALIDES (seulement des chiffres)
	// --------------------------------------------------------
	if (!$.isNumeric($("#montant").val())&&($("#montant").val() != "")) {
		showNullMulti("#montant_divp","Montant non valide");
		ret = false;
	}
	else {
		hideCheck("#montant_divp");
	}
	if (!$.isNumeric($("#duree_stage").val())&&($("#duree_stage").val() != "")) {
		showNullMulti("#duree_stage_div","Durée non valide");
		ret = false;
	}
	else {
		hideCheck("#duree_stage_div");
	}
	// --------------------------------------------------------
	//				TELEPHONE VALIDES
	// --------------------------------------------------------
	if (($("#rep_tel").val().length > 10)) {
		showNullMulti("#rep_tel_div","Format trop long");
		ret = false;		
	}
	else if (($("#rep_tel").val().length < 8)) {
		showNullMulti("#rep_tel_div","Format trop court");
		ret = false;		
	}
	else {
		hideCheck("#rep_tel_div");
	}

	//Permet de pas recharger la page si FALSE
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