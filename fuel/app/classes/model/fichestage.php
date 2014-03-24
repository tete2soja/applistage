<?php

class Model_Fichestage extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'etudiant',
		'sujet',
		'description_stage',
		'environnement_dev',
		'observations_resp',
		'indemnite',
		'entreprise',
		'responsable_legal',
		'responsable_adm',
		'contact_urgence',
		'rpz_np',
		'rpz_adresse',
		'rpz_tel',
		'origine_offre',
		'type',
		'langue',
		'duree',
		'date_debut',
		'date_fin',
		'allongee',
		'nb_jour_semaine',
		'horaire_hebdo',
		'retribution',
		'nature',
		'etat',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'fichestages';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('etudiant', 'Etudiant', 'required|valid_string[numeric]');
		$val->add_field('sujet', 'Sujet', 'required|max_length[255]');
		$val->add_field('description_stage', 'Description Stage', 'required|max_length[255]');
		$val->add_field('environnement_dev', 'Environnement Dev', 'required|max_length[255]');
		$val->add_field('observations_resp', 'Observations Resp', 'required|max_length[255]');
		$val->add_field('indemnite', 'Indemnite', 'required|valid_string[numeric]');
		$val->add_field('entreprise', 'Entreprise', 'required|valid_string[numeric]');
		$val->add_field('responsable_legal', 'Responsable Legal', 'required|valid_string[numeric]');
		$val->add_field('responsable_adm', 'Responsable Adm', 'required|valid_string[numeric]');
		$val->add_field('contact_urgence', 'Contact Urgence', 'required|max_length[255]');
		$val->add_field('rpz_np', 'Rpz Np', 'required|max_length[255]');
		$val->add_field('rpz_adresse', 'Rpz Adresse', 'required|max_length[255]');
		$val->add_field('rpz_tel', 'Rpz Tel', 'required|max_length[255]');
		$val->add_field('origine_offre', 'Origine Offre', 'required|valid_string[numeric]');
		$val->add_field('type', 'Type', 'required|valid_string[numeric]');
		$val->add_field('langue', 'Langue', 'required|valid_string[numeric]');
		$val->add_field('duree', 'Duree', 'required|valid_string[numeric]');
		$val->add_field('date_debut', 'Date Debut', 'required');
		$val->add_field('date_fin', 'Date Fin', 'required');
		$val->add_field('allongee', 'Allongee', 'required|valid_string[numeric]');
		$val->add_field('nb_jour_semaine', 'Nb Jour Semaine', 'required|valid_string[numeric]');
		$val->add_field('horaire_hebdo', 'Horaire Hebdo', 'required|valid_string[numeric]');
		$val->add_field('retribution', 'Retribution', 'required|valid_string[numeric]');
		$val->add_field('nature', 'Nature', 'required|max_length[255]');
		$val->add_field('etat', 'Etat', 'required|valid_string[numeric]');

		return $val;
	}

}
