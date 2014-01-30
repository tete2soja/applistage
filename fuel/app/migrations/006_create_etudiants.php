<?php

namespace Fuel\Migrations;

class Create_etudiants
{
	public function up()
	{
		\DBUtil::create_table('etudiants', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'no_etudiant' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 30, 'type' => 'varchar'),
			'prenom' => array('constraint' => 30, 'type' => 'varchar'),
			'datenaissance' => array('type' => 'date'),
			'sexe' => array('type' => 'tinyint'),
			'bac' => array('constraint' => 3, 'type' => 'varchar'),
			'bac_mention' => array('constraint' => 3, 'type' => 'varchar'),
			'bac_annee' => array('type' => 'date'),
			'email' => array('constraint' => 30, 'type' => 'varchar'),
			'adresse1' => array('constraint' => 100, 'type' => 'varchar'),
			'ville1' => array('constraint' => 100, 'type' => 'varchar'),
			'adresse2' => array('constraint' => 100, 'type' => 'varchar'),
			'ville2' => array('constraint' => 100, 'type' => 'varchar'),
			'telephone1' => array('constraint' => 11, 'type' => 'int'),
			'telephone2' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('etudiants');
	}
}