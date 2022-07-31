<?php

namespace App\Controllers;

// use App\Models\PembelianModel;
use App\Models\StockModel;
use App\Models\DataKelolaServiceModel;
use App\Models\PemesananModel;
use App\Models\UserProfileModel;
use App\Models\JenisServiceModel;
use App\Models\PembayaranServiceModel;
use App\Models\JenisTransaksiLainnyaModel;
use App\Models\JenisBebanModel;

class Service extends BaseController
{
    protected $db, $builder;
    // protected $PembelianModel;
    protected $DataKelolaAdminModel;
    protected $PembayaranServiceModel;
    protected $JenisServiceModel;
    protected $StockModel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->UserProfileModel = new UserProfileModel();
        $this->PemesananModel = new PemesananModel();
        $this->DataKelolaServiceModel = new DataKelolaServiceModel();
        $this->PembayaranServiceModel = new PembayaranServiceModel();
        $this->JenisServiceModel = new JenisServiceModel();
        $this->StockModel = new StockModel();
        $this->JenisTransaksiLainnyaModel = new JenisTransaksiLainnyaModel();
        $this->JenisBebanModel = new JenisBebanModel();
    }
    public function index()
    {
        $model = new DataKelolaServiceModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'totalBooking' => $model->countAll(),
            'totalField' => $this->PembayaranServiceModel->countAll(),
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPemesanan' => $model->getTotalPemesanan(),
            // 'namaAdmin' => $model->getNamaAdmin(),
            // 'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'service/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    public function pemesanan()
    {
        $model = new DataKelolaServiceModel;
        $pelanggan = $this->db->table('tb_pelanggan')->get()->getResult();
        $karyawan = $this->db->table('karyawan')->get()->getResult();
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'title' => 'Home',
            'tampil' => 'service/pemesanan',
            // 'serviceBaru' => $model->getServiceBaru(),
            'totalField' => $model->countAll(),
            'pelanggan' => $pelanggan,
            'karyawan' => $karyawan,
        ];
        return view('wrapp', $data);
    }
    public function pembayaran()
    {
        $model = new DataKelolaServiceModel;
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'totalBooking' => $model->countAll(),
            'totalField' => $this->PembayaranServiceModel->countAll(),
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPemesanan' => $model->getTotalPemesanan(),
            // 'namaAdmin' => $model->getNamaAdmin(),
            // 'tanggalPembelian' => $model->getTanggalPembelian(),
            'statusPemesanan' => $model->getStatusPemesanan(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'Service/pembayaran',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
    function updateStatusPembayaran($id)
    {
        $this->DataKelolaServiceModel->save([
            'id' => $id,
            'statusPemesanan' => $this->request->getVar('statusPemesanan'),
        ]);

        $this->PembayaranServiceModel->save([
            'statusPembayaran' => $this->request->getVar('statusPemesanan'),
            'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran'),
            'totalPembayaran' => $this->request->getVar('totalPembayaran'),
            'kodetransaksi' => $this->request->getVar('kodetransaksi'),
        ]);

        return redirect()->to('/user/dashboard/service/pembayaran');
    }
    public function history()
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
            'tampil' => 'service/history',
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function save()
    {
        $jenisService = $_POST['jenisService'];
        $kodetransaksi = $_POST['kodetransaksi'];
        $jenisPelayanan = $_POST['jenisPelayanan'];
        $jenisPesan = $_POST['jenisPesan'];
        $diskon = $_POST['diskon'];
        $totalService = $_POST['totalService'];
        $pricePemesanan = $_POST['pricePemesanan'];

        $data = [];

        $index = 0; // Set index array awal dengan 0
        foreach ($jenisService as $jp) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'jenisService' => $jp,
                'kodetransaksi' => $kodetransaksi,
                'jenisPelayanan' => $jenisPelayanan,
                'jenisPesan' => $jenisPesan,
                'diskon' => $diskon,
                'totalService' => $totalService[$index],
                'pricePemesanan' => $pricePemesanan[$index]
            ]);


            $index++;
        }
        $this->PemesananModel->insertBatch($data);

        $this->DataKelolaServiceModel->save([
            'namaPelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'kodetransaksi' => $this->request->getVar('kodetransaksi'),
            'tanggalPemesanan' => $this->request->getVar('tanggalPemesanan'),
            'namaAdmin' => $this->request->getVar('namaAdmin'),
            'statusPemesanan' => $this->request->getVar('statusPemesanan'),
            'noTelepon' => $this->request->getVar('noTelepon'),
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/user/dashboard/service');
    }
    public function saveJenisService()
    {
        $this->JenisServiceModel->save([
            'jenisService' => $this->request->getVar('jenisService'),
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/user/dashboard/service/pemesanan');
    }
}
