<?php namespace App\Database\Seeds;

class InitSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $this->call('UsersSeeder');
    $this->call('ProfileSekolahSeeder');
    $this->call('TahunAjaranSeeder');
    $this->call('BankSeeder');
  }
}