<?php

class Model_Stage extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'etudiant',
		'contact',
		'enseignant',
		'entreprise',
		'sujet',
		'visibilite',
		'contexte',
		'resultats',
		'conditions',
		'url_doc',
		'public',
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
	protected static $_table_name = 'stages';

}
