<?php

class Controller_Index extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Accueil Applistage 2014';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Bienvenue !';
		$this->template->index = 'index';
		$this->template->content = View::forge('index', $data);
	}

}
