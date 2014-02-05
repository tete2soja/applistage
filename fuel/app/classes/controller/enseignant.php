<?php

class Controller_Enseignant extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/index', $data);
	}

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Enseignant &raquo; Connexion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Enseignant';
		$this->template->content = View::forge('enseignant/connexion', $data);
	}

}
