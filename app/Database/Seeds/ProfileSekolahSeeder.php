<?php namespace App\Database\Seeds;

class ProfileSekolahSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $now = date('Y-m-d H:i:s');
    $data = [
        [
          'nama' => 'PONPES Heraya',
          'email' => 'herayafpm@gmail.com',
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
      $this->db->table('profile_sekolah')->insert($d);
    }
  }
}