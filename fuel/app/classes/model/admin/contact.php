<?php
class Model_Admin_Contact extends Model_Crud
{
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

}
