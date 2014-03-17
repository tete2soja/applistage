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
			print("iergioerh");
			// validate the a username and password
			$name = $_POST['id'];
			$pass = $_POST['password'];
			if (Auth::login($name, $pass)) {
				$id_info = Auth::get_groups();
				foreach ($id_info as $info) {
					if (($info[1] == "10")||($info[1] == "11")) {
						Response::redirect('/admin/');
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
		$data["subnav"] = array('Mon compte'=> 'active' );
		$this->template->title = 'Mon compte';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Mon compte';
		$this->template->content = View::forge('util/information', $data);
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