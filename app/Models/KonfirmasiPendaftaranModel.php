<?php namespace App\Models;

use CodeIgniter\Model;

class KonfirmasiPendaftaranModel extends Model
{
    protected $table      = 'konfirmasi_pendaftaran';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nama','email','no_hp','bukti'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}