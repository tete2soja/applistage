<?php

namespace Fuel\Migrations;

class Create_enseignants
{
	public function up()
	{
		\DBUtil::create_table('enseignants', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'no_enseignant' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 30, 'type' => 'varchar'),
			'prenom' => array('constraint' => 30, 'type' => 'varchar'),
			'telephone' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('enseignants');
	}
}