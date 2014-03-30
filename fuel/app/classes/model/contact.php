<?php

class Model_Contact extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'nom',
		'prenom',
		'telephone',
		'email',
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
		$val->add_field('entreprise', 'Entreprise', 'required|valid_string[numeric]');
		$val->add_field('encadre', 'Encadre', 'required|valid_string[numeric]');
		$val->add_field('signe', 'Signe', 'required|valid_string[numeric]');
		$val->add_field('propose', 'Propose', 'required|valid_string[numeric]');

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
				if (!empty($value->entreprise)) {
					$entreprise = Model_Entreprise::find_one_by_id($value->entreprise)->nom;
	        		$value->set(array(
				    	'ent_nom' => $entreprise,
						));
				}
			}
		}
		
		// return the result
	    return $result;
		
	}

}
