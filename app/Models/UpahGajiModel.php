<?php

namespace App\Models;

use CodeIgniter\Model;

class UpahGajiModel extends Model
{
    protected $table = 'transaksigaji';
    protected $allowedFields = ['namaKaryawan', 'tanggalPenggajian', 'upahGaji', 'statusPembayaran'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getTransaksiGajiByFilter($bulan, $tahun)
    {
        $builder = $this->db->table('transaksigaji');
        $builder->select('*');
        // $builder->selectSum('totalAset');
        // $builder->groupBy('akun');
        $builder->where("statusPembayaran", 'Sudah Dibayar');
        $builder->where("Month(tanggalPenggajian)", $bulan);
        $builder->where("Year(tanggalPenggajian)", $tahun);
        $query = $builder->get();
        return $query;
    }

    // public function save_batch($data)
    // {
    //     $builder = $this->db->table('datatransaksi');
    //     $builder->insertBatch($data);
    // }
}
