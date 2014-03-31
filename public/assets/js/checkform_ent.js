// -------------------------------------------------------------------------------------------
//					FONCTION CHECK DU FORMULAIRE
// -------------------------------------------------------------------------------------------
function checkform()  
{
	var ret = true;
	// --------------------------------------------------------
	//				CHAMPS VIDES
	// --------------------------------------------------------
	if (!$("#sujet").val()) {
		showNull("#sujet_div");
		ret = false;
	}
	else {
		hideCheck("#sujet_div");
	}
	//-----------------------------------
	//			Contact
		if (!$("#contact_nom").val()) {
			showNull("#contact_nom_div");
			ret = false;
		}
		else {
			hideCheck("#contact_nom_div");
		}
		//-----------------------------------
		if (!$("#contact_prenom").val()) {
			showNull("#contact_prenom_div");
			ret = false;
		}
		else {
			hideCheck("#contact_prenom_div");
		}
		//-----------------------------------
		if (!$("#contact_mail").val()) {
			showNull("#contact_mail_div");
			ret = false;
		}
		else {
			hideCheck("#contact_mail_div");
		}
		//-----------------------------------
		if (!$("#contact_tel").val()) {
			showNull("#contact_tel_div");
			ret = false;
		}
		else {
			hideCheck("#contact_tel_div");
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
	if (!$("#contexte").val()) {
		showNull("#contexte_div");
		ret = false;
	}
	else {
		hideCheck("#contexte_div");
	}
	//-----------------------------------
	if (!$("#resultats_attendus").val()) {
		showNull("#resultats_attendus_div");
		ret = false;
	}
	else {
		hideCheck("#resultats_attendus_div");
	}
	//-----------------------------------
	if (!$("#conditions_part").val()) {
		showNull("#conditions_part_div");
		ret = false;
	}
	else {
		hideCheck("#conditions_part_div");
	}

	if ($("#ent_url").val()) {
		if((!isValidURL($("#ent_url").val()))) {
			showNullMulti("#ent_url_div","URL non valide");
			ret = false;
		}
	}
	if ($("#url_doc_prez").val()) {
		if((!isValidURL($("#url_doc_prez").val()))) {
			showNullMulti("#url_doc_prez_div","URL non valide");
			ret = false;
		}
	}

	// --------------------------------------------------------
	//				EMAIL VALIDE (cf fonction)
	// --------------------------------------------------------
	if(!isValidEmailAddress($("#contact_mail").val())) {
		showNullMulti("#contact_mail_div","Email non valide");
		ret = false;
	}
	// --------------------------------------------------------
	//				NOMBRES VALIDES (seulement des chiffres)
	// --------------------------------------------------------
	if (!$.isNumeric($("#ent_codepostal").val())) {
		showNullMulti("#ent_codepostal_div","Code postal non valide");
		ret = false;
	}
	else {
		hideCheck("#ent_codepostal_div");
	}
	if (!$.isNumeric($("#contact_tel").val())) {
		showNullMulti("#contact_tel_div","Téléphone non valide");
		ret = false;
	}
	else {
		hideCheck("#contact_tel_div");
	}
	if (!ret) {
		$("html, body").animate({ scrollTop: 0 }, "slow");
	};
	//Permet de pas recharger la page si FALSE
	return ret;
}