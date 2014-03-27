<?php

class Model_Fichestage extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'etudiant',
		'enseignant',
		'stage',
		'sujet',
		'description_stage',
		'environnement_dev',
		'observations_resp',
		'indemnite',
		'entreprise',
		'responsable_tech',
		'responsable_adm',
		'contact_urgence',
		'rpz_np',
		'rpz_adresse',
		'rpz_tel',
		'origine_offre',
		'type',
		'langue',
		'duree',
		'date_debut',
		'date_fin',
		'allongee',
		'nb_jour_semaine',
		'horaire_hebdo',
		'retribution',
		'nature',
		'etat',
		'last_edit',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'fichestages';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('etudiant', 'Etudiant', 'required|valid_string[numeric]');
		$val->add_field('enseignant', 'Enseignant', 'valid_string[numeric]');
		$val->add_field('stage', 'Stage', 'required|valid_string[numeric]');
		$val->add_field('sujet', 'Sujet', 'required|max_length[255]');
		$val->add_field('description_stage', 'Description Stage', 'required');
		$val->add_field('environnement_dev', 'Environnement Dev', 'required');
		$val->add_field('observations_resp', 'Observations Resp', '');
		$val->add_field('indemnite', 'Indemnite', 'required|valid_string[numeric]');
		$val->add_field('entreprise', 'Entreprise', 'required|valid_string[numeric]');
		$val->add_field('responsable_tech', 'Responsable Tech', 'required|valid_string[numeric]');
		$val->add_field('responsable_adm', 'Responsable Adm', 'required|valid_string[numeric]');
		$val->add_field('contact_urgence', 'Contact Urgence', 'required|max_length[255]');
		$val->add_field('rpz_np', 'Rpz Np', 'required|max_length[255]');
		$val->add_field('rpz_adresse', 'Rpz Adresse', 'required|max_length[255]');
		$val->add_field('rpz_tel', 'Rpz Tel', 'required|max_length[255]');
		$val->add_field('origine_offre', 'Origine Offre', 'required|valid_string[numeric]');
		$val->add_field('type', 'Type', 'required|valid_string[numeric]');
		$val->add_field('langue', 'Langue', 'required|valid_string[numeric]');
		$val->add_field('duree', 'Duree', 'required|valid_string[numeric]');
		$val->add_field('date_debut', 'Date Debut', 'required');
		$val->add_field('date_fin', 'Date Fin', 'required');
		$val->add_field('allongee', 'Allongee', 'required|valid_string[numeric]');
		$val->add_field('nb_jour_semaine', 'Nb Jour Semaine', 'required|valid_string[numeric]');
		$val->add_field('horaire_hebdo', 'Horaire Hebdo', 'required|valid_string[numeric]');
		$val->add_field('retribution', 'Retribution', 'valid_string[numeric]');
		$val->add_field('nature', 'Nature', 'max_length[255]');
		$val->add_field('etat', 'Etat', 'valid_string[numeric]');
		$val->add_field('last_edit', 'Last Edit', 'date');

		return $val;
	}
	
	protected static function pre_find(&$query)
	{
	    // alter the query
	    $query->order_by('last_edit', 'desc');
	}

	public static function post_find($result)
	{
	    if($result !== null)
	    {
	        foreach ($result as $value) {
				if (!empty($value->entreprise)) {
		        	$entreprise = DB::select('nom', 'ville', 'pays', 'url_entreprise', 'adresse')->from('entreprise')->where('id', $value->entreprise)->execute();
		        	$ent_nom = $entreprise->get('nom');
		        	$id_ville = $entreprise->get('ville');
		        	$id_pays = $entreprise->get('pays');
		        	$ent_url = $entreprise->get('url_entreprise');
		        	$ent_adresse = $entreprise->get('adresse');
		        	if ((!empty($entreprise)) AND (!empty($ent_nom)) AND (!empty($id_ville)) AND (!empty($id_pays))) {
		        		$ent_ville = Model_Ville::find_one_by_id($id_ville)->nom;
		        		$ent_code = Model_Ville::find_one_by_id($id_ville)->code_postal;
						$ent_pays = Model_Pays::find_one_by_id($id_pays)->nom;
		        		$value->set(array(
					    	'ent_nom' => $ent_nom,
					    	'ent_ville' => $ent_ville,
					    	'ent_pays' => $ent_pays,
					    	'ent_pays_id' => $id_pays,
					    	'ent_url' => $ent_url,
					    	'ent_adresse' => $ent_adresse,
					    	'ent_code' => $ent_code,
							));
					}
				}
				if (!empty($value->enseignant)) {
					$enseignant = DB::select('nom', 'prenom')->from('enseignant')->where('id', $value->enseignant)->execute();
					$enseignant_np = $enseignant->get('prenom')." ".$enseignant->get('nom');
		        	if(!empty($enseignant_np)) {
		        		$value->set(array(
					    	'enseignant_np' => $enseignant_np,
							));
					}
				}
				if (!empty($value->etudiant)) {
					$etudiant = DB::select('no_etudiant', 'nom', 'prenom', 'adresse1', 'ville1')->from('etudiant')->where('id', $value->etudiant)->execute();
					$no_etudiant = $etudiant->get('no_etudiant');
					$etudiant_np = $etudiant->get('prenom')." ".$etudiant->get('nom');
					$etudiant_adr = $etudiant->get('adresse1')." ".$etudiant->get('ville1');
		        	if(!empty($no_etudiant)) {
		        		$value->set(array(
					    	'no_etudiant' => $no_etudiant,
					    	'etudiant_np' => $etudiant_np,
					    	'etudiant_adr' => $etudiant_adr,
							));
					}
				}
				if (!empty($value->stage)) {
					$stage = DB::select('conditions')->from('stage')->where('id', $value->stage)->execute();
					$stage_cond = $stage->get('conditions');
		        	if(!empty($enseignant_np)) {
		        		$value->set(array(
					    	'stage_cond' => $stage_cond,
							));
					}
				}
				if (!empty($value->responsable_tech)) {
					$contact = DB::select('nom', 'prenom', 'telephone', 'email')->from('contact')->where('id', $value->responsable_tech)->execute();
					$contact_nom = $contact->get('nom');
					$contact_prenom = $contact->get('prenom');
					$contact_tel = $contact->get('telephone');
					$contact_email = $contact->get('email');
					if (!empty($contact)) {
		        		if (!empty($contact_nom)) {
		        		$value->set(array(
					    	'responsable_tech_nom' => $contact_nom,
							));
						}
						if (!empty($contact_prenom)) {
		        		$value->set(array(
					    	'responsable_tech_prenom' => $contact_prenom,
							));
						}
						if ((!empty($contact_nom)) AND (!empty($contact_tel))) {
		        		$value->set(array(
					    	'responsable_tech_np' => $contact_nom.' '.$contact_prenom,
							));
						}
						if (!empty($contact_tel)) {
		        		$value->set(array(
					    	'responsable_tech_tel' => $contact_tel,
							));
						}
						if(!empty($contact_email)) {
		        		$value->set(array(
					    	'responsable_tech_email' => $contact_email,
							));
						}
					}
				}
				if (!empty($value->responsable_adm)) {
					$contact = DB::select('nom', 'prenom', 'telephone', 'email')->from('contact')->where('id', $value->responsable_adm)->execute();
					$contact_nom = $contact->get('nom');
					$contact_prenom = $contact->get('prenom');
					$contact_tel = $contact->get('telephone');
					$contact_email = $contact->get('email');
		        	if (!empty($contact)) {
		        		if (!empty($contact_nom)) {
		        		$value->set(array(
					    	'responsable_adm_nom' => $contact_nom,
							));
						}
						if (!empty($contact_prenom)) {
		        		$value->set(array(
					    	'responsable_adm_prenom' => $contact_prenom,
							));
						}
						if ((!empty($contact_nom)) AND (!empty($contact_tel))) {
		        		$value->set(array(
					    	'responsable_adm_np' => $contact_nom.' '.$contact_prenom,
							));
						}
						if (!empty($contact_tel)) {
		        		$value->set(array(
					    	'responsable_adm_tel' => $contact_tel,
							));
						}
						if(!empty($contact_email)) {
		        		$value->set(array(
					    	'responsable_adm_email' => $contact_email,
							));
						}
					}
				}
			}
		}
		
		// return the result
	    return $result;
	}
}