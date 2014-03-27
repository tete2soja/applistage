<?php

class Model_Stage extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'etudiant',
		'contact',
		'enseignant',
		'entreprise',
		'sujet',
		'visibilite',
		'contexte',
		'resultats',
		'conditions',
		'url_doc',
		'public',
		'etat',
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
	protected static $_table_name = 'stage';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('etudiant', 'Etudiant', 'valid_string[numeric]');
		$val->add_field('contact', 'Contact', 'required|valid_string[numeric]');
		$val->add_field('enseignant', 'Enseignant', 'valid_string[numeric]');
		$val->add_field('entreprise', 'Entreprise', 'required|valid_string[numeric]');
		$val->add_field('sujet', 'Sujet', 'required');
		$val->add_field('visibilite', 'Visibilite', 'required|valid_string[numeric]');
		$val->add_field('contexte', 'Contexte', 'required');
		$val->add_field('resultats', 'Resultats', 'required');
		$val->add_field('conditions', 'Conditions', '');
		$val->add_field('url_doc', 'Url Doc', 'max_length[255]');
		$val->add_field('public', 'Public', 'required|valid_string[numeric]');
		$val->add_field('etat', 'etat', 'valid_string[numeric]');
		$val->add_field('date', 'Date', 'required');

		return $val;
	}
	
	protected static function pre_find(&$query)
	{
	    // alter the query
	    $query->order_by('date', 'desc');
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
					    	'ent_code' => $ent_code,
					    	'ent_pays' => $ent_pays,
					    	'ent_adresse' => $ent_adresse,
					    	'ent_url' => $ent_url,
							));
					}
				}
				if (!empty($value->etudiant)) {
					$no_etudiant = DB::select('no_etudiant')->from('etudiant')->where('id', $value->etudiant)->execute()->get('no_etudiant');
		        	if(!empty($no_etudiant)) {
		        		$value->set(array(
					    	'no_etudiant' => $no_etudiant,
							));
					}
				}
				if (!empty($value->contact)) {
					$contact = DB::select('nom', 'prenom', 'telephone', 'email')->from('contact')->where('id', $value->contact)->execute();
					$contact_np = $contact->get('prenom')." ".$contact->get('nom');
					$contact_tel = $contact->get('telephone');
					$contact_email = $contact->get('email');
		        	if (!empty($contact)) {
		        		if (!empty($contact_np)) {
		        		$value->set(array(
					    	'contact_nom' => $contact_np,
							));
						}
						if (!empty($contact_tel)) {
		        		$value->set(array(
					    	'contact_tel' => $contact_tel,
							));
						}
						if(!empty($contact_email)) {
		        		$value->set(array(
					    	'contact_email' => $contact_email,
							));
						}
					}
				}
				if (!empty($value->enseignant)) {
					$enseignant = DB::select('nom')->from('enseignant')->where('id', $value->enseignant)->execute()->get('nom');
		        	if(!empty($enseignant)) {
		        		$value->set(array(
					    	'enseignant_nom' => $enseignant,
							));
					}
				}
			}
		}
		
		// return the result
	    return $result;
	}
}
