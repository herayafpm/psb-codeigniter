<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KonfirmasiPendaftaran extends Migration
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
						],
						'bukti' => [
								'type' => 'VARCHAR',
								'constraint' => '255',
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
		$this->forge->createTable('konfirmasi_pendaftaran');
	}

	public function down()
	{
		$this->forge->dropTable('konfirmasi_pendaftaran');
	}
}
