<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProfileSekolah extends Migration
{
	public function up()
	{
		$this->forge->addField([
						'id'          => [
								'type'           => 'INT',
								'constraint'     => 11,
								'unsigned'       => true,
								'auto_increment' => true,
						],
						'nama'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '255',
						],
						'email' => [
								'type'           => 'VARCHAR',
								'constraint' => '255',
								'unique' => true
						],
						'no_hp' => [
								'type' => 'VARCHAR',
								'constraint' => '255',
								'default' => null
						],
						'alamat' => [
								'type' => 'VARCHAR',
								'constraint' => '255',
								'default' => null
						],
						'created_at' => [
							'type' => 'DATETIME',
							'null' => true
						],
						'updated_at' => [
							'type' => 'DATETIME',
							'null' => true
						],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('profile_sekolah');
	}

	public function down()
	{
		$this->forge->dropTable('profile_sekolah');
	}
}
