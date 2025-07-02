<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'name' => [
				'type'       => 'VARCHAR',
				'constraint' => '100'
			],
			'username' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => '100'
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
