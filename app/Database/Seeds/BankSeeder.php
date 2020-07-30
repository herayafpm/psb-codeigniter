<?php namespace App\Database\Seeds;

class BankSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $now = date('Y-m-d H:i:s');
    $data = [
        [
          'no_rek' => '1051411858',
          'atas_nama' => 'Pondok Pesantren Darussalam',
          'kode_bank'    => 422,
          'nama_bank' => 'BRI Syariah',
          'status' => 1
        ],
    ];

    // Simple Queries
    // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
    //   $data
    // );
    foreach ($data as $d) {
      $d['created_at'] = $now;
      $d['updated_at'] = $now;
      // Using Query Builder
      $this->db->table('bank')->insert($d);
    }
  }
}