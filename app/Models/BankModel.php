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
    public function countAll()
    {
        $db = db_connect();
        return $db->table('bank')->countAll();
    }
    public function search($cari)
    {
        $db = db_connect();
        $builder = $db->table('bank');
        $banks = $builder->like('nama_bank',$cari,'after')->get()->getResultArray();
        return $banks;
    }
}