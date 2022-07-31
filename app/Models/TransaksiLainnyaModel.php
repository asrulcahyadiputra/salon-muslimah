<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiLainnyaModel extends Model
{
    protected $table = 'datatransaksilainnya';
    protected $allowedFields = ['keteranganTransaksi', 'jenisTransaksi', 'akun', 'totalTransaksi'];
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
