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
	
	public static function find_id($name_ent) {
		$ville = 10;
		$query = DB::query('SELECT `id` FROM `entreprise` WHERE UPPER(`nom`) = \''. $name_ent . '\' AND UPPER(`ville`) = ' . $ville . '')->execute()->as_array();
		return $query;
	}
	
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

}
