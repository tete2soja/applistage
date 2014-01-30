<?php

namespace Fuel\Migrations;

class Create_fichestages
{
	public function up()
	{
		\DBUtil::create_table('fichestages', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'sujet' => array('constraint' => 50, 'type' => 'varchar'),
			'nomcontact' => array('constraint' => 30, 'type' => 'varchar'),
			'publicproposition' => array('type' => 'tinyint'),
			'contextestage' => array('constraint' => 400, 'type' => 'varchar'),
			'conditionstage' => array('constraint' => 400, 'type' => 'varchar'),
			'proposition' => array('constraint' => 400, 'type' => 'varchar'),
			'indemnite' => array('type' => 'tinyint'),
			'public' => array('type' => 'tinyint'),
			'entreprise' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('fichestages');
	}
}