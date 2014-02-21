<?php

class Model_Entreprise extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'nom',
		'adresse',
		'ville',
		'pays',
		'url_entreprise',
		'stagiaire',
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
	protected static $_table_name = 'entreprise';

}
