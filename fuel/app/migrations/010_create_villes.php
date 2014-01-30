<?php

namespace Fuel\Migrations;

class Create_villes
{
	public function up()
	{
		\DBUtil::create_table('villes', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 100, 'type' => 'varchar'),
			'code_postal' => array('constraint' => 11, 'type' => 'int'),
			'pays' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('villes');
	}
}