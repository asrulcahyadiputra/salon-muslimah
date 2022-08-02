<?php

namespace App\Controllers;

// use App\Models\PembelianModel;
use App\Models\DataKaryawanModel;
use App\Models\DataAbsenKaryawanModel;
use App\Models\WaktuAbsensiKaryawanModel;
// use App\Models\PembayaranModel;
// use App\Models\UserProfileModel;
use App\Models\StockModel;
use App\Models\JenisServiceModel;
use App\Models\JenisTransaksiLainnyaModel;
use App\Models\JenisBebanModel;

class Absensi extends BaseController
{
    protected $db, $builder;
    protected $PembelianModel;
    protected $DataKaryawanModel;
    protected $DataAbsenKaryawanModel;
    protected $WaktuAbsensiKaryawanModel;
    protected $PembayaranModel;
    protected $StockModel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('users');
        // $this->UserProfileModel = new UserProfileModel();
        // $this->PembelianModel = new PembelianModel();
        $this->DataKaryawanModel = new DataKaryawanModel();
        $this->DataAbsenKaryawanModel = new DataAbsenKaryawanModel();
        $this->WaktuAbsensiKaryawanModel = new WaktuAbsensiKaryawanModel();
        $this->StockModel = new StockModel();
        $this->JenisServiceModel = new JenisServiceModel();
        $this->JenisTransaksiLainnyaModel = new JenisTransaksiLainnyaModel();
        $this->JenisBebanModel = new JenisBebanModel();
        // $this->PembayaranModel = new PembayaranModel();
    }
    public function index()
    {
        $model = new DataKaryawanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'totalField' => $this->DataKaryawanModel->countAll(),
            'totalAbsensi' => $this->WaktuAbsensiKaryawanModel->countAll(),
            'model' => $model,
            // 'dataKaryawan' => $model->getDataKaryawan(),
            'dataKaryawanAbsen' => $model->getDataKaryawanAbsen(),
            'dataAbsen' => $model->getDataAbsen(),
            'title' => 'Absensi',
            'tampil' => 'Absensi/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    public function karyawan()
    {
        $model = new DataKaryawanModel;
        $input = $this->request->getVar('datePencarian');
        if ($input === null) {
            $periode = date('Y') . '' . date('m');
            $periode_name = bulan(date('m')) . ' ' . date('Y');
        } else {
            $periode = date('Ym', strtotime($input));
            // $tgl = date('Ym', strtotime($input));
            $periode_name = bulan(substr($periode, 4, 2)) . ' ' . substr($periode, 0, 4);
        }
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'totalField' => $this->DataKaryawanModel->countAll(),
            'model' => $model,
            'dataKaryawan' => $model->getDataKaryawan($periode),
            'title' => 'Absensi',
            'tampil' => 'Absensi/karyawan',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'periode_name'  => $periode_name
        ];
        return view('wrapp', $data);
    }
    public function tambahKaryawan()
    {
        $model = new DataKaryawanModel;
        $tb_jabatan = $this->db->table('tb_jabatan')->get()->getResult();
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Absensi',
            'tampil' => 'Absensi/tambahKaryawan',
            'totalField' => $model->countAll(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'jabatan'   => $tb_jabatan
        ];
        return view('wrapp', $data);
    }
    public function editKaryawan($idKaryawan)
    {
        $model = new DataKaryawanModel;
        $tb_jabatan = $this->db->table('tb_jabatan')->get()->getResult();
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Absensi',
            'tampil' => 'Absensi/editKaryawan',
            'totalField' => $model->countAll(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'karyawan' => $model->where('idKaryawan', $idKaryawan)->get()->getFirstRow(),
            'jabatan'   => $tb_jabatan
        ];
        // dd($data['karyawan']);
        // die;
        return view('wrapp', $data);
    }
    public function history()
    {
        if ($this->request->getVar('datePencarian') == null) {
            $historyDate = null;
        }
        $historyDate = $this->request->getVar('datePencarian');
        $model = new DataKaryawanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'totalField' => $this->DataKaryawanModel->countAll(),
            'historyAbsen' => $model->getHistoryAbsen(),
            'tanggalPencarian' => $historyDate,
            'filterByDate' => $model->getFilterByDate($historyDate),
            'dataAbsen' => $model->getDataAbsen(),
            'title' => 'Absensi',
            'tampil' => 'Absensi/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    public function save()
    {
        $this->DataKaryawanModel->save([
            'namaKaryawan' => $this->request->getVar('namaKaryawan'),
            'role' => $this->request->getVar('role'),
            'noTelepon' => $this->request->getVar('noTelepon'),
            'tanggalBergabung' => $this->request->getVar('tanggalBergabung'),
            'idKaryawan' => $this->request->getVar('idKaryawan'),
            'kode_jabatan'  => $this->request->getVar('kode_jabatan'),
            'alamat'        => $this->request->getVar('alamat')
        ]);
        $this->DataAbsenKaryawanModel->save([
            'idKaryawan' => $this->request->getVar('idKaryawan'),
            'hadir' => $this->request->getVar('hadir'),
            'absen' => $this->request->getVar('absen'),
            'izin' => $this->request->getVar('izin'),
        ]);
        $this->WaktuAbsensiKaryawanModel->save([
            'idKaryawan' => $this->request->getVar('idKaryawan')
        ]);
        session()->setFlashdata('sukses', 'Data berhasil di tambahkan');
        return redirect()->to('/user/dashboard/absensi/karyawan');
    }

    public function updateKaryawan()
    {
        $id = $this->request->getVar('idKaryawan');

        $data = [
            'namaKaryawan' => $this->request->getVar('namaKaryawan'),
            'role' => $this->request->getVar('role'),
            'noTelepon' => $this->request->getVar('noTelepon'),
            'tanggalBergabung' => $this->request->getVar('tanggalBergabung'),
            'idKaryawan' => $this->request->getVar('idKaryawan')
        ];

        $res = $this->db->table('karyawan')->where('idKaryawan', $id)->update($data);

        // return $this->response->setJSON($data);
        session()->setFlashdata('sukses', 'Data berhasil di update');
        return redirect()->to('/user/dashboard/absensi/karyawan');
    }
    public function saveAbsen()
    {
        $this->DataAbsenKaryawanModel->save([
            'idKaryawan' => $this->request->getVar('idKaryawan'),
            'hadir' => $this->request->getVar('hadir'),
            'absen' => $this->request->getVar('absen'),
            'izin' => $this->request->getVar('izin')
        ]);
        $this->WaktuAbsensiKaryawanModel->save([
            'waktuAbsen' => $this->request->getVar('waktuAbsen'),
            'tanggalAbsen' => $this->request->getVar('tanggalAbsen'),
            'idKaryawan' => $this->request->getVar('idKaryawan'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        session()->setFlashdata('sukses', 'Data absensi di tambahkan');
        return redirect()->to('/user/dashboard/absensi/karyawan');
    }
}
