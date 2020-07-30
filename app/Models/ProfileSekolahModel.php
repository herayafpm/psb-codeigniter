<?php namespace App\Models;

use CodeIgniter\Model;

class ProfileSekolahModel extends Model
{
    protected $table      = 'profile_sekolah';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nama','email','no_hp','alamat'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}