<?php

class Model_Entreprise extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'no_siret',
		'nom',
		'domaine',
		'adresse',
		'ville',
		'url_entreprise',
		'stagiaire'
		'created_at',
		'updated_at',
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
	protected static $_table_name = 'entreprises';

}
