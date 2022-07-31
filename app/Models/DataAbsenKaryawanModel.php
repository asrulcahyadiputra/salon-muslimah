<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAbsenKaryawanModel extends Model
{
    protected $table = 'absenkaryawan';
    protected $allowedFields = ['idKaryawan', 'hadir', 'absen', 'izin'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    // public function getDataTransaksi()
    // {
    //     $builder = $this->db->table('datakelolaadmin');
    //     $builder->select('*');
    //     $builder->join('datatransaksi', 'datatransaksi.kodetransaksi = datakelolaadmin.kodetransaksi', 'left');
    //     $query = $builder->get();
    //     return $query;
    // }

    // public function save_batch($data)
    // {
    //     $builder = $this->db->table('datatransaksi');
    //     $builder->insertBatch($data);
    // }
}
