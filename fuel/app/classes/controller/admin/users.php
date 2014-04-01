<?php
class Controller_Admin_Users extends Controller_Template{

	public function action_index($id = null)
	{
		if(!empty($id)) {
			if($id=="admin") {
				$users = Model_Admin_User::find_by('group', '10');
				$promo = 10;
			}
			elseif($id=="enseignant") {
				$users = Model_Admin_User::find_by('group', '3');
				$promo = 3;
			}
			elseif($id=="lp") {
				$users = Model_Admin_User::find_by('group', '1');
				$promo = 1;
			}
			elseif($id=="dut") {
				$users = Model_Admin_User::find_by('group', '2');
				$promo = 2;
			}
			else {
				$users = Model_Admin_User::find_all();
				$promo = 0;
			}
		} else {
			$users = Model_Admin_User::find_all();
			$promo = 0;
		}
		$data['promo'] = $promo;
		$data['users'] = $users;
		$this->template->link_header = 'admin/index';
		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
		$this->template->content = View::forge('admin/users/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/users');

		$data['user'] = Model_Admin_User::find_by_pk($id);

		$this->template->link_header = 'admin/index';
		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
		$this->template->content = View::forge('admin/users/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			Auth::create_user(
				Input::post('username'),
				$password_to_db,
				Input::post('email'),
				Input::post('group')
			);
			Session::set_flash('success', 'Added user #'.$user->id.'.');
			Response::redirect('admin/users');
		}

		$this->template->link_header = 'admin/index';
		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
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
		$this->template->link_header = 'admin/index';
		$this->template->title = "Stage &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Stage';
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