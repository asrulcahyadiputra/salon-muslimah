<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $table = 'dataaset';
    protected $allowedFields = ['namaAset', 'jenisAset', 'kuantitasAset', 'akun', 'totalAset', 'priceAset'];
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
