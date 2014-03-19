<?php

class Model_Pays extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'code',
		'nom',
		'nom_en',
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
	
	public static $_table_name = 'pays';
	
	public static function find_id($name) {
		$req = DB::query('SELECT id FROM ? WHERE nom = ? ');
		$req->execute(array('pays', strip_tags($name)));
		$donnees = $req->fetch();
		$req->closeCursor();
		$ret_id = $donnees['id'];
		return $ret_id;
	}

}
