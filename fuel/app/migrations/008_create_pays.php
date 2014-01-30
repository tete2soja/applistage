<?php

namespace Fuel\Migrations;

class Create_pays
{
	public function up()
	{
		\DBUtil::create_table('pays', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 100, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pays');
	}
}