<?php

namespace App\Controllers;

use App\Models\PembelianModel;
use App\Models\DataKelolaAdminModel;
use App\Models\PembayaranModel;
use App\Models\UserProfileModel;
use App\Models\StockModel;
use App\Models\JenisServiceModel;
use App\Models\JenisTransaksiLainnyaModel;
use App\Models\JenisBebanModel;

class Product extends BaseController
{
    protected $db, $builder;
    protected $PembelianModel;
    protected $DataKelolaAdminModel;
    protected $PembayaranModel;
    protected $StockModel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->UserProfileModel = new UserProfileModel();
        $this->PembelianModel = new PembelianModel();
        $this->DataKelolaAdminModel = new DataKelolaAdminModel();
        $this->PembayaranModel = new PembayaranModel();
        $this->StockModel = new StockModel();
        $this->JenisServiceModel = new JenisServiceModel();
        $this->JenisTransaksiLainnyaModel = new JenisTransaksiLainnyaModel();
        $this->JenisBebanModel = new JenisBebanModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $model = new DataKelolaAdminModel;
        // $model2 = new PembelianModel;
        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'product/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function pembayaran()
    {
        $model = new DataKelolaAdminModel;
        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'statusPembayaran' => $model->getStatusPembayaran(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'product/pembayaran',
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    function updateStatusPembayaran($id)
    {
        $this->DataKelolaAdminModel->save([
            'id' => $id,
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
        ]);

        $this->PembayaranModel->save([
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
            'kodetransaksi' => $this->request->getVar('kodetransaksi'),
            'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran'),
            'totalPembayaran' => $this->request->getVar('totalPembayaran'),
            'totalProduk' => $this->request->getVar('totalProduk'),
        ]);

        return redirect()->to('/user/dashboard/product/pembayaran');
    }

    public function history()
    {
        if ($this->request->getVar('datePencarian') == null) {
            $historyDate = null;
        }
        $historyDate = $this->request->getVar('datePencarian');
        $model = new DataKelolaAdminModel;
        $data = [
            'model' => $model,
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
            'tampil' => 'product/history',
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function pembelian()
    {
        $model = new DataKelolaAdminModel;
        $produk = $this->db->table('produk')->get()->getResult();
        $data = [
            'title' => 'Home',
            'tampil' => 'product/pembelian',
            'produkBaru' => $model->getProdukBaru(),
            'totalField' => $model->countAll(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'produk' => $produk
        ];
        return view('wrapp', $data);
    }

    public function save()
    {
        $namaProduk = $_POST['namaProduk'];
        $jumlahProduk = $_POST['kuantitas'];
        // $namaAdmin = $_POST['namaAdmin'];
        // $tanggalPembelian = $_POST['tanggalPembelian'];
        $total = $_POST['total'];
        $kodetransaksi = $_POST['kodetransaksi'];
        $price = $_POST['price'];

        $data = [];

        $index = 0; // Set index array awal dengan 0
        foreach ($namaProduk as $p) { // Kita buat perulangan berdasarkan produk sampai data terakhir
            array_push($data, [
                'namaProduk' => $p,
                'jumlahProduk' => $jumlahProduk[$index],
                // 'namaAdmin' => $namaAdmin[$index],
                // 'tanggalPembelian' => $tanggalPembelian[$index],
                'total' => $total[$index],
                'kodetransaksi' => $kodetransaksi,
                'price' => $price[$index]
            ]);


            $index++;
        }
        $this->PembelianModel->insertBatch($data);

        $this->DataKelolaAdminModel->save([
            'kodetransaksi' => $this->request->getVar('kodetransaksi'),
            'tanggalPembelian' => $this->request->getVar('tanggalPembelian'),
            'namaAdmin' => $this->request->getVar('namaAdmin')
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/user/dashboard/product');
    }

    public function savePembayaran()
    {
        $this->PembayaranModel->save([
            'statusPembayaran' => $this->request->getVar('statusPembayaran'),
            'kodetransaksi' => $this->request->getVar('kodetransaksi'),
            'tanggalPembayaran' => $this->request->getVar('tanggalPembayaran')
        ]);
        return redirect()->to('/user/dashboard/product/pembayaran');
    }
}
