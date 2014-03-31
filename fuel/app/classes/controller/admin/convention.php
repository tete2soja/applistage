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

	public function action_index($id = null)
	{
		if(!empty($id)) {
			if($id=="dut") {
				$promo = 1;
			}
			elseif($id=="lp") {
				$promo = 2;
			}
			else {
				$promo = 0;
			}
		} else {
			$promo = 0; 
		}
		$data['promo'] = $promo;
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
		else if (isset($_POST['generee'])) {
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
			if (($convention->ent_pays_id == 67)&&($convention->type == 0)) {
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
			}
			else if (($convention->ent_pays_id == 67)&&($convention->type == 1)) {
					$html = '<br />
					<h1 style="text-align:center;">CONVENTION DE STAGE</h1>
					<p style="text-align:center;font-weight:bold;">Stage se déroulant dans une collectivité territoriale.</p>
					<p>Les parties conviennent d\'organiser le stage de DUT INFORMATIQUE conformément à la cir-culaire du 4 novembre 2009 du ministère de l’intérieur, de l’outre mer et des collectivités territo-riales relative aux modalités d’accueil des étudiants de l’enseignement supérieur en stage dans les collectivités territoriales et leurs établissements publics ne présentant pas un caractère industriels et commercial :</p>
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
						<li>2. La collectivité territoriale ci-après-désigné par l’organisme d’accueil :</li>
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
			}
			else if (($convention->ent_pays_id != 67)&&($convention->langue == 0)) {
					$html = '<br />
					<h1 style="text-align:center;">CONVENTION DE STAGE</h1>
					<p style="text-align:center;font-weight:bold;">Stage se déroulant à l\'étranger en entreprise publique ou privée, en association, en établis-sement public à caractère industriel et commercial.</p>
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
			}
			else if (($convention->ent_pays_id != 67)&&($convention->langue != 0)) {
					$html = '<br />
					<h1 style="text-align:center;">Vocational Placement Agreement</h1>
					<p>The parties agree to organise the work placement of DUT INFORMATIQUE in compliance with the Charter for Student Vocational Placements signed on 26 April 2006 (annex 1 only available in French) and the terms set below:p>
					<ol type="I" style="font-weight:bold;">
					<li style="font-weight:bold;">The Parties</li>
					<ol type="1">
						<li>1. The University of South Brittany:</li>
							<p style="font-weight:normal;text-align:justify;">Rue Armand Guillemot à LORIENT (56100) - France,
							Represented by its President, Monsieur Jean PEETERS.<br />
							For the present agreement, the contact person is:
							IUT de Vannes : 8 rue Montaigne – BP 561 – 56017 VANNES cedex – France
							Represented by its Dean/Head, Monsieur Patrice KERMORVANT.
							</p>
						<li>2. The Company (or University or Organisation):</li>
							<p style="font-weight:normal;text-align:justify;">' . $convention->ent_nom . '<br />
							' . $convention->ent_adresse . ' ' . $convention->ent_ville . ' ' . $convention->ent_code . '<br />
							Represented by: ' . $convention->responsable_adm_np . ' ' . $convention->responsable_adm_tel . ' ' . $convention->responsable_adm_email . '</p>
						<li>La collectivité territoriale ci-après-désigné par l’organisme d’accueil :</li>
							<p style="font-weight:normal;text-align:justify;">
								Degree Level: <br/>
								Adress / phone / email: ' . $convention->etudiant_adr . '<br/>
								Person to be contacted in case of emergency: ' . $convention->contact_urgence .'
							</p>
					</ol>
					<li>Academic project and aim of the placement/li>
					<ol type="1">
						<li>Academic and Professional Objectives of the placement</li>
							<p style="font-weight:normal;text-align:justify;">The placement is compulsory. It is necessary for graduation and aims to apply the concepts taught at university.<br />
							The placement allows better understanding of work culture, workplace situations, profes-sional skills and academic knowledge applicability. It complements the
							student’s training and thus contributes to his/her orientation.<br />
							The placement contributes to the student’s professional project and his/her employability.<br />
							Under the agreement, the trainee is not to be taken to be the company’s employee.
							</p>
						<li>Academic and Professional Objectives of the placement</li>
							<p style="font-weight:normal;text-align:justify;">The trainees will carry out the following assignments: « ' . $convention->sujet . ' ».<br />
							These assignments have been jointly defined by the trainee’s mentor in the company and the academic advisor in UBS.</p>
					</ol>
					<li>Organisation of the placement</li>
					<ol type="1">
						<li>Duration and dates of the placement</li>
							<p style="font-weight:normal;text-align:justify;">The duration of the placement will be: ' . $convention->duree . ' semaines.<br />
							The placement will begin on ' . $convention->date_debut . ' and will be completed on ' . $convention->date_fin . '.</p>
						<li>Placement scheme details</li>
							<p style="font-weight:normal;text-align:justify;">The training will take place at address: {adrstg} (préciser si différente de l’adresse du siège social).<br />
							The student will be present in the company a maximum of ' . $convention->nb_jour_semaine . ' days and '	. $convention->horaire_hebdo . ' hours per week. 
							In the course of the placement, the trainee may be authorised to attend classes in University. The schedule is made known to the mentor in the company before the placement begins.
							Any substantial change to the placement organisation will be notified in an amendment to the present agreement.
							</p>
						<li>Special cases</li>
							<p style="font-weight:normal;text-align:justify;">When the placement involves particular working conditions (work at night, on Sundays or bank holidays, etc…) the nature and duration 
							of such requirements must be specified below:<br />'
							. $convention->stage_cond . '</p>
						<li>Integration into the company and supervision</li>
							<p style="font-weight:normal;text-align:justify;">Any placement enjoys joint supervision by an UBS academic supervisor and a mentor in the company.<br />
							The academic supervisor and the mentor in the company are both held to be the trainee’s tu-tors. They work in collaboration, are informed on and inform each other on how the 
							placement pro-gresses and on possible difficulties.<br />
							The person responsible for the placement in UBS guarantees adequacy between the objec-tives of the academic programme and those of the placement.<br />
							The academic supervisor and trainee’s tutor is (the name of the academic supervisor will be communicated just before the beginning of the placement)
							<br />
							The trainee’s mentor in the company and tutor is Mr/Mrs ' . $convention->responsable_tech_np . ' (' . $convention->responsable_tech_tel . ' – '
							 . $convention->responsable_tech_email . ').<br />
							In case of difficulty requiring immediate response and if it is impossible for the tutors to be contacted or to contact each other, the trainee or the person aware of the difficulty 
							should im-mediately inform the secretary of the trainee’s academic programme: +33 2.97.62.64.31, iut-va.info@listes.univ-ubs.fr.
							</p>
						<li>Gratification et avantages</li>
							<p style="font-weight:normal;text-align:justify;">The company is free to pay a gratuity to the trainee.<br />
							The amount of the (possible) gratuity is: ' . $convention->retribution . ' by month.<br />
							The company can also pay the trainee compensation for the costs incurred by the placement (accommodation, meals, transport…). List of the compensations hereafter: ' . $convention->nature . '.
							</p>
						<li>Social welfare and civil liability</li>
							<p style="font-weight:normal;text-align:justify;">In the event of the trainee suffering an accident while on the company’s premises or on his/her way from home to the placement or between the 
							university and the placement, the com-pany undertakes to immediately inform the secretary of the trainee’s academic programme: +33 2.97.62.64.31, iutva.info@listes.univ-ubs.fr.<br />
							In the event of the trainee suffering an accident while the university is closed, the trainee or the company undertakes to inform the local Department of Health Office by registered post with 
							acknowledgement of receipt within 48 hours and the university president by regular post.<br />
							In both cases, the student shall send the Department of Health Office the file on placements abroad given to him prior to his/her departure.<br />
							The student shall take out an insurance policy with any company of his/her choice to protect his/her civil liability against the damage he/she might cause to persons or to property during 
							the placement.<br />
							The company manager shall take the necessary measures to guarantee his/her liability and cover the damage that may result from the trainee’s presence.<br />
							If the placement is to take place in an EU country, it is incumbent on the student to ask his/her in-surance company for the European Health Insurance Card (EHIC) for treatment expenses to be 
							refun-ded.<br />
							If the placement is to take place outside an EU country, students’ social welfare and procedures vary depending on the host country. The student is advised to ask his/her private insurance 
							company or the Department of Health Office for French People Abroad.<br />
							If the placement is to take place outside France, the student is advised to take out repatriation in-surance. In the event of an accident, it is up to the student to notify his/her insurance company.
							</p>
						<li>Discipline and confidentiality</li>
							<p style="font-weight:normal;text-align:justify;">The trainee shall conform to the Health and Safety Policies and Procedures Manual (access to the workplace, use of facilities and means of 
							communication, confidentiality).<br />
							As regards confidentiality, the trainee undertakes not to use any information obtained by him in the company with a view to writing his/her placement report and making it known to a third 
							party, unless otherwise expressly agreed by the company.
							</p>
						<li>End, termination and extension of the placement</li>
							<p style="font-weight:normal;text-align:justify;">In the event of a serious breach of company regulations by the trainee, the company manager reserves the right to terminate the placement after 
							jointly consulting with both the trainee’s tutors.<br />
							The placement may be suspended or terminated for serious medical reasons. In this case, the first party to be informed or the university’s medical service shall notify the other parties and sug-gest 
							an amendment with the required modifications or the termination of the placement agreement.<br />
							The extension is not taken into account in the student’s academic programme but shall con-form to the objectives of the placement, and contribute to achieving the goals and fulfilling the as-signments 
							as initially set.
							</p>
					</ol>
					<li>Assessment of the placement</li>
						<p style="font-weight:normal;text-align:justify;">The trainee’s activity is jointly assessed by the two tutors supervising the placement.<br />
						At the end of the placement, the trainee must deliver:
						</p>
						<ul>
							<li>one paper copy of the placement report to the the secretary of the trainee’s academic pro-gramme,</li>
							<li>a digital copy of the placement report to his/her academic supervisor.</li>
						</ul>
						<p style="font-weight:normal;text-align:justify;">The trainee’s tutor in the company gives the academic supervisor his/her opinion on the work done by the trainee.
						The defence is public, unless dispensation has been granted by the dean, at the request of the trainee’s tutors if the report contains confidential information.
						Any publication is submitted for consent to the company manager, the academic supervisor and the tutor in the company.
						At the end of the placement, the company issues the trainee a certificate stating the nature and the duration of the placement.
						A placement dossier is opened and stored in the faculty for each placement.
						</p>
						<p style="font-weight:normal;text-align:justify;">The dossier comprises:</p>
						<ul>
							<li>A copy of the signed placement agreement;;</li>
							<li>A paper copy of the placement report;</li>
							<li>The company tutor’s opinion along with the mark given to the trainee.</li>
						</ul>
						<br /><br />
						<p style="font-weight:normal;text-align:justify;">Done in 3 copies in Vannes,</p>
						<p style="font-weight:normal;text-align:justify;">On ' . date("d-m-Y") . '</p>
					</ol>';
			}
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
			//$pdf->Output();
			$pdf->Output(DOCROOT . 'assets/doc/convention-' . $convention->no_etudiant . '.pdf', 'F');
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
		elseif (isset($_POST['uploader'])) {
			$id_etudiant = $_POST['uploader'];
			//Import uploaded file to Database
			$config = array(
				'path' => DOCROOT.'assets/doc/convention/',
				'randomize' => true,
				'ext_whitelist' => array('pdf', 'odt', 'doc', 'docx', 'PDF', 'ODT', 'DOC', 'DOCX'),
			);

			// process the uploaded files in $_FILES
			Upload::process($config);

			// if there are any valid files
			if (Upload::is_valid())
			{
				// save them according to the config
				Upload::save();
				$filename = array_column(Upload::get_files(), 'saved_as');
				$tmp_name = current($filename);
				//move_uploaded_file($_FILES["filename"]["tmp_name"], DOCROOT.'assets/tmp/' . $filename);
				list($null, $ext) = explode('.', basename($_FILES['filename']['name']));
				File::rename(DOCROOT.'assets/doc/convention/' . $tmp_name, DOCROOT.'assets/doc/convention/' . $id_etudiant . '.' . $ext);				
				$chemin_file = 'assets/doc/convention/' . $id_etudiant . '.' . $ext;
				$query = DB::update('fichestages');
				$query->value('chemin_file', $chemin_file);				
				$query->where('id', $id);
				$query->execute();
			}
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