<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKelolaAsetModel extends Model
{
    protected $table = 'datakelolaaset';
    protected $allowedFields = ['akun', 'tanggalInputAset', 'statusPembayaran'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataTransaksiAset()
    {
        $builder = $this->db->table('datakelolaaset');
        $builder->select('*');
        $builder->join('dataaset', 'dataaset.akun = datakelolaaset.akun', 'left');
        $query = $builder->get();
        return $query;
    }

    public function getStatusPembayaranAset()
    {
        $builder = $this->db->table('datakelolaaset');
        $builder->select('*');
        $builder->groupBy('akun');
        $query = $builder->get();
        return $query;
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
}
