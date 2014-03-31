<?php

class Controller_Enseignant extends Controller_Template
{
	public function before() {
		// check for admin
		parent::before();
		if ( ! Auth::check())
		{
			Response::redirect('/util/connexion');
		}
		else {
			$id_info = Auth::get_groups();
			foreach ($id_info as $info) {
				if (($info[1] != "3")&&($info[1] != "10")) {
					Response::redirect('/util/connexion');
					break;
				}
			}
		}
	}

	public function action_index() {
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/index', $data);
	}

	public function action_suivi() {	
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Suivi';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/suivi', $data);
	}

	public function action_espace() {	
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Documents';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/espace', $data);
	}

	public function action_voeux() {
		$data['stages'] = Model_Stage::find_all();		
		$enseignant = DB::select('voeux_1', 'voeux_2', 'voeux_3')->from('enseignant')->where('email', Auth::get('username'))->execute();
		$data['voeux_1'] = $enseignant->get('voeux_1');
		$data['voeux_2'] = $enseignant->get('voeux_2');
		$data['voeux_3'] = $enseignant->get('voeux_3');
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Voeux';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/voeux', $data);
		if (isset($_POST['postuler'])) {
			$id = $_POST['postuler'];
			$enseignant = DB::select('voeux_1', 'voeux_2', 'voeux_3')->from('enseignant')->where('email', Auth::get('username'))->execute();
			$voeux_1 = $enseignant->get('voeux_1');
			$voeux_2 = $enseignant->get('voeux_2');
			$voeux_3 = $enseignant->get('voeux_3');
			if ($voeux_1 == null) {
				$query = DB::update('enseignant');
				$query->value('voeux_1', $id);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_2 == null) {
				$query = DB::update('enseignant');
				$query->value('voeux_2', $id);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_3 == null) {
				$query = DB::update('enseignant');
				$query->value('voeux_3', $id);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else
				Session::set_flash('error', 'Vosu avez déjà fait vos trois voeux.');
			Response::redirect('enseignant/voeux');
		}
		else if (isset($_POST['supprimer'])) {
			$id = $_POST['supprimer'];
			$enseignant = DB::select('voeux_1', 'voeux_2', 'voeux_3')->from('enseignant')->where('email', Auth::get('username'))->execute();
			$voeux_1 = $enseignant->get('voeux_1');
			$voeux_2 = $enseignant->get('voeux_2');
			$voeux_3 = $enseignant->get('voeux_3');
			if ($voeux_1 == $id) {
				$query = DB::update('enseignant');
				$query->value('voeux_1', null);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_2 == $id) {
				$query = DB::update('enseignant');
				$query->value('voeux_2', null);
				$query->where('email', Auth::get('username'));
				$query->execute();
			}
			else if ($voeux_3 == $id) {
				$query = DB::update('enseignant');
				$query->value('voeux_3', null);
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
		$this->template->title = 'Enseignant &raquo; Stagiaires';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/stagiaires', $data);
	}

}
