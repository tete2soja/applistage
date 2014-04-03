<?php

class Controller_Util extends Controller_Template
{

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->link_header = '/';
		$this->template->title = 'Connexion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Connexion';
		$this->template->content = View::forge('util/connexion', $data);
		if (isset($_POST['submit'])) {
			// On récupère l'id et le password rentrés
			$name = $_POST['id'];
			$pass = $_POST['password'];
			if (Auth::login($name, $pass)) { // Si ils correspondent à un utilisateur valide
				$id_info = Auth::get_groups();
				foreach ($id_info as $info) {
					if ($info[1] == "10") {
						if (isset($_POST['remember'])) {
							Auth::remember_me();
						}
						Response::redirect('/admin/');
						break;
					}
					else if ($info[1] == "11") {
						if (isset($_POST['remember'])) {
							Auth::remember_me();
						}
						Response::redirect('/admin/import');
						break;						
					}
					else if ($info[1] == "1") {
						if (isset($_POST['remember'])) {
							Auth::remember_me();
						}
						Response::redirect('/etudiant/');
						break;
					}
					else if ($info[1] == "2") {
						if (isset($_POST['remember'])) {
							Auth::remember_me();
						}
						Response::redirect('/etudiant/');
						break;
					}					
					else if ($info[1] == "3") {
						if (isset($_POST['remember'])) {
							Auth::remember_me();
						}
						Response::redirect('/enseignant/');
						break;
					}
				}
			}
			else {
				Session::set_flash('error', 'Les informations saisies ne correspondent pas à un utilisateur valide.');
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
		$this->template->link_header = 'util/compte';
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
		$this->template->link_header = 'util/compte';
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

		$no_etudiant = Auth::get('username');
		$email = Auth::get('email');
		$id_info = Auth::get_groups();
			foreach ($id_info as $info) {
				if ($info[1] == "2") {
					$nom = Model_Etudiant::find_one_by('no_etudiant', $no_etudiant)->nom;
					$prenom = Model_Etudiant::find_one_by('no_etudiant', $no_etudiant)->prenom;
					break;
				}
				else if ($info[1] == "3") {
					$nom = Model_Enseignant::find_one_by('email', $email)->nom;
					$prenom = Model_Enseignant::find_one_by('email', $email)->prenom;
					break;
				}
			}
		$telephone = Auth::get_profile_fields()['telephone'];
		$data["nom"] = $nom;
		$data["prenom"] = $prenom;
		$data["phone"] = $telephone;
		$data["email"] = $email;
		$last = Auth::get('last_login');
		$data["datetime"] = date('H:i:s d-m-Y', $last);
		$data["subnav"] = array('Mon compte'=> 'active' );
		$this->template->link_header = 'util/compte';
		$this->template->title = 'Mon compte';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Mon compte';
		$this->template->content = View::forge('util/information', $data);
		if (isset($_POST['submit'])) {
			$tmp = Auth::get_groups();
			if (($tmp[0][1] == 1) OR ($tmp[0][1] == 2)) {
				$query = DB::update('etudiant');
				$query->value('nom', Input::post('nom'));
				$query->value('prenom', Input::post('prenom'));
				$query->value('email', Input::post('email'));
				$query->where('no_etudiant', Auth::get('username'));
				$query->execute();
			}
			else if ($tmp[0][1] == 3) {
				$query = DB::update('enseignant');
				$query->value('nom', Input::post('nom'));
				$query->value('prenom', Input::post('prenom'));
				$query->where('email', Auth::get('email'));
				$query->execute();
			}
			Auth::update_user(
				array(
					'email'     => Input::post('email'),
					'telephone'	=> Input::post('telephone'),
				)
			);
			Session::set_flash('success', 'Mise à jour de vos informations avec succès');
			Response::redirect('/util/compte');
		}
	}

	public function action_logout()
	{
		Auth::logout();
		$data["subnav"] = array('Mon compte'=> 'active' );
		$this->template->link_header = '/';
		$this->template->title = 'Mon compte';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Mon compte';
		$this->template->content = View::forge('util/logout', $data);
	}

	public function action_index()
	{
		Response::redirect('/');
	}
}