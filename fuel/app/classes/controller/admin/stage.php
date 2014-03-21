<?php
class Controller_Admin_Stage extends Controller_Template{

	public function action_index()
	{
		$data['stages'] = Model_Stage::find_all();
		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
		$this->template->content = View::forge('admin/stage/index', $data);
		if (Input::method() == 'POST') {
			$id = $_POST['submit'];
			$query = DB::update('stage');
			$query->value('valide', '1');
			$query->where('id', $id);
			$query->execute();
		}
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/stage');

		$data['stage'] = Model_Stage::find_by_pk($id);

		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
		$this->template->content = View::forge('admin/stage/view', $data);

	}

	public function action_suivi()
	{
		$data['stages'] = Model_Stage::find_all();

		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
		$this->template->content = View::forge('admin/stage/suivi', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Stage::validate('create');
			
			if ($val->run())
			{
				$stage = Model_Stage::forge(array(
					'etudiant' => Input::post('etudiant'),
					'contact' => Input::post('contact'),
					'enseignant' => Input::post('enseignant'),
					'entreprise' => Input::post('entreprise'),
					'sujet' => Input::post('sujet'),
					'visibilite' => Input::post('visibilite'),
					'contexte' => Input::post('contexte'),
					'resultats' => Input::post('resultats'),
					'conditions' => Input::post('conditions'),
					'url_doc' => Input::post('url_doc'),
					'public' => Input::post('public'),
					'valide' => Input::post('valide'),
					'date' => Input::post('date'),
				));

				if ($stage and $stage->save())
				{
					Session::set_flash('success', 'Added stage #'.$stage->id.'.');
					Response::redirect('admin/stage');
				}
				else
				{
					Session::set_flash('error', 'Could not save stage.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
		$this->template->content = View::forge('admin/stage/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/stage');

		$stage = Model_Stage::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Stage::validate('edit');

			if ($val->run())
			{
				$stage->etudiant = Input::post('etudiant');
				$stage->contact = Input::post('contact');
				$stage->enseignant = Input::post('enseignant');
				$stage->entreprise = Input::post('entreprise');
				$stage->sujet = Input::post('sujet');
				$stage->visibilite = Input::post('visibilite');
				$stage->contexte = Input::post('contexte');
				$stage->resultats = Input::post('resultats');
				$stage->conditions = Input::post('conditions');
				$stage->url_doc = Input::post('url_doc');
				$stage->public = Input::post('public');
				$stage->valide = Input::post('valide');
				$stage->date = Input::post('date');

				if ($stage->save())
				{
					Session::set_flash('success', 'Updated stage #'.$id);
					Response::redirect('admin/stage');
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

		$this->template->set_global('stage', $stage, false);
		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
		$this->template->content = View::forge('admin/stage/edit');

	}

	public function action_delete($id = null)
	{
		if ($stage = Model_Stage::find_one_by_id($id))
		{
			$stage->delete();

			Session::set_flash('success', 'Deleted stage #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete stage #'.$id);
		}

		Response::redirect('admin/stage');

	}


}
