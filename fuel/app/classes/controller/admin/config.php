<?php
class Controller_Admin_Config extends Controller_Template{

	public function before() {
		// Vérifie si un utilisateur est loggué
		parent::before();
		if ( ! Auth::check())
		{
		    Response::redirect('/util/connexion');
		}
		else {
			$id_info = Auth::get_groups();
    		foreach ($id_info as $info)	{
			    if ($info[1] != "10") { // Si un utilisatuer est loggué mais pas 'admin', on redirige
			    	Response::redirect('/util/connexion');
			    	break;
			    }
    		}
		}
	}

	public function action_index()
	{
		$data['configs'] = Model_Admin_Config::find_all();
		$this->template->link_header = 'admin/import';
		$this->template->title = "Configuration &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Configuration';
		$this->template->content = View::forge('admin/config/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/config');

		$data['config'] = Model_Admin_Config::find_by_pk($id);
		$this->template->link_header = 'admin/import';
		$this->template->title = "Configuration &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Configuration';
		$this->template->content = View::forge('admin/config/view', $data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/config');

		$config = Model_Admin_Config::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Config::validate('edit');

			if ($val->run())
			{
				$config->colonne_1 = Input::post('colonne_1');
				$config->colonne_2 = Input::post('colonne_2');
				$config->colonne_3 = Input::post('colonne_3');
				$config->colonne_4 = Input::post('colonne_4');
				$config->colonne_5 = Input::post('colonne_5');
				$config->colonne_6 = Input::post('colonne_6');
				$config->colonne_8 = Input::post('colonne_8');
				$config->colonne_9 = Input::post('colonne_9');
				$config->colonne_10 = Input::post('colonne_10');
				$config->colonne_11 = Input::post('colonne_11');
				$config->colonne_12 = Input::post('colonne_12');
				$config->colonne_13 = Input::post('colonne_13');
				$config->colonne_14 = Input::post('colonne_14');
				$config->colonne_15 = Input::post('colonne_15');
				$config->colonne_16 = Input::post('colonne_16');
				$config->colonne_17 = Input::post('colonne_17');
				$config->colonne_18 = Input::post('colonne_18');
				$config->colonne_20 = Input::post('colonne_20');
				$config->colonne_21 = Input::post('colonne_21');
				$config->colonne_22 = Input::post('colonne_22');
				$config->colonne_23 = Input::post('colonne_23');
				$config->colonne_24 = Input::post('colonne_24');
				$config->remuneration = Input::post('remuneration');
				$config->date_debut = Input::post('date_debut');
				$config->date_fin = Input::post('date_fin');
				$config->date_debut_lp = Input::post('date_debut_lp');
				$config->date_fin_lp = Input::post('date_fin_lp');
				$config->annee_courante = Input::post('annee_courante');
				$config->password = Input::post('password');
				$config->password_en = Input::post('password_en');

				if ($config->save())
				{
					Session::set_flash('success', 'Mise à jour de la configuration avec succès');
					Response::redirect('admin/config');
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

		$this->template->set_global('config', $config, false);
		$this->template->link_header = 'admin/import';
		$this->template->title = "Configuration &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Configuration';
		$this->template->content = View::forge('admin/config/edit');

	}
}