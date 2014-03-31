<?php

class Controller_Util extends Controller_Template
{

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Connexion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Connexion';
		$this->template->content = View::forge('util/connexion', $data);
		if (isset($_POST['submit'])) {
			// validate the a username and password
			$name = $_POST['id'];
			$pass = $_POST['password'];
			if (Auth::login($name, $pass)) {
				if (isset($_POST['remember'])) {
					Auth::remember_me();
				}
				$id_info = Auth::get_groups();
				foreach ($id_info as $info) {
					if ($info[1] == "10") {
						Response::redirect('/admin/');
						break;
					}
					else if ($info[1] == "11") {
						Response::redirect('/admin/import');
						break;						
					}
					else if ($info[1] == "2") {
						Response::redirect('/etudiant/');
						break;
					}					
					else if ($info[1] == "3") {
						Response::redirect('/enseignant/');
						break;
					}
				}
			}
			else {
				$password_to_db = Auth::instance()->hash_password($pass);
				print $password_to_db;
				Session::set_flash('error', 'Les informations rentrées ne correspondent pas à un utilisateur valide.');
			}
		}
	}

	public function action_password()
	{
		if ( ! Auth::check())
		{
		    Response::redirect('/util/connexion');
		}
		$data["subnav"] = array('Changer mon mot de passe'=> 'active' );
		$this->template->title = 'Changer mon mot de passe';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Changer mon mot de passe';
		$this->template->content = View::forge('util/password', $data);
		if (isset($_POST['submit'])) {
			$pass_back = $_POST['password_back'];
			$pass_new = $_POST['password_new'];
			$pass_new_check = $_POST['password_new_check'];
			if ($pass_new_check == $pass_new) {
				Auth::change_password($pass_back, $pass_new);
			}
			Session::set_flash('success', 'Mise à jour de vos informations avec succès');
		}
	}

	public function action_compte()
	{
		if ( ! Auth::check())
		{
		    Response::redirect('/util/connexion');
		}
		$data["subnav"] = array('Mon compte'=> 'active' );
		$this->template->title = 'Mon compte';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Mon compte';
		$this->template->content = View::forge('util/compte', $data);
	}

	public function action_information()
	{
		if ( ! Auth::check())
		{
		    Response::redirect('/util/connexion');
		}

		$email = Auth::get_email();
		$id_info = Auth::get_groups();
		try {
			foreach ($id_info as $info) {
				if ($info[1] == "2") {
					break;
				}
				else if ($info[1] == "3") {
					break;
				}
			}
			$tmp = serialize($query);
			list($null, $tmp) = explode(';s:', $tmp, 2);
			list($null, $tmp) = explode(':"', $tmp, 2);
			list($tmp, $null) = explode('";', $tmp, 2);
			foreach ($id_info as $info) {
				if ($info[1] == "2") {
					$query = DB::query('SELECT `nom` FROM `etudiant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();
					$query2 = DB::query('SELECT `prenom` FROM `etudiant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();
					$tmp = serialize($query);
					$tmp2 = serialize($query2);
					break;
				}
				else if ($info[1] == "3") {
					$query = DB::query('SELECT `nom` FROM `enseignant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();
					$query2 = DB::query('SELECT `prenom` FROM `enseignant` WHERE ' . '`email` = \''. $email . '\'')->execute()->as_array();			
					$tmp = serialize($query);
					$tmp2 = serialize($query2);
					break;
				}
			}
			list($null, $tmp) = explode(';s:', $tmp, 2);
			list($null, $tmp) = explode(':"', $tmp, 2);
			list($tmp, $null) = explode('";', $tmp, 2);
			list($null, $tmp2) = explode(';s:', $tmp2, 2);
			list($null, $tmp2) = explode(':"', $tmp2, 2);
			list($tmp2, $null) = explode('";', $tmp2, 2);
		} catch (Exception $e) {
			$tmp = "";
			$tmp2 = "";
		}
		$data["nom"] = $tmp;
		$data["prenom"] = $tmp2;
		$data["phone"] = Auth::get('telephone');
		$data["email"] = Auth::get_email();
		$last = Auth::get('last_login');
		$data["datetime"] = date('H:i:s d-m-Y', $last);
		$data["subnav"] = array('Mon compte'=> 'active' );
		$this->template->title = 'Mon compte';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Mon compte';
		$this->template->content = View::forge('util/information', $data);
		if (isset($_POST['submit'])) {
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$email = $_POST['email'];
			$telephone = $_POST['telephone'];
			Auth::update_user(
				array(
					'nom'		=>	$nom,
					'prenom'	=>	$prenom,
					'email'     => $email,
					'telephone'	=> $telephone,
				)
			);
			Session::set_flash('success', 'Mise à jour de vos informations avec succès');
		}
	}

	public function action_logout()
	{
		Auth::logout();
		$data["subnav"] = array('Mon compte'=> 'active' );
		$this->template->title = 'Mon compte';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Mon compte';
		$this->template->content = View::forge('util/logout', $data);
	}

	public function action_index()
	{
		Response::redirect('/index');
	}
}