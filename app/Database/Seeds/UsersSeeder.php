<?php namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $password = password_hash('secret',PASSWORD_DEFAULT);
    $now = date('Y-m-d H:i:s');
    $data = [
        [
          'nama' => 'Super Admin',
          'username' => 'superadmin',
          'email'    => 'superadmin@test.com',
          'password' => $password,
          'type' => 1,
        ],
        [
          'nama' => 'User 1',
          'username' => 'user1',
          'email'    => 'user1@test.com',
          'password' => $password,
          'type' => 2,
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
      $this->db->table('users')->insert($d);
    }
  }
}