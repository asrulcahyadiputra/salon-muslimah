<?php

namespace App\Controllers;

use App\Models\PembelianModel;
use App\Models\AsetModel;
use App\Models\AkunModel;
use App\Models\StockModel;
use App\Models\PengambilanStockModel;
use App\Models\BebanModel;
use App\Models\BahanModel;
use App\Models\TransaksiLainnyaModel;
use App\Models\DataKelolaAsetModel;
use App\Models\DataKelolaBebanModel;
use App\Models\DataKelolaBahanModel;
use App\Models\DataKelolaAdminModel;
use App\Models\DataKelolaTransaksiLainnyaModel;
use App\Models\PembayaranAsetModel;
use App\Models\PembayaranBebanModel;
use App\Models\PembayaranBahanModel;
use App\Models\PembayaranModel;
use App\Models\PembayaranTransaksiLainnyaModel;
use App\Models\UserProfileModel;
use App\Models\DataKelolaServiceModel;
use App\Models\PemesananModel;
use App\Models\PembayaranServiceModel;
use App\Models\DataKaryawanModel;
use App\Models\DataAbsenKaryawanModel;
use App\Models\WaktuAbsensiKaryawanModel;
use App\Models\GajiKaryawanModel;
use App\Models\JenisServiceModel;
use App\Models\JenisTransaksiLainnyaModel;
use App\Models\JenisBebanModel;
use App\Models\KodeOtomatis;
use App\Models\UpahGajiModel;
use App\Models\JurnalModel;

class Pencatatan extends BaseController
{
    protected $db, $builder;
    protected $PembelianModel;
    protected $AsetModel;
    protected $AkunModel;
    protected $StockModel;
    protected $PengambilanStockModel;
    protected $BebanModel;
    protected $BahanModel;
    protected $TransaksiLainnyaModel;
    protected $DataKelolaAsetModel;
    protected $DataKelolaBebanModel;
    protected $DataKelolaBahanModel;
    protected $DataKelolaAdminModel;
    protected $DataKelolaTransaksiLainnyaModel;
    protected $PembayaranAsetModel;
    protected $PembayaranBebanModel;
    protected $PembayaranBahanModel;
    protected $PembayaranModel;
    protected $PembayaranTransaksiLainnyaModel;
    protected $PembayaranServiceModel;
    protected $DataKaryawanModel;
    protected $DataAbsenKaryawanModel;
    protected $WaktuAbsensiKaryawanModel;
    protected $GajiKaryawanModel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->UserProfileModel = new UserProfileModel();
        $this->PembelianModel = new PembelianModel();
        $this->AsetModel = new AsetModel();
        $this->AkunModel = new AkunModel();
        $this->StockModel = new StockModel();
        $this->PengambilanStockModel = new PengambilanStockModel();
        $this->BebanModel = new BebanModel();
        $this->BahanModel = new BahanModel();
        $this->TransaksiLainnyaModel = new TransaksiLainnyaModel();
        $this->DataKelolaAsetModel = new DataKelolaAsetModel();
        $this->DataKelolaBebanModel = new DataKelolaBebanModel();
        $this->DataKelolaBahanModel = new DataKelolaBahanModel();
        $this->DataKelolaAdminModel = new DataKelolaAdminModel();
        $this->DataKelolaTransaksiLainnyaModel = new DataKelolaTransaksiLainnyaModel();
        $this->PembayaranAsetModel = new PembayaranAsetModel();
        $this->PembayaranBebanModel = new PembayaranBebanModel();
        $this->PembayaranBahanModel = new PembayaranBahanModel();
        $this->PembayaranModel = new PembayaranModel();
        $this->PembayaranTransaksiLainnyaModel = new PembayaranTransaksiLainnyaModel();
        $this->PemesananModel = new PemesananModel();
        $this->DataKelolaServiceModel = new DataKelolaServiceModel();
        $this->PembayaranServiceModel = new PembayaranServiceModel();
        $this->DataKaryawanModel = new DataKaryawanModel();
        $this->DataAbsenKaryawanModel = new DataAbsenKaryawanModel();
        $this->WaktuAbsensiKaryawanModel = new WaktuAbsensiKaryawanModel();
        $this->GajiKaryawanModel = new GajiKaryawanModel();
        $this->JenisServiceModel = new JenisServiceModel();
        $this->JenisTransaksiLainnyaModel = new JenisTransaksiLainnyaModel();
        $this->JenisBebanModel = new JenisBebanModel();
        $this->UpahGajiModel = new UpahGajiModel();
        $this->jurnal = new JurnalModel();
    }

    public function index()
    {
        if ($this->request->getVar('datePencarian') == null) {
            $historyDate = null;
        }
        $historyDate = $this->request->getVar('datePencarian');
        $model = new DataKelolaAdminModel;
        $data = [
            'model' => $model,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'statusPembayaran' => $model->getStatusPembayaran(),
            'historyPembayaran' => $model->getHistoryPembayaran(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'totalHistoryPembayaranByDate' => $model->getTotalHistoryPembayaranByDate($historyDate),
            'tanggalPencarian' => $historyDate,
            'filterByDate' => $model->getFilterByDate($historyDate),
            'title' => 'Home',
            'tampil' => 'pencatatan/pemasukan/produk',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function service()
    {
        if ($this->request->getVar('datePencarian') == null) {
            $historyDate = null;
        }
        $historyDate = $this->request->getVar('datePencarian');
        $model = new DataKelolaServiceModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'totalBooking' => $model->countAll(),
            'totalField' => $this->PembayaranServiceModel->countAll(),
            'totalPemesanan' => $model->getTotalPemesanan(),
            'all_data' => $model->getDataTransaksi(),
            'historyPembayaran' => $model->getHistoryPembayaran(),
            'tanggalPencarian' => $historyDate,
            'filterByDate' => $model->getFilterByDate($historyDate),
            'title' => 'Home',
            'tampil' => 'pencatatan/pemasukan/service',
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function beban()
    {
        $model = new DataKelolaBebanModel;
        $kode = new KodeOtomatis();

        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBeban' => $model->get(),
            'all_data' => $model->getDataTransaksiBeban(),
            'totalPembelianBeban' => $model->getTotalPembelianBeban(),
            'statusPembayaranBeban' => $model->getStatusPembayaranBeban(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/beban/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function detailBeban($id)
    {
        $model = new DataKelolaBebanModel;

        $data = [
            'beban' => $model->showDataTransaksiBeban($id)->getFirstRow()
        ];
        // dd($data);
        return view('pencatatan/pengeluaran/beban/bukti', $data);
    }

    public function dataBeban()
    {
        $model = new DataKelolaBebanModel;
        $beban = $this->db->query("select * from akun where namaAkun like '%beban%'")->getResult();
        $kd = new KodeOtomatis();
        $kode = $kd->id_beban();
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/beban/dataBeban',
            'totalField' => $model->countAll(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'beban' => $beban,
            'kode' => $kode
        ];
        return view('wrapp', $data);
    }

    public function pembayaranBeban()
    {
        $model = new DataKelolaBebanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBeban' => $model->get(),
            'all_data' => $model->getDataTransaksiBeban(),
            'totalPembelianBeban' => $model->getTotalPembelianBeban(),
            'statusPembayaranBeban' => $model->getStatusPembayaranBeban(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/beban/pembayaran',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    function updateStatusPembayaranBeban($id)
    {
        $this->DataKelolaBebanModel->save([
            'id' => $id,
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        ]);

        $this->PembayaranBebanModel->save([
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
            'akun' => $this->request->getVar('akun'),
            'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran'),
            'totalBeban' => $this->request->getVar('totalBeban')
        ]);

        // $split = explode('-', $this->request->getVar('akun'));
        // print_r($split);exit;
        // $no_akun = $split[0];

        // $this->AkunModel->save([
        //     'keterangan' => $this->request->getVar('keterangan'),
        //     'total' => $this->request->getVar('totalBeban')
        // ]);

        // /** jurnal */
        // $this->jurnal->generateJurnal($id, date('Y-m-d'), $no_akun, 'Transaksi service', 'd', $this->request->getVar('totalBeban'));
        // $this->jurnal->generateJurnal($id, date('Y-m-d'), '411', 'Transaksi service', 'k', $this->request->getVar('totalBeban'));

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/beban');
    }

    function updateTotalBeban($id)
    {
        $this->BebanModel->save([
            'id' => $id,
            'totalBeban' => $this->request->getVar('totalBeban'),
        ]);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/beban');
    }
    public function historyBeban()
    {
        $model = new PembayaranBebanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBeban' => $model->get(),
            'dataKelolaBeban' => $this->DataKelolaBebanModel->get(),
            'all_data' => $this->DataKelolaBebanModel->getDataTransaksiBeban(),
            'totalPembelianBeban' => $this->DataKelolaBebanModel->getTotalPembelianBeban(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/beban/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function deleteBeban($id)
    {
        $idKelolaBeban = $this->request->getVar('idKelolaBeban');
        $this->DataKelolaBebanModel->save([
            'id' => $idKelolaBeban,
            'statusPembayaran' => null,
        ]);

        $this->PembayaranBebanModel->delete($id);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/beban/history');
    }

    public function saveBeban()
    {
        if ($this->request->getVar('totalBeban') == '' || $this->request->getVar('jenisBeban') == '') {
            session()->setFlashData('pesan', 'Data gagal ditambahkan.');
            return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/gaji');
        }
        $jenisBeban = $_POST['jenisBeban'];
        $split = explode('-', $jenisBeban[0]);
        $no_akun = $split[0];
        $akun = $_POST['akun'];
        $totalBeban = $_POST['totalBeban'];

        // print_r($split);exit;

        $data = [];

        $index = 0; // Set index array awal dengan 0
        foreach ($jenisBeban as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'jenisBeban' => $p,
                'akun' => $akun,
                'totalBeban' => set_number($totalBeban[$index]),
            ]);
            $index++;
        }
        $this->BebanModel->insertBatch($data);


        $this->DataKelolaBebanModel->save([
            'akun' => $this->request->getVar('akun'),
            'tanggalInputBeban' => $this->request->getVar('tanggalInputBeban')
        ]);

        /** jurnal */
        $this->jurnal->generateJurnal($akun, date('Y-m-d'), $no_akun, 'Transaksi Beban ', 'd', set_number($totalBeban[0]));
        $this->jurnal->generateJurnal($akun, date('Y-m-d'), '111', 'Transaksi Beban ', 'k', set_number($totalBeban[0]));

        session()->setFlashData('pesan2', 'Data berhasil ditambahkan.');

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/beban');
    }

    public function aset()
    {
        $model = new DataKelolaAsetModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $model->get(),
            'all_data' => $model->getDataTransaksiAset(),
            'totalPembelianAset' => $model->getTotalPembelianAset(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/aset/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function dataAset()
    {
        $model = new DataKelolaAsetModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/aset/dataAset',
            'totalField' => $model->countAll(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function pembayaranAset()
    {
        $model = new DataKelolaAsetModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $model->get(),
            'all_data' => $model->getDataTransaksiAset(),
            'totalPembelianAset' => $model->getTotalPembelianAset(),
            'statusPembayaranAset' => $model->getStatusPembayaranAset(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/aset/pembayaran',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    function updateStatusPembayaranAset($id)
    {
        $this->DataKelolaAsetModel->save([
            'id' => $id,
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        ]);

        $this->PembayaranAsetModel->save([
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
            'akun' => $this->request->getVar('akun'),
            'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran'),
            'totalAset' => $this->request->getVar('totalAset'),
        ]);

        // $this->AkunModel->save([
        //     'total' => $this->request->getVar('totalAset'),
        //     'keterangan' => $this->request->getVar('keterangan'),
        // ]);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/aset/pembayaran');
    }

    public function historyAset()
    {
        $model = new PembayaranAsetModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $model->get(),
            'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
            'all_data' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
            'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/aset/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function saveAset()
    {
        $namaAset = $_POST['namaAset'];
        $jenisAset = $_POST['jenisAset'];
        $kuantitasAset = $_POST['kuantitasAset'];
        $akun = $_POST['akun'];
        $totalAset = $_POST['totalAset'];
        $priceAset = $_POST['priceAset'];

        if ($namaAset == '' || $jenisAset  == '' || $kuantitasAset == 0 || $priceAset == 0 || $totalAset == 0) {
            session()->setFlashData('pesan', 'Data gagal ditambahkan.');
            return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/aset');
        }

        $data = [];


        $index = 0; // Set index array awal dengan 0
        foreach ($namaAset as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'namaAset' => $p,
                'jenisAset' => $jenisAset[$index],
                'kuantitasAset' => $kuantitasAset[$index],
                'akun' => $akun,
                'totalAset' => $totalAset[$index],
                'priceAset' => $priceAset[$index],
            ]);


            $index++;
        }

        $this->AsetModel->insertBatch($data);

        $this->DataKelolaAsetModel->save([
            'akun' => $this->request->getVar('akun'),
            'tanggalInputAset' => $this->request->getVar('tanggalInputAset')
        ]);
        session()->setFlashData('pesan2', 'Data berhasil ditambahkan.');
        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/aset');
    }

    public function lainnya()
    {
        $model = new DataKelolaTransaksiLainnyaModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiLainnya' => $model->get(),
            'all_data' => $model->getDataTransaksiLainnya(),
            'totalPembelianTransaksiLainnya' => $model->getTotalPembelianTransaksiLainnya(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/lainnya/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function detailLainnya($kode)
    {
        $model = new DataKelolaTransaksiLainnyaModel;

        $data = [
            'beban' => $model->showDataTransaksiLainnya($kode)->getFirstRow()
        ];

        return view('pencatatan/pengeluaran/lainnya/bukti', $data);
    }

    public function dataLainnya()
    {
        $model = new DataKelolaTransaksiLainnyaModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/lainnya/dataLainnya',
            'totalField' => $model->countAll(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function pembayaranLainnya()
    {
        $model = new DataKelolaTransaksiLainnyaModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiLainnya' => $model->get(),
            'all_data' => $model->getDataTransaksiLainnya(),
            'totalPembelianTransaksiLainnya' => $model->getTotalPembelianTransaksiLainnya(),
            'statusPembayaranTransaksiLainnya' => $model->getStatusPembayaranTransaksiLainnya(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/lainnya/pembayaran',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    function updateStatusPembayaranTransaksiLainnya($id)
    {
        $this->DataKelolaTransaksiLainnyaModel->save([
            'id' => $id,
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        ]);

        $this->PembayaranTransaksiLainnyaModel->save([
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
            'akun' => $this->request->getVar('akun'),
            'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran'),
            'totalTransaksi' => $this->request->getVar('totalTransaksi')
        ]);

        // $this->AkunModel->save([
        //     'keterangan' => $this->request->getVar('keterangan'),
        //     'total' => $this->request->getVar('totalTransaksi')
        // ]);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/lainnya/pembayaran');
    }

    public function historyLainnya()
    {
        $model = new PembayaranTransaksiLainnyaModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiLainnya' => $model->get(),
            'dataKelolaTransaksiLainnya' => $this->DataKelolaTransaksiLainnyaModel->get(),
            'all_data' => $this->DataKelolaTransaksiLainnyaModel->getDataTransaksiLainnya(),
            'totalPembelianTransaksiLainnya' => $this->DataKelolaTransaksiLainnyaModel->getTotalPembelianTransaksiLainnya(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/lainnya/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function saveTransaksi()
    {
        $keteranganTransaksi = $_POST['keteranganTransaksi'];
        $jenisTransaksi = $_POST['jenisTransaksi'];
        $akun = $_POST['akun'];
        $totalTransaksi = $_POST['totalTransaksi'];

        $data = [];

        $index = 0; // Set index array awal dengan 0
        foreach ($keteranganTransaksi as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'keteranganTransaksi' => $p,
                'jenisTransaksi' => $jenisTransaksi[$index],
                'akun' => $akun,
                'totalTransaksi' => $totalTransaksi[$index],
            ]);

            $index++;
        }
        $this->TransaksiLainnyaModel->insertBatch($data);

        $this->DataKelolaTransaksiLainnyaModel->save([
            'akun' => $this->request->getVar('akun'),
            'tanggalInputTransaksi' => $this->request->getVar('tanggalInputTransaksi')
        ]);

        $id_transaksi = 'TRX-L-' . rand();

        $jenis_transaksi = $jenisTransaksi[0];
        $grandtotal = $totalTransaksi[0];
        if ($jenis_transaksi == 'Modal') {
            // jurnal
            $this->jurnal->generateJurnal($id_transaksi, date('Y-m-d'), '111', 'Modal', 'd', $grandtotal);
            $this->jurnal->generateJurnal($id_transaksi, date('Y-m-d'), '300', 'Modal', 'k', $grandtotal);
        } elseif ($jenis_transaksi == 'Prive') {
            // jurnal
            $this->jurnal->generateJurnal($id_transaksi, date('Y-m-d'), '312', 'Prive', 'd', $grandtotal);
            $this->jurnal->generateJurnal($id_transaksi, date('Y-m-d'), '111', 'Prive', 'k', $grandtotal);
        }

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/lainnya');
    }

    public function saveJenisTransaksiLainnya()
    {
        $this->JenisTransaksiLainnyaModel->save([
            'jenisTransaksiLainnya' => $this->request->getVar('jenisTransaksiLainnya'),
        ]);
        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/lainnya');
    }

    public function bahan()
    {
        $model = new DataKelolaBahanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBahan' => $model->get(),
            'all_data' => $model->getDataTransaksiBahan(),
            'totalPembelianBahan' => $model->getTotalPembelianBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/bahan/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function dataBahan()
    {
        $model = new DataKelolaBahanModel;
        $data = [
            // 'dataKaryawan' => $this->DataKaryawanModel->model->getDataKaryawan(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/bahan/dataBahan',
            'totalField' => $model->countAll(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function pembayaranBahan()
    {
        $model = new DataKelolaBahanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBahan' => $model->get(),
            'all_data' => $model->getDataTransaksiBahan(),
            'totalPembelianBahan' => $model->getTotalPembelianBahan(),
            'statusPembayaranBahan' => $model->getStatusPembayaranBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/bahan/pembayaran',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    function updateStatusPembayaranBahan($id)
    {
        $namaBarang = $_POST['namaBarang'];
        $kuantitasBarang = $_POST['kuantitasBarang'];

        $data = [];

        $index = 0; // Set index array awal dengan 0
        foreach ($namaBarang as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'namaBarang' => $p,
                'kuantitasBarang' => $kuantitasBarang[$index],
            ]);

            $index++;
        }

        $this->StockModel->insertBatch($data);

        $this->DataKelolaBahanModel->save([
            'id' => $id,
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        ]);

        $this->PembayaranBahanModel->save([
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
            'idPeralatan' => $this->request->getVar('idPeralatan'),
            'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran'),
            'totalBahan' => $this->request->getVar('totalBahan')
        ]);

        // $this->AkunModel->save([
        //     'keterangan' => $this->request->getVar('keterangan'),
        //     'total' => $this->request->getVar('totalBahan')
        // ]);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/bahan/pembayaran');
    }

    public function historyBahan()
    {
        $model = new PembayaranBahanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBahan' => $model->get(),
            'dataKelolaBahan' => $this->DataKelolaBahanModel->get(),
            'all_data' => $this->DataKelolaBahanModel->getDataTransaksiBahan(),
            'totalPembelianBahan' => $this->DataKelolaBahanModel->getTotalPembelianBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/bahan/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function stockBahan()
    {
        $model = new StockModel;
        $data = [
            'dataStockBahan' => $model->getDataStockBahan(),
            'dataKuantitasBahan' => $model->getDataKuantitasBahan(),
            'dataPengambilanJumlahStock' => $this->PengambilanStockModel->getdataPengambilanJumlahStock(),
            // 'all_data' => $model->getDataTransaksiBahan(),
            // 'totalPembelianBahan' => $model->getTotalPembelianBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/bahan/stock',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function ambilStockBahan()
    {
        $model = new PengambilanStockModel;
        $data = [
            'dataPengambilanStock' => $model->get(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            // 'all_data' => $model->getDataTransaksiBahan(),
            // 'totalPembelianBahan' => $model->getTotalPembelianBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/bahan/ambilStock',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function dataAmbilStock()
    {
        $model = new StockModel;
        $data = [
            'dataKaryawan' => $this->DataKaryawanModel->getDataKaryawan(),
            'dataStockBahan' => $model->getDataStockBahan(),
            'dataKuantitasBahan' => $model->getDataKuantitasBahan(),
            'dataPengambilanJumlahStock' => $this->PengambilanStockModel->getdataPengambilanJumlahStock(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/bahan/dataAmbilStock',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
            // 'totalField' => $model->countAll()
        ];
        return view('wrapp', $data);
    }

    public function saveBahan()
    {
        $namaBarang = $_POST['namaBarang'];
        $kuantitasBarang = $_POST['kuantitasBarang'];
        $idPeralatan = $_POST['idPeralatan'];
        $totalBahan = $_POST['totalBahan'];
        $priceBarang = $_POST['priceBarang'];

        $data = [];
        $data2 = [];

        $index = 0; // Set index array awal dengan 0
        $index2 = 0; // Set index array awal dengan 0

        foreach ($namaBarang as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'namaBarang' => $p,
                'kuantitasBarang' => $kuantitasBarang[$index],
                'idPeralatan' => $idPeralatan,
                'totalBahan' => $totalBahan[$index],
                'priceBarang' => $priceBarang[$index]
            ]);

            $index++;
        }

        foreach ($namaBarang as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data2, [
                'namaBarang' => $p,
            ]);

            $index2++;
        }
        $this->BahanModel->insertBatch($data);
        $this->PengambilanStockModel->insertBatch($data2);

        $this->DataKelolaBahanModel->save([
            'idPeralatan' => $this->request->getVar('idPeralatan'),
            'tanggalInputBahan' => $this->request->getVar('tanggalInputBahan'),
            'namaSupplier' => $this->request->getVar('namaSupplier')
        ]);
        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/bahan');
    }

    public function saveStock()
    {
        $namaBarang = $_POST['namaBarang'];
        $jumlahPengambilanStock = $_POST['jumlahPengambilanStock'];
        $inputTanggalPengambilanStock = $_POST['inputTanggalPengambilanStock'];
        $namaKaryawan = $_POST['namaKaryawan'];

        $data = [];

        $index = 0; // Set index array awal dengan 0
        foreach ($namaBarang as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'namaBarang' => $p,
                'jumlahPengambilanStock' => $jumlahPengambilanStock[$index],
                'inputTanggalPengambilanStock' => $inputTanggalPengambilanStock,
                'namaKaryawan' => $namaKaryawan
            ]);

            $index++;
        }
        $this->PengambilanStockModel->insertBatch($data);
        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/bahan/dataAmbilStock');
    }

    public function akun()
    {
        $model = new DataKelolaBahanModel;
        $data = [
            'totalAset' => $this->AkunModel->getTotalAset(),
            'totalAll' => $this->AkunModel->getTotalAll(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBahan' => $this->DataKelolaBahanModel->get(),
            'all_data' => $model->getDataTransaksiBahan(),
            'totalPembelianBahan' => $model->getTotalPembelianBahan(),
            'dataTotalGajiKaryawan' => $this->DataKaryawanModel->getTotalGajiKaryawan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/akun/akun',
            'validation' => \Config\Services::validation(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function dataAkun()
    {
        // $model = new DataKelolaAsetModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/akun/dataAkun',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
            // 'totalField' => $model->countAll()
        ];
        return view('wrapp', $data);
    }

    public function akunAset()
    {
        $model = new PembayaranAsetModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $model->get(),
            'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
            'all_data' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
            'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            'title' => 'Home',
            'tampil' => 'pencatatan/akun/aset',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    public function akunBahan()
    {
        $model = new PembayaranBahanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBahan' => $model->get(),
            'dataKelolaBahan' => $this->DataKelolaBahanModel->get(),
            'all_data' => $this->DataKelolaBahanModel->getDataTransaksiBahan(),
            'totalPembelianBahan' => $this->DataKelolaBahanModel->getTotalPembelianBahan(),
            'title' => 'Home',
            'tampil' => 'pencatatan/akun/bahan',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    public function akunBeban()
    {
        $model = new PembayaranBebanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBeban' => $model->get(),
            'dataKelolaBeban' => $this->DataKelolaBebanModel->get(),
            'all_data' => $this->DataKelolaBebanModel->getDataTransaksiBeban(),
            'totalPembelianBeban' => $this->DataKelolaBebanModel->getTotalPembelianBeban(),
            'title' => 'Home',
            'tampil' => 'pencatatan/akun/beban',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    public function akunGaji()
    {
        $model = new DataKaryawanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            // 'dataTransaksiAset' => $model->get(),
            // 'all_data' => $model->getDataTransaksiAset(),
            // 'totalPembelianAset' => $model->getTotalPembelianAset(),
            'model' => $model,
            'dataKaryawan' => $model->getDataKaryawan(),
            'dataKaryawanAbsen' => $model->getDataKaryawanAbsen(),
            'dataGajiKaryawan' => $this->GajiKaryawanModel->get(),
            'dataTotalGajiKaryawan' => $model->getTotalGajiKaryawan(),
            'dataAbsen' => $model->getDataAbsen(),
            'title' => 'Home',
            'tampil' => 'pencatatan/akun/gaji',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    public function akunTransaksiLainnya()
    {
        $model = new PembayaranTransaksiLainnyaModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiLainnya' => $model->get(),
            'dataKelolaTransaksiLainnya' => $this->DataKelolaTransaksiLainnyaModel->get(),
            'all_data' => $this->DataKelolaTransaksiLainnyaModel->getDataTransaksiLainnya(),
            'totalPembelianTransaksiLainnya' => $this->DataKelolaTransaksiLainnyaModel->getTotalPembelianTransaksiLainnya(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/lainnya/history',
            'title' => 'Home',
            'tampil' => 'pencatatan/akun/transaksi',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function saveAkun()
    {
        if (!$this->validate([
            'kodeAkun' => [
                'rules' => 'is_unique[akun.kodeAkun]',
                'errors' => [
                    'is_unique' => 'kode akun sudah terdaftar.'
                ]
            ]
        ])) {

            session()->setFlashData('pesan', 'Kode Akun yang anda masukkan sudah terdaftar!');

            return redirect()->to('/user/dashboard/pencatatan-kas/akun')->withInput();
        }

        if ($this->request->getVar('header') == 'B2') {
            $this->JenisBebanModel->save([
                // 'total' => $this->request->getVar('total'),
                'jenisBeban' => $this->request->getVar('namaAkun'),
                'kodeAkun' => $this->request->getVar('kodeAkun'),
                'header' => $this->request->getVar('header'),
                // 'statusPembayaran' => $this->request->getVar('statusPembayaran'),
                // 'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran')
            ]);
        }

        $this->AkunModel->save([
            // 'total' => $this->request->getVar('total'),
            'namaAkun' => $this->request->getVar('namaAkun'),
            'kodeAkun' => $this->request->getVar('kodeAkun'),
            'header' => $this->request->getVar('header'),
            // 'statusPembayaran' => $this->request->getVar('statusPembayaran'),
            // 'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran')
        ]);

        session()->setFlashData('pesan2', 'Data berhasil ditambahkan!');

        return redirect()->to('/user/dashboard/pencatatan-kas/akun');
    }

    public function gaji()
    {
        $model = new DataKaryawanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            // 'dataTransaksiAset' => $model->get(),
            // 'all_data' => $model->getDataTransaksiAset(),
            // 'totalPembelianAset' => $model->getTotalPembelianAset(),
            'model' => $model,
            'dataGajiKaryawan' => $model->get(),
            'dataKaryawan' => $model->getDataKaryawan(),
            'dataKaryawanAbsen' => $model->getDataKaryawanAbsen(),
            'dataAbsen' => $model->getDataAbsen(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/gaji/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'upahGaji' => $this->UpahGajiModel->get(),
        ];
        return view('wrapp', $data);
    }

    public function pembayaranGaji()
    {
        $model = new DataKaryawanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            // 'dataTransaksiAset' => $model->get(),
            // 'all_data' => $model->getDataTransaksiAset(),
            // 'totalPembelianAset' => $model->getTotalPembelianAset(),
            'model' => $model,
            'dataKaryawan' => $model->getDataKaryawan(),
            'dataKaryawanAbsen' => $model->getDataKaryawanAbsen(),
            'dataAbsen' => $model->getDataAbsen(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/gaji/pembayaran',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function historyGaji()
    {
        $model = new DataKaryawanModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            // 'dataTransaksiAset' => $model->get(),
            // 'all_data' => $model->getDataTransaksiAset(),
            // 'totalPembelianAset' => $model->getTotalPembelianAset(),
            'model' => $model,
            'dataKaryawan' => $model->getDataKaryawan(),
            'dataKaryawanAbsen' => $model->getDataKaryawanAbsen(),
            'dataGajiKaryawan' => $this->GajiKaryawanModel->get(),
            'dataTotalGajiKaryawan' => $model->getTotalGajiKaryawan(),
            'dataAbsen' => $model->getDataAbsen(),
            'title' => 'Home',
            'tampil' => 'pencatatan/pengeluaran/gaji/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    function updatePengeluaranGaji($id)
    {
        $this->DataKaryawanModel->save([
            'id' => $id,
            'serviceDikerjakan' => $this->request->getVar('serviceDikerjakan'),
            'bayaranPerProduk' => $this->request->getVar('bayaranPerProduk'),
        ]);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/gaji');
    }

    public function saveGaji()
    {
        // $this->DataKaryawanModel->save([
        //     'id' => $this->request->getVar('id'),
        //     'tanggalPembayaranGaji' => $this->request->getVar('tanggalPembayaran'),
        //     // 'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        //     // 'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran')
        // ]);

        // $this->GajiKaryawanModel->save([
        //     'namaKaryawan' => $this->request->getVar('namaKaryawan'),
        //     'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        //     'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran'),
        //     'totalPembayaran' => $this->request->getVar('totalPembayaran')
        // ]);
        if ($this->request->getVar('upahGaji') == '' || $this->request->getVar('namaKaryawan') == '' || $this->request->getVar('tanggalPenggajian') == '') {
            session()->setFlashData('pesan', 'Data gagal ditambahkan.');
            return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/gaji');
        }

        $this->UpahGajiModel->save([
            'namaKaryawan' => $this->request->getVar('namaKaryawan'),
            'tanggalPenggajian' => $this->request->getVar('tanggalPenggajian'),
            'upahGaji' => $this->request->getVar('upahGaji')
        ]);
        session()->setFlashData('pesan2', 'Data berhasil ditambahkan.');
        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/gaji');
    }

    function updateUpahGaji($id)
    {
        // $this->DataKelolaBebanModel->save([
        //     'id' => $id,
        //     'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        // ]);

        $this->UpahGajiModel->save([
            'id' => $id,
            'statusPembayaran' => $this->request->getVar('statusPembayaran')
        ]);

        // $this->AkunModel->save([
        //     'keterangan' => $this->request->getVar('keterangan'),
        //     'total' => $this->request->getVar('totalBeban')
        // ]);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/gaji');
    }

    public function deleteGaji($id)
    {
        $this->GajiKaryawanModel->delete($id);

        return redirect()->to('/user/dashboard/pencatatan-kas/pengeluaran/gaji/history');
    }
}
