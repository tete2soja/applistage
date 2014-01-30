<?php

class Controller_Index extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Index &raquo; Index';
		$this->template->content = View::forge('index/index', $data);
	}

}
