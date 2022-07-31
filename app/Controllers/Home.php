<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\PembelianModel;
use App\Models\DataKelolaAdminModel;
use App\Models\PembayaranModel;
use App\Models\UserProfileModel;
use App\Models\DataKelolaServiceModel;
use App\Models\PemesananModel;
use App\Models\PembayaranServiceModel;
use App\Models\JenisServiceModel;
use App\Models\JenisTransaksiLainnyaModel;
use App\Models\JenisBebanModel;

class Home extends BaseController
{
    protected $StockModel;
    protected $PembelianModel;
    protected $DataKelolaAdminModel;
    protected $PembayaranModel;
    protected $PembayaranServiceModel;
    public function __construct()
    {
        $this->StockModel = new StockModel();
        $this->PemesananModel = new PemesananModel();
        $this->DataKelolaServiceModel = new DataKelolaServiceModel();
        $this->PembayaranServiceModel = new PembayaranServiceModel();
        $this->PembelianModel = new PembelianModel();
        $this->DataKelolaAdminModel = new DataKelolaAdminModel();
        $this->PembayaranModel = new PembayaranModel();
        $this->JenisServiceModel = new JenisServiceModel();
        $this->JenisTransaksiLainnyaModel = new JenisTransaksiLainnyaModel();
        $this->JenisBebanModel = new JenisBebanModel();
    }
    public function index()
    {
        $model = new PembelianModel;
        $data = [
            'dataPembelianProduk' => $model->getDataPembelianProduk(),
            'dataPemesananService' => $this->PemesananModel->getDataPemesananService(),
            'dataProdukTerjual' => $this->PembayaranModel->getDataProdukTerjual(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'admin/dashboard',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }
}
