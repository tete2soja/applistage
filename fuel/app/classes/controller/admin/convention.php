<?php
class Controller_Admin_Convention extends Controller_Template{

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
		$data['conventions'] = Model_Fichestage::find_all();
		$this->template->title = "Convention &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Convention';
		$this->template->content = View::forge('admin/convention/index', $data);		

		if (isset($_POST['incomplete'])) {
			$id = $_POST['incomplete'];
			$query = DB::update('fichestages');
			$query->value('etat', '1');
			$query->where('id', $id);
			$query->execute();
			Response::redirect('admin/convention/');
		}
		else if (isset($_POST['imprime'])) {
			$id = $_POST['imprime'];
			$query = DB::update('fichestages');
			$query->value('etat', '2');
			$query->where('id', $id);
			$query->execute();
			/*$pdf = \Pdf::factory('tcpdf')->init();
	        $pdf->AddPage();
	        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	        $pdf->SetFont('bookos', '', 10, '', 'false');
	        $html = '
	        <img src="http://i61.tinypic.com/29gofp1.jpg" alt="" style="height:86px;width:62px;"/>
	        <img src="http://i59.tinypic.com/keub1l.png" alt="" align="right" style="height:45px;width:228px;"/>
	        <h1 style="text-align:center;">CONVENTION DE STAGE</h1>
	        <p style="text-align:center;font-weight:bold;">Stage se déroulant en entreprise publique ou privée, en association, en établissement public à caractère industriel et commercial</p>
			<p>Les parties conviennent d\'organiser le stage de DUT INFORMATIQUE conformément à la charte des stages étudiants en entreprise signée le 26 avril 2006 (annexe 1), au décret n°2006-1093 modifié du 29 août 2006 pris pour l’application de l’article 9 de la loi n°2006-396 modifiée du 31 mars 2006 pour l’égalité des chances et aux engagements fixés ci-dessous :</p>';
	        $pdf->writeHTML($html, true, false, true, false, 'center');
	        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	        $pdf->AddPage();
	        $html2 = '<p>Les horaires de travail sont ceux pratiqués au sein de l’organisme. L’étudiant est présent dans l’organisme {stgjheb} jours et {stghheb} heures au maximum par semaine. Pendant la durée du stage, l’étudiant stagiaire peut être autorisé à revenir à l’Université pour y suivre certains cours. Le calendrier est porté à la connaissance du tuteur de l’organisme avant le début du stage. Toute modification substantielle de l’organisation du stage dans le temps donne lieu à un avenant à la présente convention.</p>';
	        $pdf->writeHTML($html2, true, false, true, false, 'center');
	        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	        $pdf->Output();*/
			Response::redirect('admin/convention/');
		}

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('admin/convention');

		$data['convention'] = Model_Fichestage::find_by_pk($id);

		$this->template->title = "Convention &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Convention';
		$this->template->content = View::forge('admin/convention/view', $data);		

		if (isset($_POST['incomplete'])) {
			$id = $_POST['incomplete'];
			$query = DB::update('fichestages');
			$query->value('etat', '1');
			$query->where('id', $id);
			$query->execute();
			Response::redirect('admin/convention/');
		}
		else if (isset($_POST['imprime'])) {
			$id = $_POST['imprime'];
			$query = DB::update('fichestages');
			$query->value('etat', '2');
			$query->where('id', $id);
			$query->execute();
			/*$pdf = \Pdf::factory('tcpdf')->init();
	        $pdf->AddPage();
	        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	        $pdf->SetFont('bookos', '', 10, '', 'false');
	        $html = '
	        <img src="http://i61.tinypic.com/29gofp1.jpg" alt="" style="height:86px;width:62px;"/>
	        <img src="http://i59.tinypic.com/keub1l.png" alt="" align="right" style="height:45px;width:228px;"/>
	        <h1 style="text-align:center;">CONVENTION DE STAGE</h1>
	        <p style="text-align:center;font-weight:bold;">Stage se déroulant en entreprise publique ou privée, en association, en établissement public à caractère industriel et commercial</p>
			<p>Les parties conviennent d\'organiser le stage de DUT INFORMATIQUE conformément à la charte des stages étudiants en entreprise signée le 26 avril 2006 (annexe 1), au décret n°2006-1093 modifié du 29 août 2006 pris pour l’application de l’article 9 de la loi n°2006-396 modifiée du 31 mars 2006 pour l’égalité des chances et aux engagements fixés ci-dessous :</p>';
	        $pdf->writeHTML($html, true, false, true, false, 'center');
	        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	        $pdf->AddPage();
	        $html2 = '<p>Les horaires de travail sont ceux pratiqués au sein de l’organisme. L’étudiant est présent dans l’organisme {stgjheb} jours et {stghheb} heures au maximum par semaine. Pendant la durée du stage, l’étudiant stagiaire peut être autorisé à revenir à l’Université pour y suivre certains cours. Le calendrier est porté à la connaissance du tuteur de l’organisme avant le début du stage. Toute modification substantielle de l’organisation du stage dans le temps donne lieu à un avenant à la présente convention.</p>';
	        $pdf->writeHTML($html2, true, false, true, false, 'center');
	        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	        $pdf->Output();*/
			Response::redirect('admin/convention/');
		}

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Fichestage::validate('create');
			
			if ($val->run())
			{
				$convention = Model_Fichestage::forge(array(
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

		$this->template->title = "Convention &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Convention';
		$this->template->content = View::forge('admin/convention/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('admin/convention');

		$convention = Model_Fichestage::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Fichestage::validate('edit');

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
		$this->template->title = "Convention &raquo; Gestion";
		$this->template->main_title = 'Applistage 2014';
		$this->template->sub_title = 'Convention';
		$this->template->content = View::forge('admin/convention/edit');

	}

	public function action_delete($id = null)
	{
		if ($convention = Model_Fichestage::find_one_by_id($id))
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
