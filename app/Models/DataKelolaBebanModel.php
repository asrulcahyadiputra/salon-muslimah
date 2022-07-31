<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKelolaBebanModel extends Model
{
    protected $table = 'datakelolabeban';
    protected $allowedFields = ['akun', 'tanggalInputBeban', 'statusPembayaran', 'header'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataTransaksiBeban()
    {
        $builder = $this->db->table('datakelolabeban');
        $builder->select('*');
        $builder->join('databeban', 'databeban.akun = datakelolabeban.akun', 'left');
        $query = $builder->get();
        return $query;
    }
    public function showDataTransaksiBeban($id)
    {
        $builder = $this->db->table('datakelolabeban');
        $builder->select('*');
        $builder->where('datakelolabeban.akun', $id);
        $builder->join('databeban', 'databeban.akun = datakelolabeban.akun', 'left');
        $query = $builder->get();
        return $query;
    }

    public function getStatusPembayaranBeban()
    {
        $builder = $this->db->table('datakelolabeban');
        $builder->select('*');
        $builder->groupBy('akun');
        $query = $builder->get();
        return $query;
    }

    public function getTotalPembelianBeban()
    {
        $builder = $this->db->table('databeban');
        $builder->select('*');
        $builder->selectSum('totalBeban');
        $builder->groupBy('akun');
        $query = $builder->get();
        return $query;
    }
}
