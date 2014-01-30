<?php

class Controller_Entreprise extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Entreprise &raquo; Index';
		$this->template->content = View::forge('entreprise/index', $data);
	}

	public function action_proposition()
	{
		$data["subnav"] = array('proposition'=> 'active' );
		$this->template->title = 'Entreprise &raquo; Proposition';
		$this->template->content = View::forge('entreprise/proposition', $data);
	}

	public function action_formulaire()
	{
		$data["subnav"] = array('formulaire'=> 'active' );
		$this->template->title = 'Entreprise &raquo; Formulaire';
		$this->template->content = View::forge('entreprise/formulaire', $data);
	}

}
