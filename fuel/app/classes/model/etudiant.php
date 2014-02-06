<?php

class Model_Etudiant extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'no_etudiant',
		'nom',
		'prenom',
		'datenaissance',
		'sexe',
		'bac',
		'bac_mention',
		'bac_annee',
		'email',
		'adresse1',
		'ville1',
		'adresse2',
		'ville2',
		'telephone1',
		'telephone2',
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
	protected static $_table_name = 'etudiants';

}
