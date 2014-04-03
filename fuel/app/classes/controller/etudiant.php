<?php

class Controller_Etudiant extends Controller_Template
{
	public function before() {
		// Vérifie si un utilisateur est loggué
		parent::before();
		if ( ! Auth::check()) // Si faux, redirige vers la page de connexion
		{
			Response::redirect('/util/connexion');
		}
		else {
			$id_info = Auth::get_groups();
			foreach ($id_info as $info) { // Si un utilisatuer est loggué mais pas 'enseignant' ou 'admin', on redirige
				if (($info[1] != "1")&&($info[1] != "2")&&($info[1] != "10")) {
					Response::redirect('/util/connexion');
					break;
				}
			}
		}
	}

	public function action_index() {
		$data["subnav"] = array('index'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Etudiant &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/index', $data);
		if ( ! Auth::check())
		{
			Response::redirect('/etudiant/connexion');
		}
	}

	public function action_convention() {
		$data["subnav"] = array('convention'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Etudiant &raquo; Convention';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/convention', $data);
	}

	public function action_realisation() {
		$data["subnav"] = array('realisation'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Etudiant &raquo; Realisation';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/realisation', $data);
	}

	public function action_recherche() {
		$data["subnav"] = array('recherche'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Etudiant &raquo; Recherche';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/recherche', $data);
	}

	public function action_soutenance() {
		$data["subnav"] = array('soutenance'=> 'active' );
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Etudiant &raquo; Soutenance';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/soutenance', $data);
	}

	public function action_formulaire($id = null) {
	
		//Si utilisateur connecté = admin, on le redirige
		$id_info = Auth::get_groups();
			foreach ($id_info as $info) {
				if (($info[1] != "2")&&($info[1] != "1")) {
					Session::set_flash('error', 'En tant qu\'administrateur, vous ne pouvez pas remplir une fiche de stage à partir de cette page.');
					Response::redirect('etudiant/index');
				}
			}
	
		//Si l'étudiant a déjà rempli une fiche, on la récupère
		$etudiant = Model_Etudiant::find_one_by('no_etudiant', Auth::get('username'));
		if(!empty($etudiant)) {
			$fiche = Model_Fichestage::find_one_by('etudiant', $etudiant->id);
			if(!empty($fiche)) {
				//Si état fiche = complète ou imprimée, on ne permet pas l'accès
				if(!empty($fiche->etat)) {
					if($fiche->etat==3) {
						Session::set_flash('info', 'Fiche stage complète, pas d\'édition possible.');
						Response::redirect('etudiant/convention');
					}
					elseif ($fiche->etat==2) {
						Session::set_flash('info', 'Convention déjà générée, vous ne pouvez plus accéder à cette page.');
						Response::redirect('etudiant/convention');
					}
				}
				$data["fiche"] = $fiche;
			}
		} else {
			Session::set_flash('error', 'Il n\'existe pas d\'étudiant correspondant à l\'id '.Auth::get('username').'. Merci d\'en avertir l\'administrateur.');
			Response::redirect('etudiant/convention');
		}
		
		if ($id != null) {
			$stage_data = Model_Stage::find_by_pk($id);
			if (empty($stage_data)) {
				Session::set_flash('error', 'Il n\'existe pas de stage avec cet id.');
				Response::redirect('etudiant/proposition');
			} else {
				$data['stage'] = $stage_data;
				$id_stage = $id;
			}
		}
		
		//Si formulaire soumis on entre
        if (Input::method() == 'POST') {
        	$val1 = '';
        	$val2 = '';
        	
        	//On récupère l'id du pays de l'entreprise en bdd
            $pays = Model_Pays::find_one_by('nom', Input::post('ent_pays'));
            
            //Si le pays n'existe pas on redirige vers le formulaire avec une erreur
			if(empty($pays)) {
				Session::set_flash('error', 'Ce pays n\'existe pas dans la base de données.');
				Response::redirect('entreprise/formulaire');
			} else $id_pays = $pays->id;

            
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
			
			//On regarde si le responsable technique existe en bdd
            $tmp = Model_Contact::find_one_by(array('nom' => Input::post('resT_nom'), 'email' => Input::post('resT_email')));
            
            //Si il n'existe pas, on le crée
            if(empty($tmp)) {
	            $contact = Model_Contact::forge(array(
	                'nom' => Input::post('resT_nom'),
	                'prenom' => Input::post('resT_prenom'),
	                'telephone' => Input::post('resT_tel'),
	                'email' => Input::post('resT_email'),
	                'ville' => $id_ville_ent,
	                'pays' => $id_pays,
	                'entreprise' => $id_entreprise,
	                'encadre' => 1,
	            ));
	            
	            if ($contact and $contact->save())
	            {
	            	$id_contact1 = $contact->id;
	            }
			} else {
				$id_contact1 = $tmp->id;
			}
			
			//On regarde si le responsable administratif existe en bdd
            $tmp = Model_Contact::find_one_by(array('nom' => Input::post('resA_nom'), 'email' => Input::post('resA_email')));
            
            //Si il n'existe pas, on le crée
            if(empty($tmp)) {
	            $contact2 = Model_Contact::forge(array(
	                'nom' => Input::post('resA_nom'),
	                'prenom' => Input::post('resA_prenom'),
	                'telephone' => Input::post('resA_tel'),
	                'email' => Input::post('resA_email'),
	                'ville' => $id_ville_ent,
	                'pays' => $id_pays,
	                'entreprise' => $id_entreprise,
	                'signe' => 1,
	            ));
	            
	            if ($contact2 and $contact2->save())
	            {
	            	$id_contact2 = $contact2->id;
	            }
			} else {
				$id_contact2 = $tmp->id;
			}
			
			//Si l'étudiant n'est pas passer par la liste des stages et le bouton "Prendre ce stage"
			if(empty($id_stage)) {
				//On regarde si le stage existe en bdd
				$tmp = Model_Stage::find_one_by(array('sujet' => Input::post('sujetStage'), 'entreprise' => $id_entreprise));
				
				//Si il n'existe pas, on le crée
	            if(empty($tmp)) {
		            $stage = Model_Stage::forge(array(
		            	'etudiant' => $etudiant->id,
		                'contact' => $id_contact1,
		                'entreprise' => $id_entreprise,
		                'sujet' => Input::post('sujetStage'),
		                'visibilite' => 1,
		                'contexte' => Input::post('description_sujet'),
		                'resultats' => Input::post('description_sujet'),
		                'conditions' => Input::post('environnement'),
		                'public' => 0,
		                'etat' => 3,
		            ));
		            
		            if ($stage and $stage->save())
		            {
		            	$id_stage = $stage->id;
		            }
		        } else {
					$id_stage = $tmp->id;
				}
			}
            
			
			if(Input::post('duree_stage')>10) {
				$allongee = 1;
			} else $allongee = 0;
			
			//Si l'étudiant n'a pas déjà de fiche de stage, on la crée, sinon on l'update
			if(empty($fiche)) {
            	$fichestage = Model_Fichestage::forge(array(
	            	'etudiant' => $etudiant->id,
	            	'stage' => $id_stage,
	            	'sujet' => Input::post('sujetStage'),
	            	'description_stage' => Input::post('description_sujet'),
	            	'environnement_dev' => Input::post('environnement'),
	                'indemnite' => Input::post('montant'),
	                'entreprise' => $id_entreprise,
	                'responsable_tech' => $id_contact1,
	                'responsable_adm' => $id_contact2,
	                'contact_urgence' => Input::post('contact_urgence'),
	                'rpz_np' => Input::post('rep_nom'),
					'rpz_adresse' => Input::post('rep_adresse'),
					'rpz_tel' => Input::post('rep_tel'),
					'origine_offre' => $_POST['origine'],
					'type' => $_POST['type_conv'],
					'langue' => $_POST['langue_conv'],
					'duree' => Input::post('duree_stage'),
					'date_debut' => Input::post('date_debut'),
					'date_fin' => Input::post('date_fin'),
					'allongee' => $allongee,
					'nb_jour_semaine' => Input::post('nb_jour_travailles'),
					'horaire_hebdo' => Input::post('horaire_hebdo'),
					'retribution' => Input::post('retribution'),
					'nature' => Input::post('nature'),
	            ));
	            
	            if ($fichestage and $fichestage->save())
	            {
	                Session::set_flash('success', $val1 = $val1 . 'Fiche de stage ajoutée #'.$fichestage->id.', en attente de validation.');
	                Response::redirect('etudiant/convention');
	            }
	
	            else
	            {
	                Session::set_flash('error', $val2 = $val2 . 'Enregistrement de la fiche de stage impossible. ');
	            }
	        } else {
	        	$fichestage = Model_Fichestage::find_by_pk($fiche->id);
	        	
	        	if (!empty($fichestage)) {
	        		$query = DB::update('fichestages')->where('id', $fiche->id);
	        		$query->set(array(
		            	'stage' => $id_stage,
		            	'sujet' => Input::post('sujetStage'),
		            	'description_stage' => Input::post('description_sujet'),
		            	'environnement_dev' => Input::post('environnement'),
		                'indemnite' => Input::post('montant'),
		                'entreprise' => $id_entreprise,
		                'responsable_tech' => $id_contact1,
		                'responsable_adm' => $id_contact2,
		                'contact_urgence' => Input::post('contact_urgence'),
		                'rpz_np' => Input::post('rep_nom'),
						'rpz_adresse' => Input::post('rep_adresse'),
						'rpz_tel' => Input::post('rep_tel'),
						'origine_offre' => $_POST['origine'],
						'type' => $_POST['type_conv'],
						'langue' => $_POST['langue_conv'],
						'duree' => Input::post('duree_stage'),
						'date_debut' => Input::post('date_debut'),
						'date_fin' => Input::post('date_fin'),
						'allongee' => $allongee,
						'nb_jour_semaine' => Input::post('nb_jour_travailles'),
						'horaire_hebdo' => Input::post('horaire_hebdo'),
						'retribution' => Input::post('retribution'),
						'nature' => Input::post('nature'),
	        		));
	                
	                if($query->execute()) {
		                Session::set_flash('success', $val1 = $val1 . 'Fiche de stage mise à jour. ');
		                Response::redirect('etudiant/convention');
	                }
	                else {
		                Session::set_flash('error', $val2 = $val2 . 'Mise à jour de la fiche de stage impossible.');
		                Response::redirect('etudiant/formulaire');
	                }
	        	}
	       } 
        }

		$tab_ville = DB::select('nom')->from('ville')->order_by('nom', 'asc')->execute()->as_array();
		$villes = \Arr::pluck($tab_ville, 'nom');
		$data["liste_ville"] = Format::forge($villes)->to_json();
		$tab_code = DB::select('code_postal')->from('ville')->order_by('nom', 'asc')->execute()->as_array();
		$codes = \Arr::pluck($tab_code, 'code_postal');
		$data["liste_code"] = Format::forge($codes)->to_json();
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
		$this->template->link_header = 'etudiant/index';
		$this->template->title = 'Etudiant &raquo; Formulaire';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/formulaire', $data);
		
	}
	
	public function action_proposition() {
		$id_info = Auth::get_groups();
			foreach ($id_info as $info) {
				$data["groupe"]=$info[1];
			}
		$data['stages'] = Model_Stage::find_all();
		$this->template->link_header = 'etudiant/index';
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
		$this->template->link_header = 'etudiant/index';
		$this->template->title = "Stage &raquo; Détails";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Etudiant';
		$this->template->content = View::forge('etudiant/details', $data);

	}
}