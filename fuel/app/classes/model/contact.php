<?php

class Model_Contact extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'nom',
		'prenom',
		'telephone',
		'email',
		'ville',
		'pays',
		'entreprise',
		'encadre',
		'signe',
		'propose',
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
	protected static $_table_name = 'contact';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('nom', 'Nom', 'required|max_length[255]');
		$val->add_field('prenom', 'Prenom', 'required|max_length[255]');
		$val->add_field('telephone', 'Telephone', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('ville', 'Ville', 'required|valid_string[numeric]');
		$val->add_field('pays', 'Pays', 'required|valid_string[numeric]');
		$val->add_field('entreprise', 'Entreprise', 'required|valid_string[numeric]');
		$val->add_field('encadre', 'Encadre', 'required|valid_string[numeric]');
		$val->add_field('signe', 'Signe', 'required|valid_string[numeric]');
		$val->add_field('propose', 'Propose', 'required|valid_string[numeric]');

		return $val;
	}

}
