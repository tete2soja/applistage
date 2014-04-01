<?php
class Controller_Admin_Contact extends Controller_Template{

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
		$data['contacts'] = Model_Contact::find_all();
		$this->template->link_header = 'admin/index';
		$this->template->title = "Contact &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Contact';
		$this->template->content = View::forge('admin/contact/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/contact');

		$data['contact'] = Model_Contact::find_by_pk($id);
		$this->template->link_header = 'admin/index';
		$this->template->title = "Contact &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Contact';
		$this->template->content = View::forge('admin/contact/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Contact::validate('create');
			
			if ($val->run())
			{
				$contact = Model_Contact::forge(array(
					'nom' => Input::post('nom'),
					'prenom' => Input::post('prenom'),
					'telephone' => Input::post('telephone'),
					'email' => Input::post('email'),
					'ville' => Input::post('ville'),
					'pays' => Input::post('pays'),
					'entreprise' => Input::post('entreprise'),
					'encadre' => Input::post('encadre'),
					'signe' => Input::post('signe'),
					'propose' => Input::post('propose'),
				));

				if ($contact and $contact->save())
				{
					Session::set_flash('success', 'Added contact #'.$contact->id.'.');
					Response::redirect('admin/contact');
				}
				else
				{
					Session::set_flash('error', 'Could not save contact.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->link_header = 'admin/index';
		$this->template->title = "Contact &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Contact';
		$this->template->content = View::forge('admin/contact/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/contact');

		$contact = Model_Contact::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Contact::validate('edit');

			if ($val->run())
			{
				$contact->nom = Input::post('nom');
				$contact->prenom = Input::post('prenom');
				$contact->telephone = Input::post('telephone');
				$contact->email = Input::post('email');
				$contact->ville = Input::post('ville');
				$contact->pays = Input::post('pays');
				$contact->entreprise = Input::post('entreprise');
				$contact->encadre = Input::post('encadre');
				$contact->signe = Input::post('signe');
				$contact->propose = Input::post('propose');

				if ($contact->save())
				{
					Session::set_flash('success', 'Updated contact #'.$id);
					Response::redirect('admin/contact');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('contact', $contact, false);
		$this->template->link_header = 'admin/index';
		$this->template->title = "Contact &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Contact';
		$this->template->content = View::forge('admin/contact/edit');

	}

	public function action_delete($id = null)
	{
		if ($contact = Model_Contact::find_one_by_id($id))
		{
			$contact->delete();

			Session::set_flash('success', 'Deleted contact #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete contact #'.$id);
		}

		Response::redirect('admin/contact');

	}
}