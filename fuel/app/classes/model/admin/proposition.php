<?php
class Model_Admin_Proposition extends Model_Crud
{
	protected static $_table_name = 'admin_propositions';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('sujet', 'Sujet', 'required|max_length[255]');
		$val->add_field('nomcontact', 'Nomcontact', 'required|max_length[255]');
		$val->add_field('publicproposition', 'Publicproposition', 'required|valid_string[numeric]');
		$val->add_field('contextestage', 'Contextestage', 'required|max_length[255]');
		$val->add_field('conditionstage', 'Conditionstage', 'required|max_length[255]');
		$val->add_field('proposition', 'Proposition', 'required|max_length[255]');
		$val->add_field('indemnite', 'Indemnite', 'required|valid_string[numeric]');
		$val->add_field('public', 'Public', 'required|valid_string[numeric]');
		$val->add_field('entreprise', 'Entreprise', 'required|valid_string[numeric]');

		return $val;
	}

}
