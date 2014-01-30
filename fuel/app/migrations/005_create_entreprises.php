<?php

namespace Fuel\Migrations;

class Create_entreprises
{
	public function up()
	{
		\DBUtil::create_table('entreprises', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'no_siret' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 30, 'type' => 'varchar'),
			'domaine' => array('constraint' => 30, 'type' => 'varchar'),
			'adresse' => array('constraint' => 100, 'type' => 'varchar'),
			'ville' => array('constraint' => 30, 'type' => 'varchar'),
			'url_entreprise' => array('constraint' => 50, 'type' => 'varchar'),
			'stagiaire' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('entreprises');
	}
}