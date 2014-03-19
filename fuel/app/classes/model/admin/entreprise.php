<?php
class Model_Admin_Entreprise extends Model_Crud
{
	protected static $_table_name = 'entreprise';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('nom', 'Nom', 'required|max_length[255]');
		$val->add_field('adresse', 'Adresse', 'required|max_length[255]');
		$val->add_field('ville', 'Ville', 'required|valid_string[numeric]');
		$val->add_field('pays', 'Pays', 'required|valid_string[numeric]');
		$val->add_field('url_entreprise', 'Url Entreprise', 'required|max_length[255]');
		$val->add_field('stagiaire', 'Stagiaire', 'required|valid_string[numeric]');

		return $val;
	}

}
