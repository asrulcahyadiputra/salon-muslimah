<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'datatransaksiservice';
    protected $allowedFields = ['jenisService', 'kodetransaksi', 'jenisPelayanan', 'jenisPesan', 'diskon', 'totalService', 'pricePemesanan'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataPemesananService()
    {
        $builder = $this->db->table('pembayaranservice');
        $builder->select('*');
        $builder->join('datatransaksiservice', 'datatransaksiservice.kodetransaksi = pembayaranservice.kodetransaksi', 'left');
        // $builder->selectSum('totalPembayaran');
        // $builder->selectSum('totalService');
        // $builder->groupBy('jenisService');
        $query = $builder->get();
        return $query;
    }

    public function save_batch($data)
    {
        $builder = $this->db->table('datatransaksiservice');
        $builder->insertBatch($data);
    }
}
