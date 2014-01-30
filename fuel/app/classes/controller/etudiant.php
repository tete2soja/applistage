<?php

class Controller_Etudiant extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Index';
		$this->template->content = View::forge('etudiant/index', $data);
	}

	public function action_convention()
	{
		$data["subnav"] = array('convention'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Convention';
		$this->template->content = View::forge('etudiant/convention', $data);
	}

	public function action_realisation()
	{
		$data["subnav"] = array('realisation'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Realisation';
		$this->template->content = View::forge('etudiant/realisation', $data);
	}

	public function action_recherche()
	{
		$data["subnav"] = array('recherche'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Recherche';
		$this->template->content = View::forge('etudiant/recherche', $data);
	}

	public function action_soutenance()
	{
		$data["subnav"] = array('soutenance'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Soutenance';
		$this->template->content = View::forge('etudiant/soutenance', $data);
	}

	public function action_formulaire()
	{
		$data["subnav"] = array('formulaire'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Formulaire';
		$this->template->content = View::forge('etudiant/formulaire', $data);
	}

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Connexion';
		$this->template->content = View::forge('etudiant/connexion', $data);
	}

}
