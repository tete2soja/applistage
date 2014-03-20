<?php

namespace Fuel\Migrations;

class Create_admin_stages
{
	public function up()
	{
		\DBUtil::create_table('admin_stages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'etudiant' => array('constraint' => 11, 'type' => 'int'),
			'contact' => array('constraint' => 11, 'type' => 'int'),
			'enseignant' => array('constraint' => 11, 'type' => 'int'),
			'entreprise' => array('constraint' => 11, 'type' => 'int'),
			'sujet' => array('constraint' => 255, 'type' => 'varchar'),
			'visibilite' => array('constraint' => 11, 'type' => 'int'),
			'contexte' => array('constraint' => 255, 'type' => 'varchar'),
			'resultats' => array('constraint' => 255, 'type' => 'varchar'),
			'conditions' => array('constraint' => 255, 'type' => 'varchar'),
			'url_doc' => array('constraint' => 255, 'type' => 'varchar'),
			'public' => array('constraint' => 11, 'type' => 'int'),
			'valide' => array('constraint' => 11, 'type' => 'int'),
			'date' => array('type' => 'date'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('admin_stages');
	}
}