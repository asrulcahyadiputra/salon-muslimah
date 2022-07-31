<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranBahanModel extends Model
{
    protected $table = 'pembayaranbahan';
    protected $allowedFields = ['statusPembayaran', 'idPeralatan', 'tanggalPembayaran', 'totalBahan'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getTransaksiBahanByFilter($bulan, $tahun)
    {
        $builder = $this->db->table('pembayaranbahan');
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
