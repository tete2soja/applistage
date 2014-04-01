<?php

class Model_Etudiant extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'no_etudiant',
		'nom',
		'prenom',
		'datenaissance',
		'sexe',
		'bac',
		'bac_mention',
		'bac_annee',
		'email',
		'adresse1',
		'ville1',
		'adresse2',
		'ville2',
		'telephone1',
		'telephone2',
		'iut_annee',
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
	protected static $_table_name = 'etudiant';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('no_etudiant', 'No Etudiant', 'required|valid_string[numeric]');
		$val->add_field('nom', 'Nom', 'required|max_length[255]');
		$val->add_field('prenom', 'Prenom', 'required|max_length[255]');
		$val->add_field('datenaissance', 'Datenaissance', 'required');
		$val->add_field('sexe', 'Sexe', 'required|valid_string[numeric]');
		$val->add_field('bac', 'Bac', 'required|max_length[255]');
		$val->add_field('bac_mention', 'Bac mention', 'required|max_length[255]');
		$val->add_field('bac_annee', 'Bac Annee', 'required|valid_string[numeric]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('adresse1', 'Adresse1', 'required|max_length[255]');
		$val->add_field('ville1', 'Ville1', 'required|max_length[255]');
		$val->add_field('adresse2', 'Adresse2', 'required|max_length[255]');
		$val->add_field('ville2', 'Ville2', 'required|max_length[255]');
		$val->add_field('telephone1', 'Telephone1', 'required|max_length[255]');
		$val->add_field('telephone2', 'Telephone2', 'required|max_length[255]');
		$val->add_field('iut_annee', 'Iut Annee', 'required|valid_string[numeric]');

		return $val;
	}
	
	protected static function pre_find(&$query)
	{
	    // alter the query
	    $query->order_by('nom', 'asc');
	}
	
	public static function post_find($result)
	{
	    if($result !== null)
	    {
	    	foreach ($result as $value) {
	    		if(!empty($value->ville1)) {
					$id_ville1 = $value->ville1;
					$ville1 = Model_Ville::find_one_by_id($id_ville1)->nom;
	        		$code_postal1 = Model_Ville::find_one_by_id($id_ville1)->code_postal;
	        		$value->set(array(
				    	'ville1' => $ville1,
				    	'code_postal1' => $code_postal1,
						));
				}
				if (!empty($value->ville2)) {
					$id_ville2 = $value->ville2;
					$ville2 = Model_Ville::find_one_by_id($id_ville2)->nom;
					$code_postal2 = Model_Ville::find_one_by_id($id_ville2)->code_postal;
					$value->set(array(
				    	'ville2' => $ville2,
				    	'code_postal2' => $code_postal2,
						));
				}
				$etud = DB::select('id', 'etat')->from('fichestages')->where('etudiant', $value->id)->execute();
				$stage_id = $etud->get('id');
				$stage_etat = $etud->get('etat');
				if (!empty($etud)) {
					$value->set(array(
					    	'stage' => $stage_id,
					    	'stage_etat' => $stage_etat,
							));
				}
				$res = DB::select('id')->from('stage')->where('etudiant', $value->id)->execute();
				$stage_id = $res->get('id');
				if (!empty($res)) {
					$value->set(array(
					    	'stage_id' => $stage_id,
							));
				}
			}
	    }
	    
	    // return the result
	    return $result;
	    
	}
}