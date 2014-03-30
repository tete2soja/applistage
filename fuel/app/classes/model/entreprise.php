<?php

class Model_Entreprise extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'nom',
		'adresse',
		'ville',
		'pays',
		'url_entreprise',
		'stagiaire',
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
	
	protected static $_table_name = 'entreprise';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('nom', 'Nom', 'required|max_length[255]');
		$val->add_field('adresse', 'Adresse', 'required|max_length[255]');
		$val->add_field('ville', 'Ville', 'required|valid_string[numeric]');
		$val->add_field('pays', 'Pays', 'required|valid_string[numeric]');
		$val->add_field('url_entreprise', 'Url Entreprise', 'required|max_length[255]');
		$val->add_field('stagiaire', 'Stagiaire', 'valid_string[numeric]');

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
				if ((!empty($value->ville)) AND (!empty($value->pays))) {
					$id_ville = $value->ville;
					$id_pays = $value->pays;
					$ville = Model_Ville::find_one_by_id($id_ville)->nom;
	        		$pays = Model_Pays::find_one_by_id($id_pays)->nom;
	        		$code_postal = Model_Ville::find_one_by_id($id_ville)->code_postal;
	        		$value->set(array(
				    	'ville' => $ville,
				    	'pays' => $pays,
				    	'code_postal' => $code_postal,
						));
				}
				if (!empty($value->stagiaire)) {
					$id_stagiaire = $value->stagiaire;
	        		$nom_stagiaire = Model_Etudiant::find_one_by_id($id_stagiaire)->nom;
					$prenom_stagiaire = Model_Etudiant::find_one_by_id($id_stagiaire)->prenom;
					$no_stagiaire = Model_Etudiant::find_one_by_id($id_stagiaire)->no_etudiant;
					$value->set(array(
				    	'nom_stagiaire' => $nom_stagiaire,
				    	'prenom_stagiaire' => $prenom_stagiaire,
				    	'no_stagiaire' => $no_stagiaire,
						));
	        	}
			}
	    }
	    
	    // return the result
	    return $result;
	    
	}

}
