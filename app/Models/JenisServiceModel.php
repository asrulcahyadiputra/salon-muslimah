<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisServiceModel extends Model
{
    protected $table = 'jenisservice';
    protected $allowedFields = ['jenisService'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    // public function save_batch($data)
    // {
    //     $builder = $this->db->table('datatransaksi');
    //     $builder->insertBatch($data);
    // }
}
