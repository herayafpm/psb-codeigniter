<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAjaran extends Migration
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
						'judul'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '255'
						],
						'tanggal_mulai'       => [
							'type'           => 'DATETIME',
							'null'     => true,
						],
						'tanggal_berakhir'       => [
							'type'           => 'DATETIME',
							'null'     => true,
						],
						'biaya_daftar'       => [
							'type'           => 'REAL',
							'unsigned' => true
						],
						'kuota' => [
							'type'           => 'INT',
							'constraint'     => 11,
							'unsigned'       => true,
						],
						'status' => [
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
		$this->forge->createTable('tahun_ajaran');
	}

	public function down()
	{
		$this->forge->dropTable('tahun_ajaran');
	}
}
