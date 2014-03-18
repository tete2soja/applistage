<?php

class Controller_Entreprise extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Entreprise &raquo; Index';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/index', $data);
	}

	public function action_proposition()
	{
		$data["subnav"] = array('proposition'=> 'active' );
		$this->template->title = 'Entreprise &raquo; Proposition';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/proposition', $data);
	}

	public function action_formulaire()
	{
		
		if (isset($_POST['submit'])) {
			print_r("submit");
			print_r("create");
			//$_POST['contact_pays'];
			$name_pays = Model_Pays::query()->select('id')->where('nom', "France");
			$ville_contact = Model_Ville::forge(array(
            'nom' => $_POST['contact_ville'],
            'code_postal' => $_POST['contact_codepostal'],
            'pays' => $name_pays,
            ));

            if ($ville_contact and $ville_contact->save())
            {
                Session::set_flash('success', 'Added ville contact #'.$ville_contact->id.'.');
                Response::redirect('entreprise/liste');
            }

            else
            {
            	print_r("N'a pas marché");
                Session::set_flash('error', 'Could not save ville_contact.');
            }
			print_r(" | sortie create");            
            /*$ville_ent = Model_Ville::forge(array(
                'nom' => $_POST['ent_ville'],
                'code_postal' => $_POST['ent_codepostal'],
                'pays' => Model_Pays::find_one_by('nom', $_POST['ent_pays'])->id,
            ));
            
            if ($ville_ent and $ville_ent->save())
            {
                Session::set_flash('success', 'Added ville entreprise #'.$ville_ent->id.'.');
            }

            else
            {
                Session::set_flash('error', 'Could not save ville_ent.');
            }
            
            $entreprise = Model_Entreprise::forge(array(
                'nom' => $_POST['ent_nom'],
                'adresse' => $_POST['ent_adresse'],
                'ville' => $ville_ent->id,
                'pays' => Model_Pays::find_one_by('nom', $_POST['ent_pays'])->id,
                'url_entreprise' => $_POST['ent_url'],
            ));
            
            if ($entreprise and $entreprise->save())
            {
                Session::set_flash('success', 'Added entreprise #'.$entreprise->id.'.');
            }

            else
            {
                Session::set_flash('error', 'Could not save entreprise.');
            }
            
            $contact = Model_Contact::forge(array(
                'nom' => $_POST['contact_nom'],
                'prenom' => $_POST['contact_prenom'],
                'telephone' => $_POST['contact_tel'],
                'email' => $_POST['contact_email'],
                'entreprise' => $entreprise->id,
                'propose' => 1,
            ));
            
            if ($contact and $contact->save())
            {
                Session::set_flash('success', 'Added contact #'.$contact->id.'.');
            }

            else
            {
                Session::set_flash('error', 'Could not save contact.');
            }
            
            $stage = Model_Stage::forge(array(
                'contact' => $contact->id,
                'entreprise' => $entreprise->id,
                'sujet' => $_POST['sujet'],
                'visibilite' => 1,
                'contexte' => $_POST['contexte'],
                'resultats' => $_POST['resultats_attendus'],
                'conditions' => $_POST['conditions_part'],
                'url_doc' => $_POST['url_doc_prez'],
                'public' => 0,
            ));
            
            if ($stage and $stage->save())
            {
                Session::set_flash('success', 'Added contact #'.$stage->id.'.');
            }

            else
            {
                Session::set_flash('error', 'Could not save contact.');
            }*/
            
            //Creation de la ville de l'entreprise si elle n'existe pas
			//$query = DB::query('INSERT INTO `ville` VALUES ("' . $id . '","' . $nom . '","' . $code . '","' . $pays . '")')->execute();
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

}
