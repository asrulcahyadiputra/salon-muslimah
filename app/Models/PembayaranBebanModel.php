<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranBebanModel extends Model
{
    protected $table = 'pembayaranbeban';
    protected $allowedFields = ['statusPembayaran', 'akun', 'tanggalPembayaran', 'totalBeban', 'header'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getTransaksiBebanByFilter($bulan, $tahun)
    {
        $builder = $this->db->table('pembayaranbeban');
        $builder->select('*');
        // $builder->selectSum('totalAset');
        // $builder->groupBy('akun');
        $builder->where("Month(tanggalPembayaran)", $bulan);
        $builder->where("Year(tanggalPembayaran)", $tahun);
        $query = $builder->get();
        return $query;
    }
    // public function getTotalPembelianBeban()
    // {
    //     $builder = $this->db->table('databeban');
    //     $builder->select('*');
    //     $builder->selectSum('totalBeban');
    //     $builder->groupBy('akun');
    //     $query = $builder->get();
    //     return $query;
    // }
}
