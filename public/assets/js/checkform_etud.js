$( window ).load(function() {
	$('form').css('visibility', 'hidden');
		$('#date_debut_div').datepicker({
			format: 'yyyy-mm-dd'
		});
		$('#date_fin_div').datepicker({
			format: 'yyyy-mm-dd'
		});
});

function byEnt () {
	$('form').css('visibility', 'visible');
	$("#type_conv").attr("disabled", "disabled");
	$("#langue_conv").attr("disabled", "disabled");
}

function byEtd () {	
	$('form').css('visibility', 'visible');
	$("#type_conv").removeAttr("disabled");
	$("#langue_conv").removeAttr("disabled");
}
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
		if (!$("#ent_ville").val()) {
			showNull("#ent_ville_div");
			ret = false;
		}
		else {
			hideCheck("#ent_ville_div");
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
		if ($("#ent_url").val()) {
			if((!isValidURL($("#ent_url").val()))) {
				showNullMulti("#ent_url_div","URL non valide");
				ret = false;
			}
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
		if (!$("#resT_prenom").val()) {
			showNull("#resT_prenom_div");
			ret = false;
		}
		else {
			hideCheck("#resT_prenom_div");
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
		if (!$("#resA_prenom").val()) {
			showNull("#resA_prenom_div");
			ret = false;
		}
		else {
			hideCheck("#resA_prenom_div");
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
	if (!$.isNumeric($("#duree_stage").val())) {
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
	if (!ret) {
		$("html, body").animate({ scrollTop: 0 }, "slow");
	};

	//Permet de pas recharger la page si FALSE
	return ret;
}