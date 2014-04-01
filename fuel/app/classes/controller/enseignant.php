<?php

class Controller_Enseignant extends Controller_Template
{
	public function before() {
		// Vérifie si un utilisateur est loggué
		parent::before();
		if ( ! Auth::check()) // Si faux, redirige vers la page de connexion
		{
			Response::redirect('/util/connexion');
		}
		else {
			$id_info = Auth::get_groups();
			foreach ($id_info as $info) { // Si un utilisatuer est loggué mais pas 'enseignant' ou 'admin', on redirige
				if (($info[1] != "3")&&($info[1] != "10")) {
					Response::redirect('/util/connexion');
					break;
				}
			}
		}
	}

	public function action_index() {
		$data["subnav"] = array('index'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Enseignant &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/index', $data);
	}

	public function action_suivi() {	
		$data["subnav"] = array('index'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Enseignant &raquo; Suivi';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/suivi', $data);
	}

	public function action_espace() {	
		$data["subnav"] = array('index'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Enseignant &raquo; Documents';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/espace', $data);
	}

	public function action_voeux() {
		$data['stages'] = Model_Stage::find_all(); // On récupère l'ensemble des stages
		// On récupère les trois voeux que l'enseignant a pu faire (via son mail)
		$enseignant = DB::select('voeux_1', 'voeux_2', 'voeux_3')->from('enseignant')->where('email', Auth::get('username'))->execute();
		$data['voeux_1'] = $enseignant->get('voeux_1');
		$data['voeux_2'] = $enseignant->get('voeux_2');
		$data['voeux_3'] = $enseignant->get('voeux_3');
		$data["subnav"] = array('index'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Enseignant &raquo; Voeux';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/voeux', $data);
		if (isset($_POST['postuler'])) {
			$id = $_POST['postuler']; // On récupère l'id du voeu souhaité
			$enseignant = DB::select('voeux_1', 'voeux_2', 'voeux_3')->from('enseignant')->where('email', Auth::get('username'))->execute();
			$voeux_1 = $enseignant->get('voeux_1');
			$voeux_2 = $enseignant->get('voeux_2');
			$voeux_3 = $enseignant->get('voeux_3');
			if ($voeux_1 == null) { // Si le voeu 1 est null
				$query = DB::update('enseignant');
				$query->value('voeux_1', $id);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_2 == null) { // Si le voeu 2 est null
				$query = DB::update('enseignant');
				$query->value('voeux_2', $id);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_3 == null) { // Si le veux 3 est null
				$query = DB::update('enseignant');
				$query->value('voeux_3', $id);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else // Si tout les voeux sont déjà pris
				Session::set_flash('error', 'Vosu avez déjà fait vos trois voeux.');
			Response::redirect('enseignant/voeux');
		}
		else if (isset($_POST['supprimer'])) {
			$id = $_POST['supprimer']; // On récupère l'id du voeu souhaité
			$enseignant = DB::select('voeux_1', 'voeux_2', 'voeux_3')->from('enseignant')->where('email', Auth::get('username'))->execute();
			$voeux_1 = $enseignant->get('voeux_1');
			$voeux_2 = $enseignant->get('voeux_2');
			$voeux_3 = $enseignant->get('voeux_3');
			if ($voeux_1 == $id) { // Si c'est le voeu 1
				$query = DB::update('enseignant');
				$query->value('voeux_1', null); // On le met a 'null'
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_2 == $id) { // Si c'est le voeu 2
				$query = DB::update('enseignant');
				$query->value('voeux_2', null); // On le met a 'null'
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_3 == $id) { // Si c'est le voeu 3
				$query = DB::update('enseignant');
				$query->value('voeux_3', null); // On le met a 'null'
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else
				Session::set_flash('error', 'Vosu avez déjà fait vos trois voeux.');
			Response::redirect('enseignant/voeux');
		}
	}

	public function action_stagiaires() {	
		$data["subnav"] = array('index'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Enseignant &raquo; Stagiaires';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/stagiaires', $data);
	}

}
