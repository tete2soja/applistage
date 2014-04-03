<?php
include DOCROOT . 'array_column.php';
class Controller_Entreprise extends Controller_Template
{

	//Contrôleur de la page index.php
	public function action_index()
	{
		$annee = Model_Admin_Config::find_one_by_id(1)->annee_courante;
		$date_debut = Model_Admin_Config::find_one_by_id(1)->date_debut;
		$date_fin = Model_Admin_Config::find_one_by_id(1)->date_fin;
		$date_debut_lp = Model_Admin_Config::find_one_by_id(1)->date_debut_lp;
		$date_fin_lp = Model_Admin_Config::find_one_by_id(1)->date_fin_lp;
		$data["annee"] = $annee;
		$data["date_debut"] = date("d-m-Y", strtotime($date_debut));
		$data["date_fin"] = date("d-m-Y", strtotime($date_fin));
		$data["date_debut_lp"] = date("d-m-Y", strtotime($date_debut_lp));
		$data["date_fin_lp"] = date("d-m-Y", strtotime($date_fin_lp));
		$data["subnav"] = array('index'=> 'active' );
		$this->template->link_header = 'entreprise/index';
		$this->template->title = 'Entreprise &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/index', $data);
	}

	//Contrôleur de la page proposition.php
	public function action_proposition()
	{
		$data["subnav"] = array('proposition'=> 'active' );
		$this->template->link_header = 'entreprise/index';
		$this->template->title = 'Entreprise &raquo; Proposition';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/proposition', $data);
	}
	
	//Contrôleur de la page formulaire.php
	public function action_formulaire()
	{
		
		//Si formulaire soumis on entre
		if (Input::method() == 'POST') {
			$val1 = '';
			$val2 = '';
			
			//On récupère l'id du pays de la ville en bdd
			$pays = Model_Pays::find_one_by('nom', Input::post('ent_pays'));
			
			//Si le pays n'existe pas on redirige vers le formulaire avec une erreur
			if(empty($pays)) {
				Session::set_flash('error', 'Ce pays n\'éxiste pas dans la base de données.');
                                Response::redirect('entreprise/formulaire');
			} else $id_pays = $pays->id;

			//On regarde si la ville de l'entreprise existe en bdd
			$tmp = Model_Ville::find_one_by(array('nom' => Input::post('ent_ville'), 'code_postal' => Input::post('ent_codepostal')));
			
			//Si elle n'existe pas, on la crée
			if(empty($tmp)) {
				$ville_ent = Model_Ville::forge(array(
					'nom' => Input::post('contact_ville'),
					'code_postal' => Input::post('contact_codepostal'),
					'pays' => $id_pays,
				));
				if ($ville_ent and $ville_ent->save())
				{
					$id_ville_ent = $ville_ent->id;
				}
			} else {
				$id_ville_ent = $tmp->id;
			}
			
			//On regarde si l'entreprise existe en bdd
			$tmp = Model_Entreprise::find_one_by('nom', Input::post('ent_nom'));
			
			//Si elle n'existe pas, on la crée
			if(empty($tmp)) {
				$entreprise = Model_Entreprise::forge(array(
					'nom' => Input::post('ent_nom'),
					'adresse' => Input::post('ent_adresse'),
					'ville' => $id_ville_ent,
					'pays' => $id_pays,
					'url_entreprise' => Input::post('ent_url'),
				));
				
				if ($entreprise and $entreprise->save())
				{
					$id_entreprise = $entreprise->id;
				}
			} else {
				$id_entreprise = $tmp->id;
			}
			
			//On regarde si le contact existe en bdd
			$tmp = Model_Contact::find_one_by(array('nom' => Input::post('contact_nom'), 'email' => Input::post('contact_mail')));
			
			//Si il n'existe pas, on le crée
			if(empty($tmp)) {
				$contact = Model_Contact::forge(array(
					'nom' => Input::post('contact_nom'),
					'prenom' => Input::post('contact_prenom'),
					'telephone' => Input::post('contact_tel'),
					'email' => Input::post('contact_mail'),
					'entreprise' => $id_entreprise,
					'propose' => 1,
				));
				if ($contact and $contact->save())
				{
					$id_contact = $contact->id;
				}
			} else {
				$id_contact = $tmp->id;
			}

			//Lien vers le document PDF si présent
			$config = array(
				'path' => DOCROOT.'assets/doc/PDF_ent/',
				'randomize' => true,
				'ext_whitelist' => array('pdf', 'PDF'),
			);

			// process the uploaded files in $_FILES
			Upload::process($config);

			// if there are any valid files
			if (Upload::is_valid())
			{
				// save them according to the config
				Upload::save();
				$filename = array_column(Upload::get_files(), 'saved_as');
				$tmp_name = current($filename);
				move_uploaded_file($_FILES["filename"]["tmp_name"], DOCROOT.'assets/doc/PDF_ent/' . $tmp_name);
				File::rename(DOCROOT.'assets/doc/PDF_ent/' . $tmp_name, DOCROOT.'assets/doc/PDF_ent/' . basename($_FILES['filename']['name']));
				$chemin_file = 'assets/doc/PDF_ent/' . basename($_FILES['filename']['name']);
			}
			
			if(empty($_POST['public'])) {
				$public = 0;
			} else $public = 1;

			
			//Création de la proposition de stage
			if (isset($chemin_file)) {
				$stage = Model_Stage::forge(array(
					'contact' => $id_contact,
					'entreprise' => $id_entreprise,
					'sujet' => Input::post('sujet'),
					'visibilite' => 1,
					'contexte' => Input::post('contexte'),
					'resultats' => Input::post('resultats_attendus'),
					'conditions' => Input::post('conditions_part'),
					'url_doc' => Input::post('url_doc_prez'),
					'chemin_pdf' => $chemin_file,
					'public' => $_POST['promo'],
				));
			}
			else {
				$stage = Model_Stage::forge(array(
					'contact' => $id_contact,
					'entreprise' => $id_entreprise,
					'sujet' => Input::post('sujet'),
					'visibilite' => $public,
					'contexte' => Input::post('contexte'),
					'resultats' => Input::post('resultats_attendus'),
					'conditions' => Input::post('conditions_part'),
					'url_doc' => Input::post('url_doc_prez'),
					'public' => $_POST['promo'],
				));
			}
			
			
			if ($stage and $stage->save())
			{
				Session::set_flash('success', $val1 = $val1 . 'Stage ajouté #'.$stage->id.'. En attente de validation.');
				Response::redirect('entreprise/liste');
			}

			else
			{
				Session::set_flash('error', $val2 = $val2 . 'Ajout du stage impossible.');
			}
		}
		
		$tab_ville = DB::select('nom')->from('ville')->order_by('nom', 'asc')->execute()->as_array();
		$villes = \Arr::pluck($tab_ville, 'nom');
		$data["liste_ville"] = Format::forge($villes)->to_json();
		$tab_code = DB::select('code_postal')->from('ville')->order_by('nom', 'asc')->execute()->as_array();
		$codes = \Arr::pluck($tab_code, 'code_postal');
		$data["liste_code"] = Format::forge($codes)->to_json();
		$tab_pays = DB::select('nom')->from('pays')->execute()->as_array();
		$pays = \Arr::pluck($tab_pays, 'nom');
		$data["liste_pays"] = Format::forge($pays)->to_json();
		$tab_ent = DB::select('nom')->from('entreprise')->execute()->as_array();
		$entreprises = \Arr::pluck($tab_ent, 'nom');
		$data["liste_ent"] = Format::forge($entreprises)->to_json();
		
		$data["subnav"] = array('formulaire'=> 'active' );
		$this->template->link_header = 'entreprise/index';
		$this->template->title = 'Entreprise &raquo; Formulaire';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/formulaire', $data);
	}
	
	public function action_liste()
	{
		$data['stages'] = Model_Stage::find_all();
		$data["subnav"] = array('liste'=> 'active' );
		$this->template->link_header = 'entreprise/index';
		$this->template->title = 'Entreprise &raquo; Proposition de Stage';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/liste', $data);
	}

	public function action_details($id = null)
	{
		is_null($id) and Response::redirect('entreprise/liste');
		$data['stage'] = Model_Stage::find_by_pk($id);
		$this->template->link_header = 'entreprise/index';
		$this->template->title = "Stage &raquo; Détails";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/details', $data);

	}

}
