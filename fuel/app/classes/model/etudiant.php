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
}