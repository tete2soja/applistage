<?php

class Controller_Etudiant extends Controller_Template
{
	public function before()
	{
		// check for admin
		parent::before();
		if ( ! Auth::check())
		{
		    Response::redirect('/util/connexion');
		}
	}

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/index', $data);
		if ( ! Auth::check())
		{
		    Response::redirect('/etudiant/connexion');
		}
	}

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Admin &raquo; Connexion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('etudiant/connexion', $data);
		if (isset($_POST['submit'])) {
			// validate the a username and password
			$name = $_POST['id'];
			$pass = $_POST['password'];
			if (Auth::login($name, $pass))
			{
			    // the combination of $name and $pass validated, print the users screen name
			    Response::redirect('/etudiant/');
			}
			else {
				$password_to_db = Auth::instance()->hash_password($pass);
				print $password_to_db;
			}
		}
	}

	public function action_convention()
	{
		$data["subnav"] = array('convention'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Convention';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/convention', $data);
	}

	public function action_realisation()
	{
		$data["subnav"] = array('realisation'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Realisation';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/realisation', $data);
	}

	public function action_recherche()
	{
		$data["subnav"] = array('recherche'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Recherche';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/recherche', $data);
	}

	public function action_soutenance()
	{
		$data["subnav"] = array('soutenance'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Soutenance';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/soutenance', $data);
	}

	public function action_formulaire()
	{
		$data["subnav"] = array('formulaire'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Formulaire';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/formulaire', $data);

		if (isset($_POST['submit'])) {
			$sujet = $_POST['sujetStage'];
			$nomcontact = $_POST['resT_nom'];
			$publicproposition = $_POST['albumimg'];
			$contextestage = $_POST['description_sujet'];
			$conditionstage = $_POST['annee'];
			$proposition = $_POST['playlist'];
			$indemnite = $_POST['retribution'];
			$public = $_POST['playlist'];
			//ENTREPRISE
			//$query = DB::query('INSERT INTO `fichestages` VALUES ("' . $id . '","' . $nom . '","' . $code . '","' . $pays . '")')->execute();
			//print "Formulaire envoyé avec succès";
		}
	}
	
	public function action_proposition()
	{
		$data['stages'] = Model_Stage::find_all();
		$data["subnav"] = array('proposition'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Proposition de Stage';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/proposition', $data);
	}

}
