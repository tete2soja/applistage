<?php

class Controller_Util extends Controller_Template
{

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Admin &raquo; Connexion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Connexion';
		$this->template->content = View::forge('util/connexion', $data);
		if (isset($_POST['submit'])) {
			// validate the a username and password
			$name = $_POST['id'];
			$pass = $_POST['password'];
			if (Auth::login($name, $pass))
			{
			    // the combination of $name and $pass validated, print the users screen name
			    
			    $id_info = Auth::get_groups();
    			foreach ($id_info as $info)
    			{
				    if ($info[1] == "1") {
				    	Response::redirect('/admin/');
				    	break;
				    }
				    else if ($info[1] == "2") {
				    	Response::redirect('/etudiant/');
				    	break;
				    }
    			}
			}
			else {
				$password_to_db = Auth::instance()->hash_password($pass);
				print $password_to_db;
			}
		}
	}

}
