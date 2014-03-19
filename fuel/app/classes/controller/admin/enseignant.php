<?php
class Controller_Admin_Enseignant extends Controller_Template{

	public function action_index()
	{
		$data['enseignants'] = Model_Admin_Enseignant::find_all();
		$this->template->title = "Enseignants";
		$this->template->content = View::forge('admin/enseignant/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/enseignant');

		$data['enseignant'] = Model_Admin_Enseignant::find_by_pk($id);

		$this->template->title = "Enseignant";
		$this->template->content = View::forge('admin/enseignant/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Enseignant::validate('create');
			
			if ($val->run())
			{
				$enseignant = Model_Admin_Enseignant::forge(array(
					'nom' => Input::post('nom'),
					'prenom' => Input::post('prenom'),
					'email' => Input::post('email'),
				));

				if ($enseignant and $enseignant->save())
				{
					Session::set_flash('success', 'Added enseignant #'.$enseignant->id.'.');
					Response::redirect('admin/enseignant');
				}
				else
				{
					Session::set_flash('error', 'Could not save enseignant.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Enseignants";
		$this->template->content = View::forge('admin/enseignant/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/enseignant');

		$enseignant = Model_Admin_Enseignant::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Enseignant::validate('edit');

			if ($val->run())
			{
				$enseignant->nom = Input::post('nom');
				$enseignant->prenom = Input::post('prenom');
				$enseignant->email = Input::post('email');

				if ($enseignant->save())
				{
					Session::set_flash('success', 'Updated enseignant #'.$id);
					Response::redirect('admin/enseignant');
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

		$this->template->set_global('enseignant', $enseignant, false);
		$this->template->title = "Enseignants";
		$this->template->content = View::forge('admin/enseignant/edit');

	}

	public function action_delete($id = null)
	{
		if ($enseignant = Model_Admin_Enseignant::find_one_by_id($id))
		{
			$enseignant->delete();

			Session::set_flash('success', 'Deleted enseignant #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete enseignant #'.$id);
		}

		Response::redirect('admin/enseignant');

	}


}
