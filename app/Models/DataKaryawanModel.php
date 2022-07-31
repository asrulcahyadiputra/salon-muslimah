<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $allowedFields = ['namaKaryawan', 'role', 'noTelepon', 'tanggalBergabung', 'idKaryawan', 'serviceDikerjakan', 'bayaranPerProduk', 'tanggalPembayaranGaji', 'alamat', 'kode_jabatan'];
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDataKaryawan($periode)
    {

        $query = $this->db->query("select A.idKaryawan as kode_karyawan, A.namaKaryawan as nama_karyawan, A.noTelepon as no_telp, A.alamat,C.deskripsi as nama_jabatan, A.tanggalBergabung as tgl_gabung,  
        ifnull(B.total_hadir,0) as total_hadir, ifnull(B.total_izin,0) as total_izin, ifnull(B.total_absen,0) as total_absen
        from karyawan A left join 
        (
            select a.idKaryawan as kode_karyawan, sum(if(keterangan='Hadir',1,0)) as total_hadir,sum(if(keterangan='Izin',1,0)) as total_izin, sum(if(keterangan='Absen',1,0)) as total_absen
            from waktuabsensi a where date_format(a.tanggalAbsen,'%Y%m') = '$periode' group by a.idKaryawan
        ) B on A.idKaryawan=B.kode_karyawan
        join tb_jabatan C on A.kode_jabatan=C.id
        ")->getResult();
        return $query;
    }
    public function getTotalGajiKaryawan()
    {
        $builder = $this->db->table('gajikaryawan');
        $builder->select('*');
        $builder->selectSum('totalPembayaran');
        $query = $builder->get();
        return $query;
    }
    public function getDataKaryawanAbsen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $builder = $this->db->table('karyawan');
        $builder->select('*');
        // $builder->selectSum('hadir');
        // $builder->selectSum('absen');
        // $builder->selectSum('izin');
        // $builder->join('waktuabsensi', 'waktuabsensi.idKaryawan = karyawan.idKaryawan', 'left');
        // $builder->groupBy('karyawan.idKaryawan');
        // $builder->orderBy('waktuabsensi.idKaryawan', 'ASC');
        // $builder->where('tanggalAbsen', date('Y-m-d'));

        $query = $builder->get();
        return $query;
    }
    public function getDataAbsen()
    {
        $builder = $this->db->table('waktuabsensi');
        $builder->select('*');
        $builder->groupBy('idKaryawan');
        $builder->orderBy('idKaryawan', 'DESC');
        $query = $builder->get();
        return $query;
    }
    public function getHistoryAbsen()
    {
        $builder = $this->db->table('karyawan');
        $builder->select('*');
        // $builder->join('absenKaryawan', 'absenKaryawan.idKaryawan = karyawan.idKaryawan', 'left');
        $builder->join('waktuabsensi', 'waktuabsensi.idKaryawan = karyawan.idKaryawan', 'left');
        $builder->notLike('waktuAbsen', 'null');
        $builder->notLike('tanggalAbsen', 'null');
        $query = $builder->get();
        return $query;
    }

    public function getFilterByDate($historyDate)
    {
        $builder = $this->db->table('karyawan');
        $builder->select('*');
        $builder->join('waktuabsensi', 'waktuabsensi.idKaryawan = karyawan.idKaryawan', 'left');
        $builder->notLike('waktuAbsen', 'null');
        $builder->notLike('tanggalAbsen', 'null');
        $builder->where('tanggalAbsen', $historyDate);
        $query = $builder->get();
        return $query;
    }

    // public function save_batch($data)
    // {
    //     $builder = $this->db->table('datatransaksi');
    //     $builder->insertBatch($data);
    // }
}
