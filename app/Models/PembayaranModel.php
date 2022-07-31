<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $allowedFields = ['statusPembayaran', 'kodetransaksi', 'tanggalPembayaran', 'totalPembayaran', 'totalProduk'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataProdukTerjual()
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('*');
        $builder->selectSum('totalPembayaran');
        $builder->selectSum('totalProduk');
        // $builder->groupBy('namaBarang');
        $query = $builder->get();
        return $query;
    }
}
