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
		$val->add_field('sujet', 'Sujet', 'required|max_length[255]');
		$val->add_field('visibilite', 'Visibilite', 'required|valid_string[numeric]');
		$val->add_field('contexte', 'Contexte', 'required|max_length[255]');
		$val->add_field('resultats', 'Resultats', 'required|max_length[255]');
		$val->add_field('conditions', 'Conditions', 'max_length[255]');
		$val->add_field('url_doc', 'Url Doc', 'max_length[255]');
		$val->add_field('public', 'Public', 'required|valid_string[numeric]');
		$val->add_field('valide', 'Valide', 'required|valid_string[numeric]');
		$val->add_field('date', 'Date', 'required');

		return $val;
	}
	
	public static function post_find($result)
	{
	    if($result !== null)
	    {
	        foreach ($result as $value) {
		        //$value['entreprise'] = Model_Entreprise::find_one_by('id', $value['id'])->nom;
	        }
	    }
	
	    // return the result
	    return $result;
	}
}
