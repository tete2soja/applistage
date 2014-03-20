<?php
class Model_Admin_Stage extends Model_Crud
{
	protected static $_table_name = 'stage';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('etudiant', 'Etudiant', 'required|valid_string[numeric]');
		$val->add_field('contact', 'Contact', 'required|valid_string[numeric]');
		$val->add_field('enseignant', 'Enseignant', 'required|valid_string[numeric]');
		$val->add_field('entreprise', 'Entreprise', 'required|valid_string[numeric]');
		$val->add_field('sujet', 'Sujet', 'required|max_length[255]');
		$val->add_field('visibilite', 'Visibilite', 'required|valid_string[numeric]');
		$val->add_field('contexte', 'Contexte', 'required|max_length[255]');
		$val->add_field('resultats', 'Resultats', 'required|max_length[255]');
		$val->add_field('conditions', 'Conditions', 'required|max_length[255]');
		$val->add_field('url_doc', 'Url Doc', 'required|max_length[255]');
		$val->add_field('public', 'Public', 'required|valid_string[numeric]');
		$val->add_field('valide', 'Valide', 'required|valid_string[numeric]');
		$val->add_field('date', 'Date', 'required');

		return $val;
	}

}
