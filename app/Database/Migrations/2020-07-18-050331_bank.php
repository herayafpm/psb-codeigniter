<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bank extends Migration
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
						'no_rek'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '255'
						],
						'atas_nama'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '255'
						],
						'kode_bank'       => [
							'type'           => 'INT',
							'constraint'     => 11,
							'unsigned'       => true,
						],
						'nama_bank'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '255',
						],
						'status'       => [
							'type'           => 'TINYINT',
							'constraint'     => 1,
							'default' => 0,
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
		$this->forge->createTable('bank');
	}

	public function down()
	{
		$this->forge->dropTable('bank');
	}
}
