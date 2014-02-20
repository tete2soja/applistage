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
		
		if (Input::method() == 'POST') {
		
			$id_ville_contact = null;
			$id_ville_ent = null;
			
			/*$ville_contact = Model_Ville::forge(array(
				'id' => null,
                'nom' => 'Paris',
                'code_postal' => '75000',
                'pays' => 'France',
            ));
			$ville_contact = Model_Ville::forge(array(
                'nom' => Input::post('contact_ville'),
                'code_postal' => Input::post('contact_codepostal'),
                'pays' => Input::post('contact_pays'),
            ));

            if ($ville_contact and $ville_contact->save())
            {
                Session::set_flash('success', 'Added ville contact #'.$ville_contact->id.'.');
                $id_ville_contact = $ville_contact->id;
            }

            else
            {
                Session::set_flash('error', 'Could not save ville_contact.');
            }
            
            $ville_ent = Model_Ville::forge(array(
                'nom' => Input::post('ent_ville'),
                'code_postal' => Input::post('ent_codepostal'),
                'pays' => Input::post('ent_pays'),
            ));
            
            if ($ville_ent and $ville_ent->save())
            {
                Session::set_flash('success', 'Added ville entreprise#'.$ville_ent->id.'.');
                $id_ville_ent = $ville_ent->id;
            }

            else
            {
                Session::set_flash('error', 'Could not save ville_ent.');
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
		$data["subnav"] = array('liste'=> 'active' );
		$this->template->title = 'Entreprise &raquo; Proposition de Stage';
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Entreprise';
		$this->template->content = View::forge('entreprise/liste', $data);
	}

}
