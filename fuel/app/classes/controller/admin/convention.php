<?php
class Controller_Admin_Convention extends Controller_Template{

	public function action_index()
	{
		$data['conventions'] = Model_Admin_Convention::find_all();
		$this->template->title = "Conventions";
		$this->template->content = View::forge('admin/convention/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/convention');

		$data['convention'] = Model_Admin_Convention::find_by_pk($id);

		$this->template->title = "Convention";
		$this->template->content = View::forge('admin/convention/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Convention::validate('create');
			
			if ($val->run())
			{
				$convention = Model_Admin_Convention::forge(array(
					'etudiant' => Input::post('etudiant'),
					'sujet' => Input::post('sujet'),
					'description_stage' => Input::post('description_stage'),
					'environnement_dev' => Input::post('environnement_dev'),
					'observations_resp' => Input::post('observations_resp'),
					'indemnite' => Input::post('indemnite'),
					'entreprise' => Input::post('entreprise'),
					'responsable_legal' => Input::post('responsable_legal'),
					'responsable_adm' => Input::post('responsable_adm'),
					'contact_urgence' => Input::post('contact_urgence'),
					'rpz_np' => Input::post('rpz_np'),
					'rpz_adresse' => Input::post('rpz_adresse'),
					'rpz_tel' => Input::post('rpz_tel'),
					'origine_offre' => Input::post('origine_offre'),
					'type' => Input::post('type'),
					'langue' => Input::post('langue'),
					'duree' => Input::post('duree'),
					'date_debut' => Input::post('date_debut'),
					'date_fin' => Input::post('date_fin'),
					'allongee' => Input::post('allongee'),
					'nb_jour_semaine' => Input::post('nb_jour_semaine'),
					'horaire_hebdo' => Input::post('horaire_hebdo'),
					'retribution' => Input::post('retribution'),
					'nature' => Input::post('nature'),
					'etat' => Input::post('etat'),
				));

				if ($convention and $convention->save())
				{
					Session::set_flash('success', 'Added convention #'.$convention->id.'.');
					Response::redirect('admin/convention');
				}
				else
				{
					Session::set_flash('error', 'Could not save convention.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Conventions";
		$this->template->content = View::forge('admin/convention/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/convention');

		$convention = Model_Admin_Convention::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Admin_Convention::validate('edit');

			if ($val->run())
			{
				$convention->etudiant = Input::post('etudiant');
				$convention->sujet = Input::post('sujet');
				$convention->description_stage = Input::post('description_stage');
				$convention->environnement_dev = Input::post('environnement_dev');
				$convention->observations_resp = Input::post('observations_resp');
				$convention->indemnite = Input::post('indemnite');
				$convention->entreprise = Input::post('entreprise');
				$convention->responsable_legal = Input::post('responsable_legal');
				$convention->responsable_adm = Input::post('responsable_adm');
				$convention->contact_urgence = Input::post('contact_urgence');
				$convention->rpz_np = Input::post('rpz_np');
				$convention->rpz_adresse = Input::post('rpz_adresse');
				$convention->rpz_tel = Input::post('rpz_tel');
				$convention->origine_offre = Input::post('origine_offre');
				$convention->type = Input::post('type');
				$convention->langue = Input::post('langue');
				$convention->duree = Input::post('duree');
				$convention->date_debut = Input::post('date_debut');
				$convention->date_fin = Input::post('date_fin');
				$convention->allongee = Input::post('allongee');
				$convention->nb_jour_semaine = Input::post('nb_jour_semaine');
				$convention->horaire_hebdo = Input::post('horaire_hebdo');
				$convention->retribution = Input::post('retribution');
				$convention->nature = Input::post('nature');
				$convention->etat = Input::post('etat');

				if ($convention->save())
				{
					Session::set_flash('success', 'Updated convention #'.$id);
					Response::redirect('admin/convention');
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

		$this->template->set_global('convention', $convention, false);
		$this->template->title = "Conventions";
		$this->template->content = View::forge('admin/convention/edit');

	}

	public function action_delete($id = null)
	{
		if ($convention = Model_Admin_Convention::find_one_by_id($id))
		{
			$convention->delete();

			Session::set_flash('success', 'Deleted convention #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete convention #'.$id);
		}

		Response::redirect('admin/convention');

	}


}
