<?php

namespace Fuel\Migrations;

class Create_admin_propositions
{
	public function up()
	{
		\DBUtil::create_table('admin_propositions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'sujet' => array('constraint' => 255, 'type' => 'varchar'),
			'nomcontact' => array('constraint' => 255, 'type' => 'varchar'),
			'publicproposition' => array('constraint' => 11, 'type' => 'int'),
			'contextestage' => array('constraint' => 255, 'type' => 'varchar'),
			'conditionstage' => array('constraint' => 255, 'type' => 'varchar'),
			'proposition' => array('constraint' => 255, 'type' => 'varchar'),
			'indemnite' => array('constraint' => 11, 'type' => 'int'),
			'public' => array('constraint' => 11, 'type' => 'int'),
			'entreprise' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('admin_propositions');
	}
}