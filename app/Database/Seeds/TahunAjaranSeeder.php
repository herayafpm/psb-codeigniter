<?php namespace App\Database\Seeds;

class TahunAjaranSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $now = date('Y-m-d H:i:s');
    $data = [
        [
          'judul' => 'Gelombang 1 2020',
          'tanggal_mulai' => date('Y-m-d').' 00:00:00',
          'tanggal_berakhir' => date('Y-m-d').' 23:59:59',
          'biaya_daftar' => 150000,
          'kuota'    => 100,
          'status' => 1,
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
      $this->db->table('tahun_ajaran')->insert($d);
    }
  }
}