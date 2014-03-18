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
				if ($info[1] != "3") {
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
		$this->template->title = 'Enseignant &raquo; Suivi';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/espace', $data);
	}

	public function action_voeux() {	
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Suivi';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/voeux', $data);
	}

	public function action_stagiaires() {	
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Suivi';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/stagiaires', $data);
	}

}
