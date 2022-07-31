<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranServiceModel extends Model
{
    protected $table = 'pembayaranservice';
    protected $allowedFields = ['statusPemesanan', 'tanggalPembayaran', 'totalPembayaran', 'kodetransaksi'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
}
