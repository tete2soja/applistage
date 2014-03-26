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
				
		if (isset($_POST['complete'])) {
			$id = $_POST['complete'];
			$query = DB::update('fichestages');
			$query->value('etat', '3');
			$query->where('id', $id);
			$query->execute();
			Response::redirect('admin/convention/');
		}
		elseif (isset($_POST['incomplete'])) {
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
			$convention = Model_Fichestage::find_one_by_id($id);
			$pdf = \Pdf::factory('tcpdf')->init();
			$pdf->setPrintHeader(false);
			$pdf->AddPage();
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			$pdf->Image('http://i59.tinypic.com/keub1l.png', '', '', 114, 23, '', '', 'T', false, 300, 'R', false, false, 0, false, false, false);
			$pdf->Image('http://i61.tinypic.com/29gofp1.jpg', '', '', 31, 43, '', '', 'N', false, 300, 'L', false, false, 0, false, false, false);
			$pdf->SetFont('bookos', '', 10, '', 'false');
			$html = '<br />
			<h1 style="text-align:center;">CONVENTION DE STAGE</h1>
			<p style="text-align:center;font-weight:bold;">Stage se déroulant en entreprise publique ou privée, en association, en établissement public à caractère industriel et commercial</p>
			<p>Les parties conviennent d\'organiser le stage de DUT INFORMATIQUE conformément à la charte des stages étudiants en entreprise signée le 26 avril 2006 (annexe 1), au décret n°2006-1093 modifié du 29 août 2006 pris pour l’application de l’article 9 de la loi n°2006-396 modifiée du 31 mars 2006 pour l’égalité des chances et aux engagements fixés ci-dessous :</p>
			<ol type="I" style="font-weight:bold;">
				<li style="font-weight:bold;">Les parties</li>
				<ol type="1">
					<li>L\'Université de Bretagne-Sud :</li>
						<p style="font-weight:normal;text-align:justify;">Dont le siège social se trouve rue Armand Guillemot à LORIENT (56100),représentée par son Président, 
						Monsieur Jean PEETERS.<br />
						NB : pour l’exécution de la présente convention, l’interlocuteur est L’IUT de Vannes :<br />
						8 rue Montaigne – BP 561 – 56017 VANNES cedex<br />
						représentée par son Directeur, Monsieur Patrice KERMORVANT
						</p>
					<li>L\'entreprise, l’association, l’EPIC ci-après-désigné par l’organisme d’accueil :</li>
						<p style="font-weight:normal;text-align:justify;">' . $convention->ent_nom . '<br />
						dont le siège social se trouve ' . $convention->ent_adresse . ' ' . $convention->ent_ville . ' ' . $convention->ent_code . '<br />
						Représenté(e) par ' . $convention->responsable_adm_np . ' ' . $convention->responsable_adm_tel . ' ' . $convention->responsable_adm_email . '</p>
					<li>L\' étudiant(e) :</li>
						<p style="font-weight:normal;text-align:justify;">
							Niveau d\'études : <br/>
							Domicile: ' . $convention->etudiant_adr . '<br/>
							Personne à contacter en cas d\'urgence : ' . $convention->contact_urgence .'
						</p>
				</ol>
				<li>Projet pédagogique et contenu du stage</li>
				<ol type="1">
					<li>Projet pédagogique, objectifs et finalités du stage</li>
						<p style="font-weight:normal;text-align:justify;">Le stage est obligatoire, il est un élément de l’obtention du diplôme et a pour objet de mettre en application 
						les connaissances acquises à l’Université. Le stage permet notamment de mieux appréhender la culture du travail, les situations professionnelles, les contenus des 
						métiers et les connaissances universitaires qu’ils supposent. Il complète la formation de l\'étudiant et contribue de ce fait à son orientation. Le stage contribue à 
						la définition du projet professionnel de l\'étudiant et à son insertion professionnelle. Le stage ne peut être assimilé à un emploi de quelque nature qu\'il soit.</p>
					<li>Missions confiées au stagiaire</li>
						<p style="font-weight:normal;text-align:justify;">Les missions confiées au stagiaire sont les suivantes : « ' . $convention->sujet . ' ».<br />
						Ces missions sont définies d’un commun accord entre le tuteur du stagiaire au sein de l’organisme d’accueil et 
						le tuteur du stagiaire au sein de l\'UBS.</p>
				</ol>
				<li>Modalités d\'organisation du stage</li>
				<ol type="1">
					<li>Durée et dates du stage</li>
						<p style="font-weight:normal;text-align:justify;">La durée du stage est fixée à ' . $convention->duree . ' semaines.<br />
						Le stage aura lieu du ' . $convention->date_debut . ' au ' . $convention->date_fin . '.</p>
					<li>Déroulement du stage</li>
						<p style="font-weight:normal;text-align:justify;">Le stage se déroulera à l’adresse suivante : {adrstg} (préciser si différente de l’adresse du siège social).<br />
						Les horaires de travail sont ceux pratiqués au sein de l’organisme. L’étudiant est présent dans l’organisme ' . $convention->nb_jour_semaine . ' jours et '
						. $convention->horaire_hebdo . ' heures au maximum par semaine. Pendant la durée du stage, l’étudiant stagiaire peut être autorisé à revenir à l’Université pour y 
						suivre certains cours. Le calendrier est porté à la connaissance du tuteur de l’organisme avant le début du stage. Toute modification substantielle de l’organisation 
						du stage dans le temps donne lieu à un avenant à la présente convention.
						</p>
					<li>Cas particuliers</li>
						<p style="font-weight:normal;text-align:justify;">Lorsque le stage implique des conditions de travail particulières (travail de nuit, les di-manches ou jours fériés etc…) 
						la nature et la durée de ces obligations doivent être spécifiées préci-sément ci-dessous :<br />'
						. $convention->stage_cond . '</p>
					<li>Accueil et encadrement</li>
						<p style="font-weight:normal;text-align:justify;">Tout stage fait l\'objet d\'un double encadrement par un enseignant de l\'UBS et un membre de l\'organisme. 
						L\enseignant et le membre de l\'organisme ont la qualité de tuteurs du stagiaire. Ils travaillent en collaboration, sont informés et s\'informent de l\'état d\'avancement 
						du stage et des difficultés éventuelles. Le responsable du stage au sein de l\'UBS est le garant de l\'articulation entre les finalités du cursus de formation et celles 
						du stage.<br />
						L\'enseignant(e) responsable des stages est : (le nom du tuteur sera connu et communiqué au tuteur entreprise juste avant le début du stage).<br />
						Le membre de l\'organisme, tuteur du stagiaire est Madame/Monsieur ' . $convention->responsable_tech_np . ' (' . $convention->responsable_tech_tel . ' – '
						 . $convention->responsable_tech_email . ').<br />
						En cas de difficulté nécessitant une réponse immédiate et s\'il y a impossibilité pour les tu-teurs d\'être contactés ou de se contacter, le stagiaire, ou la personne 
						ayant connaissance de la difficulté doit alerter sans délai le secrétariat de la formation concernée au 02 97 62 64 31, iut-va.info@listes.univ-ubs.fr.
						</p>
					<li>Gratification et avantages</li>
						<p style="font-weight:normal;text-align:justify;">Lorsque la durée du stage est inférieure ou égale à deux mois, l’organisme est libre de verser une gratification au 
						stagiaire. Lorsque la durée du stage est supérieure à deux mois consécutifs, l’organisme est tenu de verser une gratification au stagiaire dont le montant minimum est 
						fixé par convention de branche ou accord professionnel ou à défaut à 12.5% du plafond horaire de la sécu-rité sociale défini en application de l’article L241-3 du code 
						de la sécurité sociale. La durée du stage s’apprécie compte tenu de la convention de stage et des éventuels avenants qui ont pour effet de prolonger le stage. 
						La gratification est due au stagiaire à compter du premier jour du premier mois de stage. Elle est versée mensuellement au stagiaire. En cas de suspension ou de résiliation 
						de la convention de stage, le montant de la gratification due au stagiaire est proratisé en fonction de la durée du stage effectuée.<br />
						Dans le cas où la gratification est supérieure à 12.5% du plafond horaire de la sécurité so-ciale défini en application de l’article L241-3 du code de la sécurité sociale, 
						les cotisations so-ciales sont calculées sur le différentiel entre le montant de la gratification et 12.5% du plafond horaire de la sécurité sociale.<br />
						Modalité et montant de la gratification : ' . $convention->retribution . ' € mensuel.<br />
						La gratification est due au stagiaire sans préjudice du remboursement des frais engagés pour effectuer le stage et des avantages offerts, le cas échéant, pour la 
						restauration, l’hébergement et le transport. Montant le cas échéant des indemnités et liste des avantages offerts : ' . $convention->nature . '.
						</p>
					<li>Protection sociale et responsabilité civile</li>
						<p style="font-weight:normal;text-align:justify;">Les modalités de la protection sociale sont précisées dans le tableau en annexe 2. En cas d’accident survenant au stagiaire 
						soit durant sa présence dans au sein de l’organisme soit au cours du trajet entre son domicile et le lieu de stage ou entre l’université et le lieu de stage, l’organisme 
						s’engage à alerter sans délai le secrétariat de la formation concernée au 02 97 62 64 31,  iutva.info@listes.univ-ubs.fr. En cas d’accident survenant au stagiaire pendant les 
						périodes de fermeture de l’Université, l’étudiant ou l’organisme s’engage à avertir sous 48 heures par lettre recommandée avec accusé réception la caisse primaire d’assurance 
						aladie du lieu d’habitation de l’étudiant ainsi que par courrier simple le Président de l’Université. En fonction du montant de la gratification (annexe 2), l’Université ou 
						l’entreprise seront déclarées comme employeurs sur la dé-claration. L’étudiant doit obligatoirement souscrire, auprès de l’organisme d’assurance de son choix, une assurance 
						garantissant sa responsabilité civile pour les dommages qu’il pourrait causer aux personnes ou aux biens dans le cadre du stage. L’organisme prend les dispositions nécessaires 
						pour garantir sa responsabilité afin de couvrir les dommages résultant de la présence du stagiaire.</p>
						<p style="font-weight:normal;text-align:justify;">Stages à l’étranger : si le stage se déroule dans un pays membre de l’Union européenne, de l’espace économique européen ou en Suisse, il appartient à l’étudiant de demander à sa mutuelle la carte européenne d’assurance maladie pour le remboursement de ses soins.  En cas d’accident la pro-cédure administrative à suivre est la même que pour un stage se déroulant en France. Si le stage se déroule à l’étranger dans un autre pays, la protection sociale des étudiants et les formalités à accomplir sont différentes selon le pays d’accueil. Il est conseillé à l’étudiant de se renseigner auprès de sa mu-tuelle  ou auprès de la caisse des français à l’étranger. Si le stage se déroule hors du territoire français, l’étudiant est  invité à souscrire une assurance personnelle rapatriement. En cas d’accident, il appartient à l’étudiant d’en faire la déclaration  à son assurance.</p>
					<li>Discipline et confidentialité</li>
						<p style="font-weight:normal;text-align:justify;">L’étudiant stagiaire est soumis aux dispositions du règlement intérieur de l’organisme rela-tive à l’hygiène et à la sécurité 
						et à la discipline générale (modalités d’accès à l’organisme, utilisa-tion du matériel et des moyens de communication, confidentialité). Concernant la confidentialité, 
						l’étudiant stagiaire prend l’engagement de n’utiliser aucune des informations recueillies par lui au sein de l’organisme en vue de la rédaction de son rapport de stage pour en 
						faire communication à des tiers, sauf accord exprès de l’organisme.</p>
					<li>Interruption, rupture et prolongation du stage</li>
						<p style="font-weight:normal;text-align:justify;">En cas de manquement grave aux règles de discipline, l’organisme se réserve le droit de mettre fin au stage de l’étudiant 
						fautif après avoir pris les avis conjoints des deux tuteurs du sta-giaire. Le stage peut être suspendu ou interrompu pour raison médicale grave. Dans ce cas, la par-tie la plus 
						diligente ou le service de médecine préventive universitaire prévient les autres parties et propose un avenant comportant les aménagements requis ou la rupture de la convention 
						de stage.</p>
				</ol>
				<li>Evaluation du stage</li>
					<p style="font-weight:normal;text-align:justify;">L’activité du stagiaire fait l’objet d’une évaluation qui résulte de la double appréciation des responsables de l’encadrement du stage. En vue de la soutenance, le stagiaire remet :</p>
					<ul>
						<li>1 exemplaire papier du rapport de stage au secrétariat du département Informatique et</li>
						<li>son rapport de stage, sous forme numérique, à son tuteur enseignant.</li>
					</ul>
					<p style="font-weight:normal;text-align:justify;">Le tuteur du stagiaire au sein de l\'organisme transmet au tuteur enseignant de l’Université son appréciation sur le travail effectué. La soutenance est publique, sauf dérogation accordée par le directeur de la composante concernée, sur demande des tuteurs du stagiaire, si les travaux pré-sentent un caractère confidentiel. Toute publication est soumise au visa conjoint de l’organisme, du tuteur du stagiaire au sein de l\'UBS et de l’étudiant. A l’issue du stage, l’organisme délivre à l’étudiant stagiaire un certificat précisant la nature et la durée du stage. Un dossier de stage est constitué et archivé dans la composante concernée pour chaque stage.</p>
					<p style="font-weight:normal;text-align:justify;">Ce dossier comprend :</p>
					<ul>
						<li>un exemplaire de la convention de stage signée ;</li>
						<li>le rapport de stage au format papier relié ;</li>
						<li>l’appréciation du tuteur de l’organisme complétée de la note obtenue par le stagiaire.</li>
					</ul>
					<br /><br />
					<p style="font-weight:normal;text-align:justify;">Fait en 3 exemplaires à Vannes,</p>
					<p style="font-weight:normal;text-align:justify;">Le ' . date("d-m-Y") . '</p>
			</ol>';
			$pdf->writeHTML($html, true, false, true, false, 'center');
			$pdf->MultiCell(70, 5, 'Le représentant de l’organisme', 0, '', 0, 0, '', '', true);
			$pdf->MultiCell(50, 5, 'Le stagiaire', 0, '', 0, 0, '', '', true);
			$pdf->MultiCell(70, 5, 'Pour le Président de l\'UBS,Le Directeur de la composante', 0, '', 0, 0, '', '', true);
			$html = '<br /><br />';
			$pdf->writeHTML($html, true, false, true, false, 'center');
			$pdf->Image('http://i58.tinypic.com/8zeot1.jpg', '', '', 72, 45, '', '', 'N', false, 300, 'R', false, false, 0, false, false, false);
			$pdf->MultiCell(70, 5, $convention->responsable_adm_np, 0, '', 0, 0, '', '', true);
			$pdf->MultiCell(50, 5, $convention->etudiant_np, 0, '', 0, 0, '', '', true);
			$pdf->MultiCell(70, 5, 'Patrice Kermorvant', 0, '', 0, 0, '', '', true);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			$pdf->Output();
			//$pdf->Output(DOCROOT . 'assets/doc/convention-' . $id . '.pdf', 'F');
			//File::download(DOCROOT . 'assets/doc/convention-' . $id . '.pdf', 'convention-' . $id . '.pdf', 'application/pdf');
			//Response::redirect('admin/convention/');
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
