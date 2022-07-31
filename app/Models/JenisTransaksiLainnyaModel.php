<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisTransaksiLainnyaModel extends Model
{
    protected $table = 'jenistransaksilainnya';
    protected $allowedFields = ['jenisTransaksiLainnya'];
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
