<?php

namespace App\Models;

use CodeIgniter\Model;

class PengambilanStockModel extends Model
{
    protected $table = 'pengambilanstock';
    protected $allowedFields = ['namaBarang', 'jumlahPengambilanStock', 'inputTanggalPengambilanStock', 'namaKaryawan'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataPengambilanJumlahStock()
    {
        $builder = $this->db->table('pengambilanstock');
        $builder->select('*');
        $builder->selectSum('jumlahPengambilanStock');
        $builder->groupBy('namaBarang');
        $query = $builder->get();
        return $query;
    }
}
