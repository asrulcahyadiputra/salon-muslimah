<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanModel extends Model
{
    protected $table = 'databahan';
    protected $allowedFields = ['namaBarang', 'kuantitasBarang', 'idPeralatan', 'totalBahan', 'priceBarang'];
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
