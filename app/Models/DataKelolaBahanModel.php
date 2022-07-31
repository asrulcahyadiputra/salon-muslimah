<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKelolaBahanModel extends Model
{
    protected $table = 'datakelolabahan';
    protected $allowedFields = ['idPeralatan', 'tanggalInputBahan', 'statusPembayaran', 'namaSupplier'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataTransaksiBahan()
    {
        $builder = $this->db->table('datakelolabahan');
        $builder->select('*');
        $builder->join('databahan', 'databahan.idPeralatan = datakelolabahan.idPeralatan', 'left');
        $query = $builder->get();
        return $query;
    }

    public function getStatusPembayaranBahan()
    {
        $builder = $this->db->table('datakelolabahan');
        $builder->select('*');
        $builder->groupBy('idPeralatan');
        $query = $builder->get();
        return $query;
    }

    public function getTotalPembelianBahan()
    {
        $builder = $this->db->table('databahan');
        $builder->select('*');
        $builder->selectSum('totalBahan');
        $builder->groupBy('idPeralatan');
        $query = $builder->get();
        return $query;
    }
}
