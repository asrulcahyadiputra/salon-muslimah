<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranTransaksiLainnyaModel extends Model
{
    protected $table = 'pembayarantransaksilainnya';
    protected $allowedFields = ['statusPembayaran', 'akun', 'tanggalPembayaran', 'totalTransaksi'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getTotalPembelianTransaksiLainnya()
    {
        $builder = $this->db->table('datatransaksilainnya');
        $builder->select('*');
        $builder->selectSum('totalTransaksi');
        $builder->groupBy('akun');
        $query = $builder->get();
        return $query;
    }
    public function getTransaksiTransaksiLainnyaByFilter($bulan, $tahun)
    {
        $builder = $this->db->table('pembayarantransaksilainnya');
        $builder->select('*');
        // $builder->selectSum('totalAset');
        // $builder->groupBy('akun');
        $builder->where("Month(tanggalPembayaran)", $bulan);
        $builder->where("Year(tanggalPembayaran)", $tahun);
        $query = $builder->get();
        return $query;
    }
}
