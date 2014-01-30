<?php

namespace Fuel\Migrations;

class Create_contacts
{
	public function up()
	{
		\DBUtil::create_table('contacts', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'nom' => array('constraint' => 30, 'type' => 'varchar'),
			'prenom' => array('constraint' => 30, 'type' => 'varchar'),
			'telephone' => array('constraint' => 11, 'type' => 'int'),
			'entreprise' => array('constraint' => 11, 'type' => 'int'),
			'encadre' => array('type' => 'tinyint'),
			'signe' => array('type' => 'tinyint'),
			'propose' => array('type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('contacts');
	}
}