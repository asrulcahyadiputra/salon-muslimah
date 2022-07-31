<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table = 'stock';
    protected $allowedFields = ['namaBarang', 'kuantitasBarang'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataStockBahan()
    {
        $builder = $this->db->table('stock');
        $builder->select('*');
        $builder->selectSum('kuantitasBarang');
        $builder->groupBy('namaBarang');
        $query = $builder->get();
        return $query;
    }

    // public function getDataStockBahan()
    // {
    //     $builder = $this->db->table('stock');
    //     $builder->select('*');
    //     $builder->selectSum('kuantitasBarang');
    //     $builder->join('pengambilanstock', 'pengambilanstock.namaBarang = stock.namaBarang', 'left');
    //     $builder->groupBy('pengambilanstock.namaBarang');
    //     $query = $builder->get();
    //     return $query;
    // }

    public function getDataKuantitasBahan()
    {
        $builder = $this->db->table('stock');
        $builder->select('*');
        $builder->selectSum('kuantitasBarang');
        $builder->groupBy('namaBarang');
        $query = $builder->get();
        return $query;
    }

    // public function getDataDetailBahan()
    // {
    //     $builder = $this->db->table('stock');
    //     $builder->select('*');
    //     $builder->selectSum('kuantitasBarang');
    //     $builder->groupBy('namaBarang');
    //     $query = $builder->get();
    //     return $query;
    // }
}
