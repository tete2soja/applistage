<?php

namespace Fuel\Migrations;

class Create_admin_enseignants
{
	public function up()
	{
		\DBUtil::create_table('admin_enseignants', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'nom' => array('constraint' => 255, 'type' => 'varchar'),
			'prenom' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('admin_enseignants');
	}
}