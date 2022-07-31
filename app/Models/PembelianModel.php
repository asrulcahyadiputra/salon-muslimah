<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'datatransaksi';
    protected $allowedFields = ['namaProduk', 'jumlahProduk', 'total', 'kodetransaksi', 'price'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataPembelianProduk()
    {
        $builder = $this->db->table('datatransaksi');
        $builder->select('*');
        $builder->join('pembayaran', 'pembayaran.kodetransaksi = datatransaksi.kodetransaksi', 'left');
        $builder->selectSum('totalPembayaran');
        $builder->selectSum('totalProduk');
        $builder->groupBy('namaProduk');
        $query = $builder->get();
        return $query;
    }
    // public function getDataTransaksi()
    // {
    //     $builder = $this->db->table('datakelolaadmin');
    //     $builder->select('*');
    //     $builder->join('datatransaksi', 'datatransaksi.kodetransaksi = datakelolaadmin.kodetransaksi', 'left');
    //     $query = $builder->get();
    //     return $query;
    // }

    public function save_batch($data)
    {
        $builder = $this->db->table('datatransaksi');
        $builder->insertBatch($data);
    }
}
