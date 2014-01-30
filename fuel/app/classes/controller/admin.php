<?php

class Controller_Admin extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Admin &raquo; Index';
		$this->template->content = View::forge('admin/index', $data);
	}

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Admin &raquo; Connexion';
		$this->template->content = View::forge('admin/connexion', $data);
	}

	public function action_import()
	{
		$data["subnav"] = array('import'=> 'active' );
		$this->template->title = 'Admin &raquo; Import';
		$this->template->content = View::forge('admin/import', $data);
	}

	public function action_edit()
	{
		$data["subnav"] = array('edit'=> 'active' );
		$this->template->title = 'Admin &raquo; Edit';
		$this->template->content = View::forge('admin/edit', $data);
	}

	public function action_view()
	{
		$data["subnav"] = array('view'=> 'active' );
		$this->template->title = 'Admin &raquo; View';
		$this->template->content = View::forge('admin/view', $data);
	}

	public function action_create()
	{
		$data["subnav"] = array('create'=> 'active' );
		$this->template->title = 'Admin &raquo; Create';
		$this->template->content = View::forge('admin/create', $data);
	}

	public function action_edit()
	{
		$data["subnav"] = array('edit'=> 'active' );
		$this->template->title = 'Admin &raquo; Edit';
		$this->template->content = View::forge('admin/edit', $data);
	}

	public function action__form()
	{
		$data["subnav"] = array('_form'=> 'active' );
		$this->template->title = 'Admin &raquo;  form';
		$this->template->content = View::forge('admin/_form', $data);
	}

}
