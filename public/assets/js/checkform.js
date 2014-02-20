// -------------------------------------------------------------------------------------------
//					FONCTION CHECK DU FORMULAIRE
// -------------------------------------------------------------------------------------------
function checkform()  
{
	var ret = false, ent = false, repL = false;
	var repLeg = "Champs vide :";
	alert(repLeg);
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
	if (!$("#rep_nom").val()) {
		//showNullMulti("#rep");
		repLeg += "\nNom";
		repL = true;
		ret = false;
	}
	else {
		$('#rep').popover('hide');
		$("#rep").removeClass('has-error has-feedback');
	}
	alert(repLeg);
	//-----------------------------------
	if (!$("#rep_adresse").val()) {
		//showNullMulti("#rep");
		repLeg += "\nAdresse";
		repL = true;
		ret = false;
	}
	else {
		$('#rep').popover('hide');
		$("#rep").removeClass('has-error has-feedback');
	}
	alert(repLeg);
	//-----------------------------------
	if (!$("#rep_tel").val()) {
		//showNullMulti("#rep");
		repLeg += "\nTel";
		repL = true;
		ret = false;
	}
	else {
		hideCheck("#urgence");
	}
	alert(repLeg);

	if (repL) {
		if (repLeg.length > 20) {
			showNullMulti("#rep",repLeg);
		}
		else {
			showNull("#rep");
		}
	}

	//-----------------------------------
	if (!$("#sujetStage").val()) {
		showNull("#sujetstage");
		ret = false;
	}
	else {
		hideCheck("#sujetstage");
	}
	//-----------------------------------
	if (!$("#ent_nom").val()) {
		if (!ent) {
			showNullMulti("#entreprise");
			ent = true;
			ret = false;
		}
	}
	else {
		hideCheck("#entreprise");
	}
	//-----------------------------------
	if (!$("#ent_adresse").val()) {
		if (!ent) {
			showNullMulti("#entreprise");
			ent = true;
			ret = false;
		}
	}
	else {
		hideCheck("#entreprise");
	}
	//-----------------------------------
	if (!$("#ent_codepostal").val()) {
		if (!ent) {
			showNullMulti("#entreprise");
			ent = true;
			ret = false;
		}
	}
	else {
		hideCheck("#entreprise");
	}
	//-----------------------------------
	if (!$("#ent_pays").val()) {
		if (!ent) {
			showNullMulti("#entreprise");
			ent = true;
			ret = false;
		}
	}
	else {
		hideCheck("#entreprise");
	}
	//-----------------------------------
	if (!$("#ent_url").val()) {
		if (!ent) {
			showNullMulti("#entreprise");
			ent = true;
			ret = false;
		}
	}
	else {
		hideCheck("#entreprise");
	}
	//-----------------------------------
	if (!$("#resT_nom").val()) {
		showNullMulti("#resT");
		ret = false;
	}
	else {
		hideCheck("#resT");
	}
	//-----------------------------------
	if (!$("#resT_email").val()) {
		showNullMulti("#resT");
		ret = false;
	}
	else {
		hideCheck("#resT");
	}
	//-----------------------------------
	if (!$("#resT_tel").val()) {
		showNullMulti("#resT");
		ret = false;
	}
	else {
		hideCheck("#resT");
	}
	//-----------------------------------
	if (!$("#resA_nom").val()) {
		showNullMulti("#resA");
		ret = false;
	}
	else {
		hideCheck("#resA");
	}
	//-----------------------------------
	if (!$("#resA_email").val()) {
		showNullMulti("#resA");
		ret = false;
	}
	else {
		hideCheck("#resA");
	}
	//-----------------------------------
	if (!$("#resA_tel").val()) {
		showNullMulti("#resA");
		ret = false;
	}
	else {
		hideCheck("#resA");;
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
	if( !isValidEmailAddress( $("#resT_email").val() ) ) {
		$('#resT').popover({container: "body", content: "Email non valide"});
		$('#resT').popover('show');
		$("#resT").addClass('has-error has-feedback');
		ret = false;
	}
	if( !isValidEmailAddress( $("#resA_email").val() ) ) {
		$('#resT').popover({container: "body", content: "Email non valide"});
		$('#resT').popover('show');
		$("#resT").addClass('has-error has-feedback');
		ret = false;
	}

	// --------------------------------------------------------
	//				NOMBRES VALIDES
	// --------------------------------------------------------
	if ($.isNumeric($("#montant").val())) {
		$('#montant').popover({container: "body", content: "Le montant n'est pas valide"});
		$('#montant').popover('show');
		$("#montant").addClass('has-error has-feedback');
		ret = false;
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

function hideCheck(div) {
	$(div).popover('hide');
	$(div).removeClass('has-error has-feedback');
};

function showNull(div) {
	$(div).popover('destroy')
	$(div).popover({container: "body", content: "Champ vide"});
	$(div).popover('show');
	$(div).addClass('has-error has-feedback');
};

function showNullMulti(div,string) {
	$(div).popover('destroy')
	$(div).popover({container: "body", content: string});
	$(div).popover('show');
	$(div).addClass('has-error has-feedback');
};


// -------------------------------------------------------------------------------------------
//					FONCTION RESET DU FORMULAIRE
// -------------------------------------------------------------------------------------------

function effacer () {
  $(':input','#formulaire_etudiant')
   .not(':button, :submit, :reset, :hidden')
   .val('')
   .removeAttr('checked')
   .removeAttr('selected');
   return false;
}