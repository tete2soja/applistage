<?php
class Controller_Admin_Users extends Controller_Template{

	public function action_index()
	{
		$data['users'] = Model_Admin_User::find_all();
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/users');

		$data['user'] = Model_Admin_User::find_by_pk($id);

		$this->template->title = "User";
		$this->template->content = View::forge('admin/users/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Admin_User::validate('create');
			
			if ($val->run())
			{
				$user = Model_Admin_User::forge(array(
					'username' => Input::post('username'),
					'email' => Input::post('email'),
					'password' => Input::post('password'),
					'telephone' => Input::post('telephone'),
					'group' => Input::post('group'),
					'last_login' => Input::post('last_login'),
					'login_hash' => Input::post('login_hash'),
					'updated_at' => Input::post('updated_at'),
					'profile_fields' => Input::post('profile_fields'),
					'created_at' => Input::post('created_at'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', 'Added user #'.$user->id.'.');
					Response::redirect('admin/users');
				}
				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/users');

		$user = Model_Admin_User::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Admin_User::validate('edit');

			if ($val->run())
			{
				$user->username = Input::post('username');
				$user->email = Input::post('email');
				$user->password = Input::post('password');
				$user->telephone = Input::post('telephone');
				$user->group = Input::post('group');
				$user->last_login = Input::post('last_login');
				$user->login_hash = Input::post('login_hash');
				$user->updated_at = Input::post('updated_at');
				$user->profile_fields = Input::post('profile_fields');
				$user->created_at = Input::post('created_at');

				if ($user->save())
				{
					Session::set_flash('success', 'Updated user #'.$id);
					Response::redirect('admin/users');
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

		$this->template->set_global('user', $user, false);
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/edit');

	}

	public function action_delete($id = null)
	{
		if ($user = Model_Admin_User::find_one_by_id($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('admin/users');

	}


}
