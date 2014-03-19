<?php
class Model_Admin_Enseignant extends Model_Crud
{
	protected static $_table_name = 'admin_enseignants';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('nom', 'Nom', 'required|max_length[255]');
		$val->add_field('prenom', 'Prenom', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');

		return $val;
	}

}
