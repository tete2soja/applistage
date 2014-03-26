<?php

class Controller_Etudiant extends Controller_Template
{
	public function before() {
		// check for admin
		parent::before();
		if ( ! Auth::check())
		{
			Response::redirect('/util/connexion');
		}
		else {
			$id_info = Auth::get_groups();
			foreach ($id_info as $info) {
				if (($info[1] != "2")&&($info[1] != "10")) {
					Response::redirect('/util/connexion');
					break;
				}
			}
		}
	}

	public function action_index() {
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/index', $data);
		if ( ! Auth::check())
		{
			Response::redirect('/etudiant/connexion');
		}
	}

	public function action_connexion() {
		$data["subnav"] = array('connexion'=> 'active' );
		$this->template->title = 'Admin &raquo; Connexion';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Administration';
		$this->template->content = View::forge('etudiant/connexion', $data);
		if (isset($_POST['submit'])) {
			// validate the a username and password
			$name = $_POST['id'];
			$pass = $_POST['password'];
			if (Auth::login($name, $pass)) {
				Response::redirect('/etudiant/');
			}
			else {
				$password_to_db = Auth::instance()->hash_password($pass);
				print $password_to_db;
			}
		}
	}

	public function action_convention() {
		$data["subnav"] = array('convention'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Convention';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/convention', $data);
	}

	public function action_realisation() {
		$data["subnav"] = array('realisation'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Realisation';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/realisation', $data);
	}

	public function action_recherche() {
		$data["subnav"] = array('recherche'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Recherche';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/recherche', $data);
	}

	public function action_soutenance() {
		$data["subnav"] = array('soutenance'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Soutenance';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/soutenance', $data);
	}

	public function action_formulaire($id = null) {
	
		//Si l'étudiant a déjà rempli une fiche, on la récupère
		$etudiant = Model_Etudiant::find_one_by('no_etudiant', Auth::get('username'));
		if(!empty($etudiant)) {
			$fiche = Model_Fichestage::find_one_by('etudiant', $etudiant->id);
			if(!empty($fiche)) {
				//Si état fiche = complète ou imprimée, on ne permet pas l'accès
				if(!empty($fiche->etat)) {
					if($fiche->etat==3) {
						Session::set_flash('error', 'Fiche stage complète, pas d\'édition possible');
						Response::redirect('/etudiant/convention');
					}
					elseif ($fiche->etat==2) {
						Session::set_flash('error', 'Convention déjà imprimée');
						Response::redirect('/etudiant/convention');
					}
				}
				$data["fiche"] = $fiche;
			}
		}
		
		if ($id != null) {
			$data['stage'] = Model_Stage::find_by_pk($id);
			$id_stage = $id;
		}
		
		//Si formulaire soumis on entre
        /*if (Input::method() == 'POST') {
        	$val1 = '';
        	$val2 = '';
        	
        	//On récupère l'id du pays de l'entreprise en bdd
            $id_pays = Model_Pays::find_one_by('nom', Input::post('ent_pays'))->id;
            
            //On regarde si la ville de l'entreprise existe en bdd
            $tmp = Model_Ville::find_one_by(array('nom' => Input::post('ent_ville'), 'code_postal' => Input::post('ent_codepostal')));
            
            //Si elle n'existe pas, on la crée
            if(empty($tmp)) {
	            $ville_ent = Model_Ville::forge(array(
		            'nom' => Input::post('ent_ville'),
		            'code_postal' => Input::post('ent_codepostal'),
		            'pays' => $id_pays,
				));

	            if ($ville_ent and $ville_ent->save())
	            {
	            	$id_ville_ent = $ville_ent->id;
	                Session::set_flash('success', $val1 = $val1 . 'Ville entreprise ajoutée #'.$ville_ent->id.'. ');
	            }
	
	            else
	            {
	                Session::set_flash('error', $val2 = $val2 . 'Could not save ville_ent. ');
	            }
            } else {
	            $id_ville_ent = $tmp->id;
	            Session::set_flash('error', $val2 = $val2 . 'Ville Entreprise déjà existante. ');
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
	                Session::set_flash('success', $val1 = $val1 . 'Entreprise ajoutée #'.$entreprise->id.'. ');
	            }
	
	            else
	            {
	                Session::set_flash('error', $val2 = $val2 . 'Could not save entreprise. ');
	            }
			} else {
				$id_entreprise = $tmp->id;
				Session::set_flash('error', $val2 = $val2 . 'Entreprise déjà existante. ');
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
	                'ville' => $id_ville_contact,
	                'pays' => $id_pays,
	                'entreprise' => $id_entreprise,
	                'propose' => 1,
	            ));
	            
	            if ($contact and $contact->save())
	            {
	            	$id_contact = $contact->id;
	                Session::set_flash('success', $val1 = $val1 . 'Contact ajouté #'.$contact->id.'. ');
	            }	
	
	            else
	            {
	                Session::set_flash('error', $val2 = $val2 . 'Could not save contact. ');
	            }
			} else {
				$id_contact = $tmp->id;
				Session::set_flash('error', $val2 = $val2 . 'Contact déjà existant. ');
			}
            
            //Création de la proposition de stage
            $stage = Model_Stage::forge(array(
                'contact' => $id_contact,
                'entreprise' => $id_entreprise,
                'sujet' => Input::post('sujet'),
                'visibilite' => 1,
                'contexte' => Input::post('contexte'),
                'resultats' => Input::post('resultats_attendus'),
                'conditions' => Input::post('conditions_part'),
                'url_doc' => Input::post('url_doc_prez'),
                'public' => 0,
            ));
            
            if ($stage and $stage->save())
            {
                Session::set_flash('success', $val1 = $val1 . 'Stage ajouté #'.$stage->id.'. ');
                Response::redirect('entreprise/liste');
            }

            else
            {
                Session::set_flash('error', $val2 = $val2 . 'Could not save stage. ');
            }
        }*/

    	$tab_pays = DB::select('nom')->from('pays')->order_by('nom', 'asc')->execute()->as_array();
    	$pays = \Arr::pluck($tab_pays, 'nom');
    	$data["liste_pays"] = Format::forge($pays)->to_json();
    	$tab_ent = DB::select('nom')->from('entreprise')->order_by('nom', 'asc')->execute()->as_array();
    	$entreprises = \Arr::pluck($tab_ent, 'nom');
    	$data["liste_ent"] = Format::forge($entreprises)->to_json();
    	$tab_sujet = DB::select('sujet')->from('stage')->order_by('sujet', 'asc')->execute()->as_array();
    	$sujets = \Arr::pluck($tab_sujet, 'sujet');
    	$data["liste_sujet"] = Format::forge($sujets)->to_json();
		
		$tmp = DB::select('remuneration', 'date_debut', 'date_fin')->from('config')->execute();
		if(!empty($tmp)) {
			$data["date_debut"] = $tmp->get('date_debut');
			$data["date_fin"] = $tmp->get('date_fin');
			$data["remuneration"] = $tmp->get('remuneration');
		}
		
		$data["subnav"] = array('formulaire'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Formulaire';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/formulaire', $data);

		/*if (isset($_POST['submit'])) {
			$sujet = $_POST['sujetStage'];
			$nomcontact = $_POST['resT_nom'];
			$publicproposition = $_POST['albumimg'];
			$contextestage = $_POST['description_sujet'];
			$conditionstage = $_POST['annee'];
			$proposition = $_POST['playlist'];
			$indemnite = $_POST['retribution'];
			$public = $_POST['playlist'];
			//ENTREPRISE
			//$query = DB::query('INSERT INTO `fichestages` VALUES ("' . $id . '","' . $nom . '","' . $code . '","' . $pays . '")')->execute();
			//print "Formulaire envoyé avec succès";
		}*/
	}
	
	public function action_proposition() {
		$data['stages'] = Model_Stage::find_all();
		$data["subnav"] = array('proposition'=> 'active' );
		$this->template->title = 'Etudiant &raquo; Proposition de Stage';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/proposition', $data);
	}

	public function action_details($id = null)
	{
		is_null($id) and Response::redirect('etudiant/proposition');

		$data['stage'] = Model_Stage::find_by_pk($id);

		$this->template->title = "Stage &raquo; Détails";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/details', $data);

	}

}
