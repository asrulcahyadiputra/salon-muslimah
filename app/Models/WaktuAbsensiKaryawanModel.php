<?php

namespace App\Models;

use CodeIgniter\Model;

class WaktuAbsensiKaryawanModel extends Model
{
    protected $table = 'waktuabsensi';
    protected $allowedFields = ['waktuAbsen', 'tanggalAbsen', 'idKaryawan', 'keterangan'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
}
