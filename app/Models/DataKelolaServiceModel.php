<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKelolaServiceModel extends Model
{
    protected $table = 'datakelolaservice';
    protected $allowedFields = ['namaPelanggan', 'alamat', 'kodetransaksi', 'tanggalPemesanan', 'namaAdmin', 'statusPemesanan', 'noTelepon'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataTransaksi()
    {
        $builder = $this->db->table('datakelolaservice');
        $builder->select('*');
        $builder->join('datatransaksiservice', 'datatransaksiservice.kodetransaksi = datakelolaservice.kodetransaksi', 'left');
        $query = $builder->get();
        return $query;
    }

    // public function getProdukBaru()
    // {
    //     $builder = $this->db->table('produk');
    //     $builder->select('*');
    //     $query = $builder->get();
    //     return $query;
    // }

    public function getTotalPemesanan()
    {
        $builder = $this->db->table('datatransaksiservice');
        $builder->select('*');
        $builder->selectSum('totalService');
        // $builder->selectSum('jumlahProduk');
        $builder->groupBy('kodetransaksi');
        $query = $builder->get();
        return $query;
    }
    // public function getNamaAdmin()
    // {
    //     $builder = $this->db->table('datakelolaadmin');
    //     $builder->select('namaAdmin, kodetransaksi');
    //     // $builder->groupBy('namaAdmin');
    //     $query = $builder->get();
    //     return $query;
    // }
    // public function getTanggalPembelian()
    // {
    //     $builder = $this->db->table('datakelolaadmin');
    //     $builder->select('tanggalPembelian, kodetransaksi');
    //     // $builder->groupBy('namaAdmin');
    //     $query = $builder->get();
    //     return $query;
    // }
    public function getStatusPemesanan()
    {
        $builder = $this->db->table('datakelolaservice');
        $builder->select('*');
        $builder->groupBy('kodetransaksi');
        $query = $builder->get();
        return $query;
    }
    public function getHistoryPembayaran()
    {
        $builder = $this->db->table('pembayaranservice');
        $builder->select('*');
        $builder->join('datakelolaservice', 'datakelolaservice.kodetransaksi = pembayaranservice.kodetransaksi', 'left');
        $query = $builder->get();
        return $query;
    }
    public function getTotalHistoryPembayaran()
    {
        $builder = $this->db->table('pembayaranservice');
        $builder->select('*');
        $builder->selectSum('totalPembayaran');
        // $builder->selectSum('totalProduk');
        // $builder->join('datakelolaadmin', 'datakelolaadmin.kodetransaksi = datatransaksi.kodetransaksi', 'left');
        // $builder->groupBy('kodetransaksi');
        // $builder->where('statusPembayaran', 'Sudah Membayar');
        $query = $builder->get();
        return $query;
    }
    public function getTotalHistoryPembayaranByFilter($bulan, $tahun)
    {
        $builder = $this->db->table('pembayaranservice');
        $builder->select('*');
        $builder->selectSum('totalPembayaran');
        $builder->where("Month(tanggalPembayaran)", $bulan);
        $builder->where("Year(tanggalPembayaran)", $tahun);
        $query = $builder->get();
        return $query;
    }
    // public function getTotalHistoryPembayaranByDate($historyDate)
    // {
    //     $builder = $this->db->table('pembayaran');
    //     $builder->select('*');
    //     $builder->selectSum('totalPembayaran');
    //     $builder->selectSum('totalProduk');
    //     // $builder->join('datakelolaadmin', 'datakelolaadmin.kodetransaksi = datatransaksi.kodetransaksi', 'left');
    //     // $builder->groupBy('kodetransaksi');
    //     // $builder->where('statusPembayaran', 'Sudah Membayar');
    //     $builder->where('tanggalPembayaran', $historyDate);
    //     $query = $builder->get();
    //     return $query;
    // }
    public function getFilterByDate($historyDate)
    {
        $builder = $this->db->table('pembayaranservice');
        $builder->select('*');
        $builder->join('datakelolaservice', 'datakelolaservice.kodetransaksi = pembayaranservice.kodetransaksi', 'left');
        $builder->where('tanggalPembayaran', $historyDate);
        $query = $builder->get();
        return $query;
    }

    // public function countFieldDatabase()
    // {
    //     $builder = $this->db->table('datakelolaadmin');
    //     // $builder->from('datapemesan');
    //     echo $builder->countAll();
    // }
}
