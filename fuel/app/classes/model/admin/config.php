<?php
class Model_Admin_Config extends Model_Crud
{
	protected static $_table_name = 'config';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('colonne_1', 'Colonne 1', 'required|max_length[255]');
		$val->add_field('colonne_2', 'Colonne 2', 'required|max_length[255]');
		$val->add_field('colonne_3', 'Colonne 3', 'required|max_length[255]');
		$val->add_field('colonne_4', 'Colonne 4', 'required|max_length[255]');
		$val->add_field('colonne_5', 'Colonne 5', 'required|max_length[255]');
		$val->add_field('colonne_6', 'Colonne 6', 'required');
		$val->add_field('colonne_7', 'Colonne 7', 'required|max_length[255]');
		$val->add_field('colonne_8', 'Colonne 8', 'required|max_length[255]');
		$val->add_field('colonne_9', 'Colonne 9', 'required|max_length[255]');
		$val->add_field('colonne_10', 'Colonne 10', 'required|max_length[255]');
		$val->add_field('colonne_11', 'Colonne 11', 'required|max_length[255]');
		$val->add_field('colonne_12', 'Colonne 12', 'required|max_length[255]');
		$val->add_field('colonne_13', 'Colonne 13', 'required|max_length[255]');
		$val->add_field('colonne_14', 'Colonne 14', 'required|max_length[255]');
		$val->add_field('colonne_15', 'Colonne 15', 'required|max_length[255]');
		$val->add_field('colonne_16', 'Colonne 16', 'required|max_length[255]');
		$val->add_field('colonne_17', 'Colonne 17', 'required|max_length[255]');
		$val->add_field('colonne_18', 'Colonne 18', 'required');
		$val->add_field('colonne_20', 'Colonne 20', 'required|max_length[255]');
		$val->add_field('colonne_21', 'Colonne 21', 'required|max_length[255]');
		$val->add_field('colonne_22', 'Colonne 22', 'required|max_length[255]');
		$val->add_field('colonne_23', 'Colonne 23', 'required|max_length[255]');
		$val->add_field('colonne_24', 'Colonne 24', 'required|max_length[255]');
		$val->add_field('remuneration', 'Remuneration', 'required|max_length[255]');
		$val->add_field('date_debut', 'Date Debut', 'required');
		$val->add_field('date_fin', 'Date Fin', 'required');
		$val->add_field('date_debut_lp', 'Date Debut', 'required');
		$val->add_field('date_fin_lp', 'Date Fin', 'required');
		$val->add_field('annee_courante', 'Annee Courante', 'required');
		$val->add_field('password', 'Mot de passe', 'required|max_length[255]');

		return $val;
	}

}
