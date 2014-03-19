<?php
class Model_Admin_Etudiant extends Model_Crud
{
	protected static $_table_name = 'admin_etudiants';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('no_etudiant', 'No Etudiant', 'required|valid_string[numeric]');
		$val->add_field('nom', 'Nom', 'required|max_length[255]');
		$val->add_field('prenom', 'Prenom', 'required|max_length[255]');
		$val->add_field('datedenaissance', 'Datedenaissance', 'required');
		$val->add_field('sexe', 'Sexe', 'required|valid_string[numeric]');
		$val->add_field('bac', 'Bac', 'required|max_length[255]');
		$val->add_field('mention', 'Mention', 'required|max_length[255]');
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
