<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKelolaTransaksiLainnyaModel extends Model
{
    protected $table = 'datakelolatransaksilainnya';
    protected $allowedFields = ['akun', 'tanggalInputTransaksi', 'statusPembayaran'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataTransaksiLainnya()
    {
        $builder = $this->db->table('datakelolatransaksilainnya');
        $builder->select('*');
        $builder->join('datatransaksilainnya', 'datatransaksilainnya.akun = datakelolatransaksilainnya.akun', 'left');
        $query = $builder->get();
        return $query;
    }
    public function showDataTransaksiLainnya($id)
    {
        $builder = $this->db->table('datakelolatransaksilainnya');
        $builder->select('*');
        $builder->where('datakelolatransaksilainnya.akun', $id);
        $builder->join('datatransaksilainnya', 'datatransaksilainnya.akun = datakelolatransaksilainnya.akun', 'left');
        $query = $builder->get();
        return $query;
    }

    public function getStatusPembayaranTransaksiLainnya()
    {
        $builder = $this->db->table('datakelolatransaksilainnya');
        $builder->select('*');
        $builder->groupBy('akun');
        $query = $builder->get();
        return $query;
    }

    public function getTotalPembelianTransaksiLainnya()
    {
        $builder = $this->db->table('datatransaksilainnya');
        $builder->select('*');
        $builder->selectSum('totalTransaksi');
        $builder->groupBy('akun');
        $query = $builder->get();
        return $query;
    }
}
