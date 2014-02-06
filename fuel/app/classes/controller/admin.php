<?php

class Controller_Admin extends Controller_Template
{
	public function before()
	{
		// check for admin
		parent::before();
	}

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Admin &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/index', $data);
	}

	public function action_connexion()
	{
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Admin &raquo; Connexion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/connexion', $data);
	}

	public function action_import()
	{

		$data["subnav"] = array('import'=> 'active' );
		$this->template->title = 'Admin &raquo; Import';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/import', $data);
		if (isset($_POST['submit'])) {
			if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
				echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
				echo "<h2>Displaying contents:</h2>";
				readfile($_FILES['filename']['tmp_name']);
			}
			//Import uploaded file to Database
			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				/*list($insert_id, $rows_affected) = DB::insert(`etudiant`)->set(array(
							`id` => NULL,
							`no_etudiant` => '1234567',
							`nom` => 'test',
							`prenom` => 'test',
							`datenaissance` => '2014-02-03',
							`sexe` => '0',
							`bac` => 's',
							`bac_mention` => 'ab',
							`bac_annee` => '2014-02-03',
							`email` => 'drtyhrt',
							`adresse1` => 'rtyurtu',
							`ville1` => '2',
							`adresse2` => 'dfhdhtj',
							`ville2` => '2',
							`telephone1` => '0101010101',
							`telephone2` => '0101010101',
				))->execute();
				list($insert_id, $rows_affected) = DB::insert(`pays`)->set(array(
							`id` => NULL,
							`nom` => 'Test',
				))->execute();
				$query = DB::query('INSERT INTO `etudiant` VALUES (NULL, "1234567", "test", "test", "2014-02-03", "0", "s", "ab", "2014-02-03", "ifezie", "jfife", "2", "ijezij", "2", "0101010101", "0101010101")')->execute();*/
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
					$tmp = $data[$i];
					list($id,$nom,$code,$pays) = explode(";", $tmp);
					$query = DB::query('INSERT INTO `ville` VALUES ("' . $id . '","' . $nom . '","' . $code . '","' . $pays . '")')->execute();
				}
				$query = DB::query('SELECT * FROM `ville`')->execute();
				print_r($query);
			}
			fclose($handle);
			print "Import done";
		}
	}

	public function action_edit()
	{
		$data["subnav"] = array('edit'=> 'active' );
		$this->template->title = 'Admin &raquo; Edit';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/edit', $data);
	}

	public function action_view()
	{
		$data["subnav"] = array('view'=> 'active' );
		$this->template->title = 'Admin &raquo; View';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/view', $data);
	}

	public function action_create()
	{
		$data["subnav"] = array('create'=> 'active' );
		$this->template->title = 'Admin &raquo; Create';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/create', $data);
	}

	public function action__form()
	{
		$data["subnav"] = array('_form'=> 'active' );
		$this->template->title = 'Admin &raquo;  form';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/_form', $data);
	}

}