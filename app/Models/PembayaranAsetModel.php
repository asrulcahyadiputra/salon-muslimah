<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranAsetModel extends Model
{
    protected $table = 'pembayaranaset';
    protected $allowedFields = ['statusPembayaran', 'akun', 'tanggalPembayaran', 'totalAset'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getTotalPembelianAset()
    {
        $builder = $this->db->table('dataaset');
        $builder->select('*');
        $builder->selectSum('totalAset');
        $builder->groupBy('akun');
        $query = $builder->get();
        return $query;
    }
    public function getTransaksiAsetByFilter($bulan, $tahun)
    {
        $builder = $this->db->table('pembayaranaset');
        $builder->select('*');
        // $builder->selectSum('totalAset');
        // $builder->groupBy('akun');
        $builder->where("Month(tanggalPembayaran)", $bulan);
        $builder->where("Year(tanggalPembayaran)", $tahun);
        $query = $builder->get();
        return $query;
    }
}
