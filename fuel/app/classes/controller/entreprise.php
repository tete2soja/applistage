<?php

class Controller_Entreprise extends Controller_Template
{

	//Contrôleur de la page index.php
    public function action_index()
    {
        $data["subnav"] = array('index'=> 'active' );
        $this->template->title = 'Entreprise &raquo; Index';
        $this->template->main_title = 'Applistage 2014';
        $this->template->sub_title = 'Entreprise';
        $this->template->content = View::forge('entreprise/index', $data);
    }

	//Contrôleur de la page proposition.php
    public function action_proposition()
    {
        $data["subnav"] = array('proposition'=> 'active' );
        $this->template->title = 'Entreprise &raquo; Proposition';
        $this->template->main_title = 'Applistage 2014';
        $this->template->sub_title = 'Entreprise';
        $this->template->content = View::forge('entreprise/proposition', $data);
    }
	
	//Contrôleur de la page formulaire.php
    public function action_formulaire()
    {
    	$tab_pays = DB::select('nom')->from('pays')->order_by('nom', 'asc')->execute()->as_array();
    	$pays = \Arr::pluck($tab_pays, 'nom');
    	$data["liste_pays"] = Format::forge($pays)->to_json();
    	
    	//print(json_encode($pays));

        //Si formulaire soumis on entre
        if (Input::method() == 'POST') {
        	$val1 = '';
        	$val2 = '';
        	
            //On récupère l'id du pays du contact en bdd
            $id_pays = Model_Pays::find_one_by('nom', Input::post('contact_pays'))->id;
            
            //On regarde si la ville du contact existe en bdd
            $tmp = Model_Ville::find_one_by(array('nom' => Input::post('contact_ville'), 'code_postal' => Input::post('contact_codepostal')));
            
            //Si elle n'existe pas, on la crée
            if(empty($tmp))
            {
	            $ville_contact = Model_Ville::forge(array(
		            'nom' => Input::post('contact_ville'),
		            'code_postal' => Input::post('contact_codepostal'),
		            'pays' => $id_pays,
				));

	            if ($ville_contact and $ville_contact->save())
	            {
	            	$id_ville_contact = $ville_contact->id;
	                Session::set_flash('success', $val1 = $val1 . 'Ville contact ajouté #'.$ville_contact->id.'. ');
	                //Response::redirect('entreprise/liste');
	            } else
	            {
	                Session::set_flash('error', $val2 = $val2 . 'Could not save ville_contact. ');
	            }
            } else {
				$id_ville_contact = $tmp->id;
				Session::set_flash('error', $val2 = $val2 . 'Ville Contact déjà existante. ');
			}
            
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
	                Session::set_flash('success', $val1 = $val1 . 'Ville entreprise ajouté #'.$ville_ent->id.'. ');
	            }
	
	            else
	            {
	                Session::set_flash('error', $val2 = $val2 . 'Could not save ville_ent. ');
	            }
            } else {
	            $id_ville_ent = $tmp->id;
	            Session::set_flash('error', $val2 = $val2 . 'Ville Entreprise déjà existante. ');
            }
            
            //On récupère l'id du pays de l'entreprise en bdd
            $id_pays = Model_Pays::find_one_by('nom', Input::post('ent_pays'))->id;
            
            //On regarde si l'entreprise existe en bdd
            $tmp = Model_Entreprise::find_one_by('nom', Input::post('ent_nom'));
            
            //Si elle n'existe pas, on la crée
            if(empty($tmp)) {
	            $entreprise = Model_Entreprise::forge(array(
	                'nom' => Input::post('ent_nom'),
	                'adresse' => Input::post('ent_adresse'),
	                'ville' => $id_ville_contact,
	                'pays' => $id_pays,
	                'url_entreprise' => Input::post('ent_url'),
	            ));
	            
	            if ($entreprise and $entreprise->save())
	            {
	            	$id_entreprise = $entreprise->id;
	                Session::set_flash('success', $val1 = $val1 . 'Entreprise ajouté #'.$entreprise->id.'. ');
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
        }
        
        $data["subnav"] = array('formulaire'=> 'active' );
        $this->template->title = 'Entreprise &raquo; Formulaire';
        $this->template->main_title = 'Applistage 2014';
        $this->template->sub_title = 'Entreprise';
        $this->template->content = View::forge('entreprise/formulaire', $data);
    }
    
    public function action_liste()
    {
        $data['stages'] = Model_Stage::find_all();
        $data["subnav"] = array('liste'=> 'active' );
        $this->template->title = 'Entreprise &raquo; Proposition de Stage';
        $this->template->main_title = 'Applistage 2014';
        $this->template->sub_title = 'Entreprise';
        $this->template->content = View::forge('entreprise/liste', $data);
    }

	public function action_detail($id = null)
	{
		is_null($id) and Response::redirect('entreprise/liste');

		$data['stage'] = Model_Stage::find_by_pk($id);

		$this->template->title = "Stage &raquo; Détails";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/detail', $data);

	}

}