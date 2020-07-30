<?php namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model
{
    protected $table      = 'bank';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['no_rek','atas_nama','kode_bank','nama_bank','status'];

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