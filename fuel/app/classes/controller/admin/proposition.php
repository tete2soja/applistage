<?php
class Controller_Admin_Proposition extends Controller_Template{

	public function action_index()
	{
		$data['propositions'] = Model_Admin_Proposition::find_all();
		$this->template->title = "Proposition &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Proposition';
		$this->template->content = View::forge('admin/proposition/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/proposition');

		$data['proposition'] = Model_Admin_Proposition::find_by_pk($id);

		$this->template->title = "Proposition &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Proposition';
		$this->template->content = View::forge('admin/proposition/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Proposition::validate('create');
			
			if ($val->run())
			{
				$proposition = Model_Admin_Proposition::forge(array(
					'sujet' => Input::post('sujet'),
					'nomcontact' => Input::post('nomcontact'),
					'publicproposition' => Input::post('publicproposition'),
					'contextestage' => Input::post('contextestage'),
					'conditionstage' => Input::post('conditionstage'),
					'proposition' => Input::post('proposition'),
					'indemnite' => Input::post('indemnite'),
					'public' => Input::post('public'),
					'entreprise' => Input::post('entreprise'),
				));

				if ($proposition and $proposition->save())
				{
					Session::set_flash('success', 'Added proposition #'.$proposition->id.'.');
					Response::redirect('admin/proposition');
				}
				else
				{
					Session::set_flash('error', 'Could not save proposition.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Proposition &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Proposition';
		$this->template->content = View::forge('admin/proposition/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/proposition');

		$proposition = Model_Admin_Proposition::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Proposition::validate('edit');

			if ($val->run())
			{
				$proposition->sujet = Input::post('sujet');
				$proposition->nomcontact = Input::post('nomcontact');
				$proposition->publicproposition = Input::post('publicproposition');
				$proposition->contextestage = Input::post('contextestage');
				$proposition->conditionstage = Input::post('conditionstage');
				$proposition->proposition = Input::post('proposition');
				$proposition->indemnite = Input::post('indemnite');
				$proposition->public = Input::post('public');
				$proposition->entreprise = Input::post('entreprise');

				if ($proposition->save())
				{
					Session::set_flash('success', 'Updated proposition #'.$id);
					Response::redirect('admin/proposition');
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

		$this->template->set_global('proposition', $proposition, false);
		$this->template->title = "Proposition &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Proposition';
		$this->template->content = View::forge('admin/proposition/edit');

	}

	public function action_delete($id = null)
	{
		if ($proposition = Model_Admin_Proposition::find_one_by_id($id))
		{
			$proposition->delete();

			Session::set_flash('success', 'Deleted proposition #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete proposition #'.$id);
		}

		Response::redirect('admin/proposition');

	}
}