<?php

class Controller_Admin extends Controller_Template
{
	public function before()
	{
		// check for admin
		parent::before();
		if ( ! Auth::check())
		{
		    Response::redirect('/util/connexion');
		}
		else {
			$id_info = Auth::get_groups();
    		foreach ($id_info as $info)	{
			    if (($info[1] != "10")&&($info[1] != "11")) {
			    	Response::redirect('/util/connexion');
			    	break;
			    }
    		}
		}
	}

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Admin &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/index', $data);
	}

	public function action_import()
	{

		$data["subnav"] = array('import'=> 'active' );
		$this->template->title = 'Admin &raquo; Import';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/import', $data);
		if (isset($_POST['submit'])) {
			//Import uploaded file to Database
			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
					$tmp = $data[$i];
					list($id,$nom,$code,$pays) = explode(";", $tmp);
					$query = DB::query('INSERT INTO `ville` VALUES ("' . $id . '","' . $nom . '","' . $code . '","' . $pays . '")')->execute();
				}
				$query = DB::query('SELECT * FROM `ville`')->execute();
			}
			fclose($handle);
			print "Import done";
		}
		elseif (isset($_POST['etudiant'])) {
			$pays = DB::query('SELECT * FROM `etudiant`')->execute()->as_array();
			$tmp = serialize($pays);
		    if (file_exists(DOCROOT . 'assets/doc/etudiants.csv'))
		    {
		    	File::update(DOCROOT . 'assets/doc', 'etudiants.csv', $tmp);
		    } else {
		    	File::create(DOCROOT . 'assets/doc', 'etudiants.csv', $tmp);
		    	chmod(DOCROOT . 'assets/doc/etudiants.csv', 0777);
		    }
			echo $tmp;
			print "test done";
		}
		elseif (isset($_POST['entreprise'])) {
			$pays = DB::query('SELECT * FROM `entreprise`')->execute()->as_array();
			$tmp = serialize($pays);
		    if (file_exists(DOCROOT . 'assets/doc/entreprise.csv'))
		    {
		    	File::update(DOCROOT . 'assets/doc', 'entreprise.csv', $tmp);
		    } else {
		    	File::create(DOCROOT . 'assets/doc', 'entreprise.csv', $tmp);
		    	chmod(DOCROOT . 'assets/doc/entreprise.csv', 0777);
		    }
			echo $tmp;
			print "test done";
		}
		elseif (isset($_POST['contact'])) {
			$pays = DB::query('SELECT * FROM `contact`')->execute()->as_array();
			$tmp = serialize($pays);
		    if (file_exists(DOCROOT . 'assets/doc/contact.csv'))
		    {
		    	File::update(DOCROOT . 'assets/doc', 'contact.csv', $tmp);
		    } else {
		    	File::create(DOCROOT . 'assets/doc', 'contact.csv', $tmp);
		    	chmod(DOCROOT . 'assets/doc/contact.csv', 0777);
		    }
			echo $tmp;
			print "test done";
		}
	}

	public function action_modifier()
	{
		$data["subnav"] = array('modifier'=> 'active' );
		$this->template->title = 'Admin &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/proposition/modifier', $data);
	}

	public function action_valider()
	{
		$data['stages'] = Model_Stage::find_all();
		$data["subnav"] = array('valider'=> 'active' );
		$this->template->title = 'Admin &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/proposition/valider', $data);
	}
}