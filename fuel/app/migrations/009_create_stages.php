<?php

namespace Fuel\Migrations;

class Create_stages
{
	public function up()
	{
		\DBUtil::create_table('stages', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'etudiant' => array('constraint' => 11, 'type' => 'int'),
			'contact' => array('constraint' => 30, 'type' => 'varchar'),
			'enseignant' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stages');
	}
}