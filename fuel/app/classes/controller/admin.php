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
		$data["stage_saisi"] = Model_Stage::count('id', true, array('etat' => 0));
		$data["convention_saisi"] = Model_Fichestage::count('id', true, array('etat' => 0));
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Admin &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/index', $data);
		
	}

	public function action_import()
	{
		$data["subnav"] = array('import'=> 'active' );
		$this->template->title = 'Admin &raquo; Générale';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration générale';
		$this->template->content = View::forge('admin/import', $data);
		if (isset($_POST['submit'])) {
			//Import uploaded file to Database
			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) {
				$num = count($data);
				for ($i=0; $i < $num; $i++) {
					$tmp = $data[$i];

				 	$array = Model_Admin_Config::find_by_pk(1)->to_array();
				 	
				 	$array[] = substr(array_search('code_etudiant', $array), 8);
				 	$array[] = substr(array_search('nom', $array), 8);
				 	$array[] = substr(array_search('prenom', $array), 8);
				 	$array[] = substr(array_search('nom_usage', $array), 8);
				 	$array[] = substr(array_search('date_naissance', $array), 8);
				 	$array[] = substr(array_search('sexe', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_ligne1', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_ligne2', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_ligne3', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_code_postal', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_commune', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_etranger', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_pays', $array), 8);
				 	$array[] = substr(array_search('adresse_fixe_telephone', $array), 8);
				 	$array[] = substr(array_search('adresse_annuelle_ligne1', $array), 8);
				 	$array[] = substr(array_search('adresse_annuelle_ligne2', $array), 8);
				 	$array[] = substr(array_search('adresse_annuelle_ligne3', $array), 8);
				 	$array[] = substr(array_search('adresse_annuelle_code_postal', $array), 8);
				 	$array[] = substr(array_search('adresse_annuelle_commune', $array), 8);
				 	$array[] = substr(array_search('adresse_annuelle_telephone', $array), 8);
				 	$array[] = substr(array_search('bac_annee', $array), 8);
				 	$array[] = substr(array_search('bac_equivalence', $array), 8);
				 	$array[] = substr(array_search('bac_mention', $array), 8);
				 	$array[] = substr(array_search('email', $array), 8);

				 	$listing = explode(";", $tmp);

				 	$id = $listing[$array[0]];
				 	$nom = $listing[$array[1]];
				 	$prenom = $listing[$array[2]];
				 	$date_naissance = $listing[$array[4]];
				 	$sexe = $listing[$array[5]];
				 	$adresse1_1 = $listing[$array[6]];
				 	$adresse1_2 = $listing[$array[7]];
				 	$adresse1_3 = $listing[$array[8]];
				 	$code_p1 = $listing[$array[9]];
				 	$ville1 = $listing[$array[10]];
				 	$telephone1 = $listing[$array[13]];
				 	$adresse2_1 = $listing[$array[14]];
				 	$adresse2_2 = $listing[$array[15]];
				 	$adresse2_3 = $listing[$array[16]];
				 	$code_p2 = $listing[$array[17]];
				 	$ville2 = $listing[$array[18]];
				 	$telephone2 = $listing[$array[19]];
				 	$bac_annee = $listing[$array[20]];
				 	$bac = $listing[$array[21]];
				 	$bac_mention = $listing[$array[22]];
				 	$email = $listing[$array[23]];
					
					//Récupération des clés étrangères
					$ville1 = str_replace ( '-', ' ', $ville1);
					$ville2 = str_replace ( '-', ' ', $ville2);
					if ($ville1 != "") {
						$id_ville1 = Model_Ville::find_one_by(array('nom' => $ville1, 'code_postal' => $code_p1))->id;
					}
					else {
						$id_ville1 = 1;
					}
					if ($ville2 != "") {
						$id_ville2 = Model_Ville::find_one_by(array('nom' => $ville2, 'code_postal' => $code_p2))->id;
					}
					else {
						$id_ville2 = 1;
					}

					// Conversion date
					list($j, $m, $a) = explode("/", $date_naissance);
					$date_naissance = $a . "-" . $m . "-" . $j;

					// Récupération de l'id
					$id = substr($id, 1);
					$id = "e" . $id;

					// Réunion des parties des adresses
					$adresse1 = $adresse1_1 . $adresse1_2 . $adresse1_3;
					$adresse2 = $adresse2_1 . $adresse2_2 . $adresse2_3;

					// Insertion dans la table avec les clés étrangères pour les villes
					$query = DB::query('INSERT INTO `etudiant` VALUES (NULL, "' . $id . '","' . $nom . '","' . $prenom . '","' . $date_naissance .  '","' . $sexe .  '","' . $bac .  '","' . $bac_mention .  '","' . $bac_annee .  '","' . $email .  '","' . $adresse1 .  '","' . $id_ville1 .  '","' . $adresse2 .  '","' . $id_ville2 .  '","' . $telephone1 .  '","' . $telephone2 . '", "1")')->execute();
					//Auth::create_user($id, $id, $email, 2);
				}
			}
			fclose($handle);
			Session::set_flash('success', 'Import de la table `etudiant` avec succès !');
			//Response::redirect('admin/import');
		}
		elseif (isset($_POST['etudiant'])) {
			$tmp = DB::query('SELECT * FROM `etudiant`')->execute()->as_array();
			$tmp = Format::forge($tmp)->to_csv();
		    if (file_exists(DOCROOT . 'assets/doc/etudiants.csv'))
		    {
		    	File::update(DOCROOT . 'assets/doc', 'etudiants.csv', $tmp);
		    } else {
		    	File::create(DOCROOT . 'assets/doc', 'etudiants.csv', $tmp);
		    	chmod(DOCROOT . 'assets/doc/etudiants.csv', 0777);
		    }
			File::download(DOCROOT . 'assets/doc/etudiants.csv', 'etudiants.csv', 'text/csv');
		}
		elseif (isset($_POST['entreprise'])) {
			$tmp = DB::query('SELECT * FROM `entreprise`')->execute()->as_array();
			$tmp = Format::forge($tmp)->to_csv();
		    if (file_exists(DOCROOT . 'assets/doc/entreprise.csv'))
		    {
		    	File::update(DOCROOT . 'assets/doc', 'entreprise.csv', $tmp);
		    } else {
		    	File::create(DOCROOT . 'assets/doc', 'entreprise.csv', $tmp);
		    	chmod(DOCROOT . 'assets/doc/entreprise.csv', 0777);
		    }
			File::download(DOCROOT . 'assets/doc/entreprise.csv', 'entreprises.csv', 'text/csv');
		}
		elseif (isset($_POST['contact'])) {
			$tmp = DB::query('SELECT * FROM `contact`')->execute()->as_array();
			$tmp = Format::forge($tmp)->to_csv();
		    if (file_exists(DOCROOT . 'assets/doc/contact.csv'))
		    {
		    	File::update(DOCROOT . 'assets/doc', 'contact.csv', $tmp);
		    } else {
		    	File::create(DOCROOT . 'assets/doc', 'contact.csv', $tmp);
		    	chmod(DOCROOT . 'assets/doc/contact.csv', 0777);
		    }
			File::download(DOCROOT . 'assets/doc/contact.csv', 'contacts.csv', 'text/csv');
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
		if (Input::method() == 'POST') {
			if (Input::all() == 'suppresion') {
				foreach (Input::post('suppresion') as $value) {
					/*$etudiants = DB::query('SELECT * FROM `etudiant` WHERE `iut_annee` = 2')->as_object('Model_Etudiant')->execute()->as_array();
					foreach ($etudiants as $etudiant) {
						DB::query('DELETE FROM `etudiant` WHERE `no_etudiant` = ' .$etudiant->no_etudiant . '')->execute();
					}*/
					print $value;
				}
			}
			else {
				foreach (Input::post('passage') as $value) {
					DB::query('UPDATE `etudiant` SET `iut_annee` = 2 WHERE `no_etudiant` =' . $value . '')->execute();
				}
			}
		}
	}

	public function action_passage()
	{
		$data['etudiants'] = DB::query('SELECT * FROM `etudiant`')->as_object('Model_Etudiant')->execute()->as_array();
		$data["subnav"] = array('valider'=> 'active' );
		$this->template->title = 'Admin &raquo; Passage';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/promotion/passage', $data);
		if (Input::method() == 'POST') {
			if (Input::all() == 'suppresion') {
				foreach (Input::post('suppresion') as $value) {
					/*$etudiants = DB::query('SELECT * FROM `etudiant` WHERE `iut_annee` = 2')->as_object('Model_Etudiant')->execute()->as_array();
					foreach ($etudiants as $etudiant) {
						DB::query('DELETE FROM `etudiant` WHERE `no_etudiant` = ' .$etudiant->no_etudiant . '')->execute();
					}*/
					print $value;
				}
			}
			else {
				foreach (Input::post('passage') as $value) {
					DB::query('UPDATE `etudiant` SET `iut_annee` = 2 WHERE `no_etudiant` =' . $value . '')->execute();
				}
			}
		}
	}

	public function action_gestion()
	{
		$data['etudiants'] = Model_Etudiant::find_by_iut_annee(2);
		$data["subnav"] = array('valider'=> 'active' );
		$this->template->title = 'Admin &raquo; Gestion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('admin/promotion/gestion', $data);
		if (Input::method() == 'POST') {
			$etudiants = Model_Etudiant::find_by_iut_annee(2);
			foreach ($etudiants as $etudiant) {
				if (isset($_POST['reorientation'])) {
					if (in_array($etudiant->no_etudiant, $_POST['reorientation'], true)) {
						//$etudiant->delete();
						echo 'suppr';
					}
				}
				else if (isset($_POST['redoublement'])) {	
					if (in_array($etudiant->no_etudiant, $_POST['redoublement'], true)) {
						echo 'red';
					}
				}
				else {
					//DB::query('INSERT INTO `etudiant_diplome` SELECT * FROM `etudiant` WHERE `no_etudiant` = ' .$etudiant->no_etudiant . '')->execute();
					//DB::query('DELETE FROM `etudiant` WHERE `no_etudiant` = ' .$etudiant->no_etudiant . '')->execute();
					echo 'pass';
				}
			}
		}
	}
}