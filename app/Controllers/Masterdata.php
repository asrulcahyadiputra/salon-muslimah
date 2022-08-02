<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\PembelianModel;
use App\Models\JenisBebanModel;
use App\Models\PembayaranModel;
use App\Models\UserProfileModel;
use App\Models\JenisServiceModel;
use App\Controllers\BaseController;
use App\Models\DataKelolaAdminModel;
use App\Models\JenisTransaksiLainnyaModel;
use App\Models\KodeOtomatis;

class Masterdata extends BaseController
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

    public function satuan()
    {
        $model = new DataKelolaAdminModel;
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $satuan = $this->db->table('tb_satuan')->get()->getResult();
        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'masterdata/satuan/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'satuan' => $satuan
        ];
        return view('wrapp', $data);
    }

    public function satuanSave()
    {
        $keterangan = $this->request->getVar('keterangan');
        $data = [
            'keterangan' => $keterangan
        ];
        $this->db->table('tb_satuan')
            ->insert($data);

        session()->setFlashdata('sukses', 'Data Satuan Berhasil di Tambahkan');
        return redirect()->to('/user/dashboard/masterdata/satuan');
    }

    public function satuanEdit()
    {
        $id = $this->request->getVar('id');
        $keterangan = $this->request->getVar('keterangan');

        $data = [
            'keterangan' => $keterangan
        ];

        $this->db->table('tb_satuan')
            ->where('id', $id)
            ->update($data);
        session()->setFlashdata('sukses', 'Data Satuan Berhasil di Update');

        return redirect()->to('/user/dashboard/masterdata/satuan');
    }

    /** jabatan */
    public function jabatan()
    {
        $model = new DataKelolaAdminModel;
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $tb_jabatan = $this->db->table('tb_jabatan')->get()->getResult();
        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'masterdata/jabatan/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'tb_jabatan' => $tb_jabatan
        ];
        return view('wrapp', $data);
    }

    public function showJabatan($id)
    {
        $data = $this->db->query("select * from tb_jabatan where id=?", [$id])->getRowObject();

        return $this->response->setJSON($data);
    }

    public function jabatanSave()
    {
        $deskripsi = $this->request->getVar('deskripsi');
        $gapok = $this->request->getVar('gapok');

        $data = [
            'deskripsi' => $deskripsi,
            'gapok' => $gapok
        ];
        $this->db->table('tb_jabatan')
            ->insert($data);

        return redirect()->to('user/dashboard/masterdata/jabatan');
    }
    public function jabatanUpdate()
    {
        $id = $this->request->getVar('id');
        $deskripsi = $this->request->getVar('deskripsi');
        $gapok = $this->request->getVar('gapok');

        $data = [
            'deskripsi' => $deskripsi,
            'gapok' => $gapok
        ];
        $this->db->table('tb_jabatan')
            ->where('id', $id)
            ->update($data);

        return redirect()->to('user/dashboard/masterdata/jabatan');
    }

    public function jabatanEdit()
    {
        $id = $this->request->getVar('id');
        $keterangan = $this->request->getVar('keterangan');

        $data = [
            'keterangan' => $keterangan
        ];

        $this->db->table('tb_satuan')
            ->where('id', $id)
            ->update($data);

        return redirect()->to('/user/dashboard/masterdata/satuan');
    }

    /** jenis service */
    public function jenisService()
    {
        $model = new DataKelolaAdminModel;
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $jenis_service = $this->db->table('jenisService')->get()->getResult();
        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'masterdata/jenis_service/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'jenis_service' => $jenis_service
        ];
        return view('wrapp', $data);
    }

    public function jenis_serviceSave()
    {
        $jenisService = $this->request->getVar('jenisService');
        $harga_service = $this->request->getVar('harga_service');

        $data = [
            'jenisService' => $jenisService,
            'harga_service' => $harga_service,
        ];

        $this->db->table('jenisservice')
            ->insert($data);

        return redirect()->to('/user/dashboard/masterdata/jenis_service');
    }
    public function jenis_serviceEdit()
    {
        $id = $this->request->getVar('id');
        $jenisService = $this->request->getVar('jenisService');
        $harga_service = $this->request->getVar('harga_service');

        $data = [
            'jenisService' => $jenisService,
            'harga_service' => $harga_service,
        ];

        $this->db->table('jenisservice')
            ->where('id', $id)
            ->update($data);

        return redirect()->to('/user/dashboard/masterdata/jenis_service');
    }

    /** pelanggan */
    public function pelanggan()
    {
        $model = new DataKelolaAdminModel;
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $pelanggan = $this->db->table('tb_pelanggan')->get()->getResult();
        $kode = new KodeOtomatis();

        $id_pelanggan = $kode->id_pelanggan();
        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'masterdata/pelanggan/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'pelanggan' => $pelanggan,
            'id_pelanggan'  => $id_pelanggan
        ];
        return view('wrapp', $data);
    }

    public function pelangganSave()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $nama_pelanggan = $this->request->getVar('nama_pelanggan');
        $alamat_domisili = $this->request->getVar('alamat_domisili');
        $no_telp = $this->request->getVar('no_telp');

        $data = [
            'id_pelanggan' => $id_pelanggan,
            'nama' => $nama_pelanggan,
            'alamat' => $alamat_domisili,
            'no_telp' => $no_telp,
        ];

        $this->db->table('tb_pelanggan')
            ->insert($data);

        session()->setFlashdata('sukses', 'Data Pelanggan Berhasil di Tambahkan!');

        return redirect()->to('/user/dashboard/masterdata/pelanggan');
    }

    public function pelangganEdit()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $nama_pelanggan = $this->request->getVar('nama_pelanggan');
        $alamat_domisili = $this->request->getVar('alamat_domisili');
        $no_telp = $this->request->getVar('no_telp');

        $data = [
            'nama' => $nama_pelanggan,
            'alamat' => $alamat_domisili,
            'no_telp' => $no_telp,
        ];

        $this->db->table('tb_pelanggan')
            ->where('id_pelanggan', $id_pelanggan)
            ->update($data);

        session()->setFlashdata('sukses', 'Data Pelanggan Berhasil di Update!');

        return redirect()->to('/user/dashboard/masterdata/pelanggan');
    }

    /** aset */
    public function aset()
    {
        $model = new DataKelolaAdminModel;
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $aset = $this->db->table('tb_aset')->get()->getResult();
        $satuan = $this->db->table('tb_satuan')->get()->getResult();

        $kode = new KodeOtomatis();
        $id_aset  = $kode->id_aset();

        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'masterdata/aset/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'aset' => $aset,
            'satuan' => $satuan,
            'id_aset' => $id_aset
        ];
        return view('wrapp', $data);
    }


    // get spesific resource
    public function showAset($id)
    {
        $data = $this->db->query("select id, id_aset, nama, jenis_aset, harga, satuan from tb_aset where id_aset = ?", [$id])->getRowObject();

        return $this->response->setJSON($data);
    }

    public function asetSave()
    {
        $id_aset = $this->request->getVar('id_aset');
        $nama_aset = $this->request->getVar('nama_aset');
        $harga_aset = set_number($this->request->getVar('harga_aset'));
        $satuan = $this->request->getVar('satuan');
        $jenis_aset = $this->request->getVar('jenis_aset');

        $data = [
            'id_aset' => $id_aset,
            'nama' => $nama_aset,
            'jenis_aset' => $jenis_aset,
            'harga' => $harga_aset,
            'satuan' => $satuan,
        ];
        // print_r($data);exit;

        $this->db->table('tb_aset')
            ->insert($data);


        session()->setFlashdata('sukses', 'Data Aset Berhasil di Tambahkan');

        return redirect()->to('/user/dashboard/masterdata/aset');
    }

    public function asetUpdate()
    {
        $id_aset = $this->request->getVar('id_aset');
        $nama_aset = $this->request->getVar('nama_aset');
        $harga_aset = set_number($this->request->getVar('harga_aset'));
        $satuan = $this->request->getVar('satuan');
        $jenis_aset = $this->request->getVar('jenis_aset');

        $data = [
            'id_aset' => $id_aset,
            'nama' => $nama_aset,
            'jenis_aset' => $jenis_aset,
            'harga' => $harga_aset,
            'satuan' => $satuan,
        ];
        // print_r($data);exit;

        $this->db->table('tb_aset')
            ->where('id_aset', $id_aset)
            ->update($data);

        session()->setFlashdata('sukses', 'Data Aset Berhasil di Update');

        return redirect()->to('/user/dashboard/masterdata/aset');
    }

    public function asetEdit()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $nama_pelanggan = $this->request->getVar('nama_pelanggan');
        $alamat_domisili = $this->request->getVar('alamat_domisili');
        $no_telp = $this->request->getVar('no_telp');

        $data = [
            'nama' => $nama_pelanggan,
            'alamat' => $alamat_domisili,
            'no_telp' => $no_telp,
        ];

        $this->db->table('tb_pelanggan')
            ->where('id_pelanggan', $id_pelanggan)
            ->update($data);

        return redirect()->to('/user/dashboard/masterdata/pelanggan');
    }

    /** kategori */
    public function kategori()
    {
        $model = new DataKelolaAdminModel;
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $kategori = $this->db->table('tb_kategori')->get()->getResult();
        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'masterdata/kategori/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'kategori' => $kategori
        ];
        return view('wrapp', $data);
    }

    public function kategoriSave()
    {
        $keterangan = $this->request->getVar('keterangan');
        $data = [
            'keterangan' => $keterangan
        ];
        $this->db->table('tb_kategori')
            ->insert($data);

        return redirect()->to('/user/dashboard/masterdata/kategori');
    }

    public function kategoriEdit()
    {
        $id = $this->request->getVar('id');
        $keterangan = $this->request->getVar('keterangan');
        // print_r($id);exit;

        $data = [
            'keterangan' => $keterangan
        ];

        $this->db->table('tb_kategori')
            ->where('id', $id)
            ->update($data);

        return redirect()->to('/user/dashboard/masterdata/kategori');
    }

    /** product */
    public function product()
    {
        $model = new DataKelolaAdminModel;
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        // $product = $this->db->table('tb_product')->get()->getResult();
        $product = $this->db->query("select a.*, b.keterangan as kategori,c.keterangan as nama_satuan from tb_product a join tb_kategori b on a.id_kategori = b.id left join tb_satuan c on a.satuan=c.id")->getResult();

        $kategori = $this->db->table('tb_kategori')->get()->getResult();

        $kode = new KodeOtomatis();

        $id_product = $kode->id_product();
        $satuan = $this->db->table('tb_satuan')->get()->getResult();

        $data = [
            'model' => $model,
            'dataTransaksi' => $model->get(),
            'all_data' => $model->getDataTransaksi(),
            'totalPembelian' => $model->getTotalPembelian(),
            'namaAdmin' => $model->getNamaAdmin(),
            'tanggalPembelian' => $model->getTanggalPembelian(),
            'totalHistoryPembayaran' => $model->getTotalHistoryPembayaran(),
            'title' => 'Home',
            'tampil' => 'masterdata/product/index',
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'product' => $product,
            'id_product' => $id_product,
            'kategori' => $kategori,
            'satuan'    => $satuan
        ];
        return view('wrapp', $data);
    }

    public function showProduct($id)
    {
        $data = $this->db->query("select * from tb_product where id_product = ?", [$id])->getRowObject();

        return $this->response->setJSON($data);
    }

    public function productSave()
    {
        $id_product = $this->request->getVar('id_product');
        $nama_product = $this->request->getVar('nama_product');
        $kategori = $this->request->getVar('kategori');
        $stok_akhir = $this->request->getVar('stok_akhir');
        $min_stok = $this->request->getVar('min_stok');
        $harga_satuan = set_number($this->request->getVar('harga_satuan'));
        $satuan = $this->request->getVar('satuan');
        $merk = $this->request->getVar('merk');
        $data = [
            'id_product'    => $id_product,
            'nama_product'  => $nama_product,
            'id_kategori'   => $kategori,
            'harga_satuan'  => $harga_satuan,
            'satuan'        => $satuan,
            'merk'          => $merk,
            // 'stok_akhir' => $stok_akhir,
            // 'min_stok' => $min_stok,
        ];
        $this->db->table('tb_product')
            ->insert($data);

        session()->setFlashdata('sukses', 'Data Produk Berhasil di tambahkan');
        return redirect()->to('/user/dashboard/masterdata/product');
    }
    public function productUpdate()
    {
        $id_product = $this->request->getVar('id_product');
        $nama_product = $this->request->getVar('nama_product');
        $kategori = $this->request->getVar('kategori');
        // $stok_akhir = $this->request->getVar('stok_akhir');
        // $min_stok = $this->request->getVar('min_stok');
        $satuan = $this->request->getVar('satuan');
        $harga_satuan = set_number($this->request->getVar('harga_satuan'));
        $merk = $this->request->getVar('merk');
        $data = [
            'id_product'    => $id_product,
            'nama_product'  => $nama_product,
            'id_kategori'   => $kategori,
            'harga_satuan'  => $harga_satuan,
            'satuan'        => $satuan,
            'merk'          => $merk,
            // 'stok_akhir' => $stok_akhir,
            // 'min_stok' => $min_stok,
        ];
        $this->db->table('tb_product')
            ->where('id_product', $id_product)
            ->update($data);
        session()->setFlashdata('sukses', 'Data Produk Berhasil di update');
        return redirect()->to('/user/dashboard/masterdata/product');
    }

    public function productEdit()
    {
        $id = $this->request->getVar('id');
        $keterangan = $this->request->getVar('keterangan');

        $data = [
            'keterangan' => $keterangan
        ];

        $this->db->table('tb_kategori')
            ->where('id', $id)
            ->update($data);

        return redirect()->to('/user/dashboard/masterdata/kategori');
    }
}
