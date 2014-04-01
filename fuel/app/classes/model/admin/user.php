<?php
class Model_Admin_User extends Model_Crud
{
	protected static $_table_name = 'users';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('username', 'Username', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('password', 'Password', 'required|max_length[255]');
		$val->add_field('telephone', 'Telephone', 'max_length[255]');
		$val->add_field('group', 'Group', 'required|valid_string[numeric]');
		$val->add_field('last_login', 'Last Login', 'max_length[255]');
		$val->add_field('login_hash', 'Login Hash', 'max_length[255]');
		$val->add_field('updated_at', 'Updated At', 'valid_string[numeric]');
		$val->add_field('profile_fields', 'Profile Fields', 'max_length[255]');
		$val->add_field('created_at', 'Created At', 'valid_string[numeric]');

		return $val;
	}

}
