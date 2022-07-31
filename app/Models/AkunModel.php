<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $allowedFields = ['total', 'namaAkun', 'kodeAkun', 'header'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getTotalAset()
    {
        $builder = $this->db->table('akun');
        $builder->select('*');
        $builder->selectSum('total');
        $builder->groupBy('namaAkun');
        $query = $builder->get();
        return $query;
    }
    public function getTotalAll()
    {
        $builder = $this->db->table('akun');
        $builder->select('*');
        $builder->selectSum('total');
        $query = $builder->get();
        return $query;
    }
}
