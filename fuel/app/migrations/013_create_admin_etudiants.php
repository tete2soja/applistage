<?php

namespace Fuel\Migrations;

class Create_admin_etudiants
{
	public function up()
	{
		\DBUtil::create_table('admin_etudiants', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'no_etudiant' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 255, 'type' => 'varchar'),
			'prenom' => array('constraint' => 255, 'type' => 'varchar'),
			'datedenaissance' => array('type' => 'date'),
			'sexe' => array('constraint' => 11, 'type' => 'int'),
			'bac' => array('constraint' => 255, 'type' => 'varchar'),
			'mention' => array('constraint' => 255, 'type' => 'varchar'),
			'bac_annee' => array('constraint' => 11, 'type' => 'int'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'adresse1' => array('constraint' => 255, 'type' => 'varchar'),
			'ville1' => array('constraint' => 255, 'type' => 'varchar'),
			'adresse2' => array('constraint' => 255, 'type' => 'varchar'),
			'ville2' => array('constraint' => 255, 'type' => 'varchar'),
			'telephone1' => array('constraint' => 255, 'type' => 'varchar'),
			'telephone2' => array('constraint' => 255, 'type' => 'varchar'),
			'iut_annee' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('admin_etudiants');
	}
}