<?php namespace App\Models;

use CodeIgniter\Model;

class TahunAjaranModel extends Model
{
    protected $table      = 'tahun_ajaran';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['judul','tanggal_mulai','tanggal_berakhir','biaya_daftar','kuota','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    public function getByNow()
    {
        $db = \Config\Database::connect();
        $now = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM tahun_ajaran WHERE status = :status: AND tanggal_mulai <= :now: AND tanggal_berakhir >= :now:";
        $data = $db->query($sql,[
                'now' => $now,
                'status' => 1
            ])->getResult();
        if(empty($data)){
            return false;
        }else{
            return $data[0];
        }
    }
}