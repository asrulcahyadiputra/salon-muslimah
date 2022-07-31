<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBebanModel extends Model
{
    protected $table = 'jenisbeban';
    protected $allowedFields = ['jenisBeban', 'header', 'kodeAkun'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataJenisBeban()
    {
        $builder = $this->db->table('jenisbeban');
        $builder->select('*');
        $builder->groupBy('jenisBeban');
        $query = $builder->get();
        return $query;
    }

    // public function save_batch($data)
    // {
    //     $builder = $this->db->table('datatransaksi');
    //     $builder->insertBatch($data);
    // }
}
