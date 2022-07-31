<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiKaryawanModel extends Model
{
    protected $table = 'gajikaryawan';
    protected $allowedFields = ['namaKaryawan', 'statusPembayaran', 'tanggalPembayaran', 'totalPembayaran'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
}
