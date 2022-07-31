<?php

namespace App\Models;

use CodeIgniter\Model;

class BebanModel extends Model
{
    protected $table = 'databeban';
    protected $allowedFields = ['jenisBeban', 'akun', 'totalBeban', 'header'];
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
