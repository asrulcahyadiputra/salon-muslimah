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
use App\Models\UpahGajiModel;


class Laporan extends BaseController
{
    protected $StockModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();;
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
    }
    public function index()
    {
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'laporan/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
        ];
        return view('wrapp', $data);
    }

    public function arus_kas()
    {
        if ($this->request->getVar('bulan') == null && $this->request->getVar('tahun') == null) {
            $bulan = null;
            $tahun = null;

            $where = " and LEFT(tgl_jurnal, 7) = '2022-07'";
            $periode_name = "Periode " . bulan('07') . ' ' . 2022;
        } else {
            $bulan = $this->request->getVar('bulan');
            $tahun = $this->request->getVar('tahun');
            $periode = $tahun . '-' . $bulan;
            $periode_name = "Periode " . bulan($bulan) . ' ' . $tahun;
            $where = " and LEFT(tgl_jurnal, 7) = '$periode'";
        }

        $pnd = $this->db->query("SELECT a.*, b.namaAkun, b.posisi_d_c AS saldo_normal, b.is_arus_kas, SUM(nominal) AS total
        FROM tb_jurnal a 
        JOIN akun b ON a.no_coa = b.kodeAkun
        WHERE b.is_arus_kas = 1 
        AND b.header = 4
        $where
        GROUP BY b.header");

        $beban1 = $this->db->query("SELECT a.*, b.namaAkun, b.posisi_d_c AS saldo_normal, b.is_arus_kas, SUM(nominal) AS total
        FROM tb_jurnal a 
        JOIN akun b ON a.no_coa = b.kodeAkun
        WHERE b.is_arus_kas = 1
        and b.header = 5
        $where
        GROUP BY header");

        $pmb = $this->db->query("SELECT a.*, b.namaAkun, b.posisi_d_c AS saldo_normal, b.is_arus_kas, SUM(nominal) AS total
        FROM tb_jurnal a 
        JOIN akun b ON a.no_coa = b.kodeAkun
        -- WHERE b.is_arus_kas = 2
        and b.namaAkun like '%Peralatan%'
        $where
        GROUP BY no_coa");

        $privee = $this->db->query("SELECT a.*, b.namaAkun, b.posisi_d_c AS saldo_normal, b.is_arus_kas, SUM(nominal) AS total
        FROM tb_jurnal a 
        JOIN akun b ON a.no_coa = b.kodeAkun
        WHERE b.is_arus_kas = 3
        $where
        GROUP BY no_coa");

        $pendapatan_jasa = $pnd->getRow()->total ?? 0;
        $beban = $beban1->getRow()->total ?? 0;
        $pembelian = $pmb->getResult();
        $prive = $privee->getResult();

        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'laporan/arus_kas',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'pendapatan_jasa' => $pendapatan_jasa,
            'beban' => $beban,
            'pembelian' => $pembelian,
            'prive' => $prive,
            'periode_name' => $periode_name
        ];
        return view('wrapp', $data);
    }

    public function laporan_stok()
    {
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $periode = $tahun . '' . $bulan;
        $periode_name = '';
        if (isset($periode)) {
            $periode_name = "Periode " . bulan($bulan) . ' ' . 2022;
            $stok = $this->db->query("select a.kode_produk, a.nama_produk, a.begining_stock, a.stock_in, a.stock_out, (a.begining_stock + a.stock) as stock 
            from 
            (
                    select aa.kode as kode_produk, aa.nama as nama_produk,(ab.stock_in - ab.stock_out) as begining_stock ,aa.stock_in, aa.stock_out, (aa.stock_in - aa.stock_out) as stock 
                    from 
                    (
                        select a.id_product as kode, a.nama_product as nama, sum(if(b.type='in', b.qty, 0)) as stock_in, sum(if(b.type='out', b.qty, 0)) as stock_out from tb_product a 
                        left join tb_stok b on a.id_product=b.id_bahan and date_format(b.tanggal,'%Y%m') = '$periode' where a.id_kategori = 1
                        group by a.id_product
                    ) aa 
                    left join 
                    (
                        select a.id_product as kode, a.nama_product as nama_produk, sum(if(b.type='in', b.qty, 0)) as stock_in, sum(if(b.type='out', b.qty, 0)) as stock_out from tb_product a 
                        left join tb_stok b on a.id_product=b.id_bahan and date_format(b.tanggal,'%Y%m') < '$periode' where a.id_kategori = 1
                        group by a.id_product
                    ) ab on aa.kode = ab.kode
            ) a")->getResult();
            $data = [
                'dataStockBahan' => $this->StockModel->getDataStockBahan(),
                'title' => 'Home',
                'tampil' => 'laporan/stok',
                'dataJenisService' => $this->JenisServiceModel->get(),
                'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
                'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
                'stok' => $stok,
                'periode_name' => $periode_name
            ];
            return view('wrapp', $data);
        }
    }

    public function jurnalUmum()
    {
        if ($this->request->getVar('bulan') == null && $this->request->getVar('tahun') == null) {
            $bulan = null;
            $tahun = null;

            $where = "WHERE LEFT(tgl_jurnal, 7) = '2022-01'";
            $periode_name = "Periode " . bulan('01') . ' ' . 2022;
        } else {
            $bulan = $this->request->getVar('bulan');
            $tahun = $this->request->getVar('tahun');
            $periode = $tahun . '-' . $bulan;
            $periode_name = "Periode " . bulan($bulan) . ' ' . $tahun;
            $where = "WHERE LEFT(tgl_jurnal, 7) = '$periode'";
        }


        $jurnal = $this->db->query("SELECT a.*, b.namaAkun, b.header
        FROM tb_jurnal a
        JOIN akun b ON a.no_coa = b.kodeAkun
        $where
        ORDER BY id ASC")->getResult();
        $data = [
            'filterByBulan' => $bulan,
            'filterByTahun' => $tahun,
            'jurnal' => $jurnal,
            'title' => 'Home',
            'tampil' => 'laporan/jurnalUmum',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $this->PembayaranAsetModel->get(),
            'dataTransaksiAsetByFilter' => $this->PembayaranAsetModel->getTransaksiAsetByFilter($bulan, $tahun),
            'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
            'all_data_aset' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
            'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            'upahGaji' => $this->UpahGajiModel->get(),
            'upahGajiByFilter' => $this->UpahGajiModel->getTransaksiGajiByFilter($bulan, $tahun),
            'periode_name'  => $periode_name
        ];
        return view('wrapp', $data);
    }

    public function bukuBesar()
    {
        if ($this->request->getVar('bulan') == null && $this->request->getVar('tahun') && $this->request->getVar('coa')) {
            $bulan = null;
            $tahun = null;
            $coa = null;
        }
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $akun = $this->db->query("SELECT * FROM akun order by kodeAkun asc")->getResult();

        $periode = $tahun . '-' . $bulan;
        $no_coa = $this->request->getVar('coa');
        if (isset($periode, $no_coa)) {
            # code...
            $cek = date('m-Y', strtotime("-1 months", strtotime($periode)));
            $bulan1 = substr($cek, 0, 2);
            $tahun1 = substr($cek, 3, 7);
            $query = $this->db->query("SELECT 
            SUM(nominal) AS debit, 
            (
                SELECT sum(nominal) 
                FROM tb_jurnal 
                WHERE no_coa = '$no_coa' 
                AND MONTH(tgl_jurnal) <= '$bulan1' 
                AND YEAR(tgl_jurnal) <= '$tahun1' 
                and posisi_d_c = 'k' 
            ) AS kredit
            FROM tb_jurnal
            WHERE no_coa = '$no_coa'
            AND MONTH(tgl_jurnal) <= '$bulan1'
            AND YEAR(tgl_jurnal) <= '$tahun1'
            AND posisi_d_c = 'd'");

            $debit = $query->getRow()->debit;
            $kredit = $query->getRow()->kredit;
            $pengurangan = $debit - $kredit;

            /** cek saldo awal berdasarkan no coa */
            $saldoByCoa = $this->db->query("SELECT * FROM akun WHERE kodeAkun = '$no_coa'")->getRow()->saldo_awal;
            $saldo_awal = $saldoByCoa + $pengurangan;

            $query2 = $this->db->query("SELECT 
            a.*, b.namaAkun, b.saldo_awal, b.header
            FROM tb_jurnal a
            JOIN akun b ON a.no_coa = b.kodeAkun
            WHERE b.kodeAkun = '$no_coa' 
            AND LEFT(a.tgl_jurnal, 7) = '$periode'
            ORDER BY tgl_jurnal ASC");

            $listBB = $query2->getResult();
            $getSaldo = $query2->getRow()->saldo_awal ?? 0;

            $data = [
                'per' => $periode,
                'list' => $listBB,
                'saldo_awal' => $saldo_awal,
                'coa' => $akun,
                'dataStockBahan' => $this->StockModel->getDataStockBahan(),
                'title' => 'Home',
                'tampil' => 'laporan/bukuBesar',
                'dataJenisService' => $this->JenisServiceModel->get(),
                'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
                'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
                'dataStockBahan' => $this->StockModel->getDataStockBahan(),
                'dataTransaksiAset' => $this->PembayaranAsetModel->get(),
                'dataTransaksiAsetByFilter' => $this->PembayaranAsetModel->getTransaksiAsetByFilter($bulan, $tahun),
                'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
                'all_data_aset' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
                'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            ];
            return view('wrapp', $data);
        } else {
            $cek = date('m-Y', strtotime("-1 months", strtotime($periode)));
            $bulan1 = substr($cek, 0, 2);
            $tahun1 = substr($cek, 3, 7);
            $query = $this->db->query("SELECT 
            SUM(nominal) AS debit, 
            (
                SELECT sum(nominal) 
                FROM tb_jurnal 
                WHERE no_coa = '$no_coa' 
                AND MONTH(tgl_jurnal) <= '$bulan1' 
                AND YEAR(tgl_jurnal) <= '$tahun1' 
                and posisi_d_c = 'k' 
            ) AS kredit
            FROM tb_jurnal
            WHERE no_coa = '$no_coa'
            AND MONTH(tgl_jurnal) <= '$bulan1'
            AND YEAR(tgl_jurnal) <= '$tahun1'
            AND posisi_d_c = 'd'");

            $debit = $query->getRow()->debit;
            $kredit = $query->getRow()->kredit;
            $pengurangan = $debit - $kredit;

            /** cek saldo awal berdasarkan no coa */
            $saldoByCoa = $this->db->query("SELECT * FROM akun WHERE kodeAkun = '$no_coa'")->getRow()->saldo_awal ?? 0;
            // print_r($saldoByCoa);exit;
            $saldo_awal = $saldoByCoa + $pengurangan;

            $query2 = $this->db->query("SELECT 
            a.*, b.namaAkun, b.saldo_awal, b.header
            FROM tb_jurnal a
            JOIN akun b ON a.no_coa = b.kodeAkun
            WHERE b.kodeAkun = '$no_coa' 
            AND LEFT(a.tgl_jurnal, 7) = '$periode'
            ORDER BY tgl_jurnal ASC");
            // print_r($query2);exit;

            $listBB = $query2->getResult();
            $getSaldo = $query2->getRow()->saldo_awal ?? 0;

            $data = [
                'per' => '',
                'list' => $listBB,
                'saldo_awal' => $saldo_awal,
                'coa' => $akun,
                'dataStockBahan' => $this->StockModel->getDataStockBahan(),
                'title' => 'Home',
                'tampil' => 'laporan/bukuBesar',
                'dataJenisService' => $this->JenisServiceModel->get(),
                'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
                'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
                'dataStockBahan' => $this->StockModel->getDataStockBahan(),
                'dataTransaksiAset' => $this->PembayaranAsetModel->get(),
                'dataTransaksiAsetByFilter' => $this->PembayaranAsetModel->getTransaksiAsetByFilter($bulan, $tahun),
                'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
                'all_data_aset' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
                'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            ];
            return view('wrapp', $data);
        }
    }

    public function labaRugi()
    {
        $where = "";
        if ($this->request->getVar('bulan') == null && $this->request->getVar('tahun') == null) {
            $bulan = null;
            $tahun = null;
            $periode_name = "Semua Periode";
        } else {
            $bulan = $this->request->getVar('bulan');
            $tahun = $this->request->getVar('tahun');
            $periode_name = "Periode " . bulan($bulan) . ' ' . $tahun;
            $where  .= " and month(a.tgl_jurnal) = '$bulan' and year(a.tgl_jurnal) = '$tahun'";
        }

        $pnd = $this->db->query("SELECT a.*, b.namaAkun, b.posisi_d_c AS saldo_normal, b.is_laba_rugi, SUM(nominal) AS total
        FROM tb_jurnal a 
        JOIN akun b ON a.no_coa = b.kodeAkun
        WHERE b.is_laba_rugi = 1 
        AND b.header = '4'
        $where
        GROUP BY no_coa");

        $beban1 = $this->db->query("SELECT a.*, b.namaAkun, b.posisi_d_c AS saldo_normal, b.is_arus_kas, SUM(nominal) AS total
        FROM tb_jurnal a 
        JOIN akun b ON a.no_coa = b.kodeAkun
        WHERE b.is_arus_kas = 1
        and b.namaAkun like '%beban%'
        $where
        GROUP BY no_coa");


        if (count($pnd->getResultArray()) > 0) {
            $pendapatan_jasa = $pnd->getResult();
        } else {
            $pendapatan_jasa = [];
        }
        if (count($beban1->getResultArray()) > 0) {
            $beban = $beban1->getResult();
        } else {
            $beban = [];
        }

        $data = [
            'filterByBulan' => $bulan,
            'filterByTahun' => $tahun,
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'laporan/labaRugi',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $this->PembayaranAsetModel->get(),
            'dataTransaksiAsetByFilter' => $this->PembayaranAsetModel->getTransaksiAsetByFilter($bulan, $tahun),
            'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
            'all_data_aset' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
            'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            'pendapatan_jasa' => $pendapatan_jasa,
            'beban' => $beban,
            'periode_name' => $periode_name,
        ];
        return view('wrapp', $data);
    }

    public function neraca()
    {
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'laporan/neraca',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $this->PembayaranAsetModel->get(),
            'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
            'all_data_aset' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
            'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            // 'title' => 'Home',
            // 'tampil' => 'pencatatan/pengeluaran/aset/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBeban' => $this->PembayaranBebanModel->get(),
            'dataKelolaBeban' => $this->DataKelolaBebanModel->get(),
            'all_data' => $this->DataKelolaBebanModel->getDataTransaksiBeban(),
            'totalPembelianBeban' => $this->DataKelolaBebanModel->getTotalPembelianBeban(),
            // 'title' => 'Home',
            // 'tampil' => 'pencatatan/pengeluaran/beban/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiBahan' => $this->PembayaranBahanModel->get(),
            'dataKelolaBahan' => $this->DataKelolaBahanModel->get(),
            'all_data_bahan' => $this->DataKelolaBahanModel->getDataTransaksiBahan(),
            'totalPembelianBahan' => $this->DataKelolaBahanModel->getTotalPembelianBahan(),
            // 'title' => 'Home',
            // 'tampil' => 'pencatatan/pengeluaran/bahan/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiLainnya' => $this->PembayaranTransaksiLainnyaModel->get(),
            'dataKelolaTransaksiLainnya' => $this->DataKelolaTransaksiLainnyaModel->get(),
            'all_data_lainnya' => $this->DataKelolaTransaksiLainnyaModel->getDataTransaksiLainnya(),
            'totalPembelianTransaksiLainnya' => $this->DataKelolaTransaksiLainnyaModel->getTotalPembelianTransaksiLainnya(),
            // 'title' => 'Home',
            // 'tampil' => 'pencatatan/pengeluaran/lainnya/history',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            // 'dataTransaksiAset' => $model->get(),
            // 'all_data' => $model->getDataTransaksiAset(),
            // 'totalPembelianAset' => $model->getTotalPembelianAset(),
            'model' => $this->DataKaryawanModel,
            'dataGajiKaryawan' => $this->DataKaryawanModel->get(),
            'dataKaryawan' => $this->DataKaryawanModel->getDataKaryawan(),
            'dataKaryawanAbsen' => $this->DataKaryawanModel->getDataKaryawanAbsen(),
            'dataAbsen' => $this->DataKaryawanModel->getDataAbsen(),
            // 'title' => 'Home',
            // 'tampil' => 'pencatatan/pengeluaran/gaji/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'upahGaji' => $this->UpahGajiModel->get(),
            'totalHistoryPembayaranProduct' => $this->DataKelolaAdminModel->getTotalHistoryPembayaran(),
            'totalHistoryPembayaranService' => $this->DataKelolaServiceModel->getTotalHistoryPembayaran(),
            'neraca'                        => $this->get_neraca(),
        ];
        return view('wrapp', $data);
    }


    // to load view report
    public function laporan_perubahan_modal()
    {
        $data = [
            'title' => 'Home',
            'tampil' => 'laporan/perubahan_modal',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban(),
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'dataTransaksiAset' => $this->PembayaranAsetModel->get(),
            'dataKelolaAset' => $this->DataKelolaAsetModel->get(),
            'all_data_aset' => $this->DataKelolaAsetModel->getDataTransaksiAset(),
            'totalPembelianAset' => $this->DataKelolaAsetModel->getTotalPembelianAset(),
            'upahGaji' => $this->UpahGajiModel->get(),
            'perubahan' => $this->get_laporan_perubahan_modal()
        ];

        return view('wrapp', $data);
    }

    public function get_laporan_perubahan_modal()
    {

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');

        $where = '';
        $where2 = '';
        if ($bulan !== null && $tahun !== null) {
            $periode = $tahun . '' . $bulan;
            $periode_name = 'Periode ' . medium_bulan($bulan) . ' ' . $tahun;
            $where .= " and date_format(a.tgl_jurnal,'%Y%m') = '$periode'";
            $where2 .= " and date_format(a.tgl_jurnal,'%Y%m') <= '$periode'";
        } else {
            $periode_name = "Semua Periode";
        }

        $pendapatan = $this->db->query("select b.header, sum(a.nominal) as pendapatan from tb_jurnal a join akun b on a.no_coa=b.kodeAkun where b.header ='4' $where group by b.header")->getRowObject();

        $total_pendapatan = 0;
        if ($pendapatan !== null) {
            $total_pendapatan = $pendapatan->pendapatan;
        }

        $beban = $this->db->query("select b.header, sum(a.nominal) as beban from tb_jurnal a join akun b on a.no_coa=b.kodeAkun where b.header ='5' $where group by b.header")->getRowObject();
        $total_beban = 0;
        if ($beban !== null) {
            $total_beban = $beban->beban;
        }

        // perhitungan laba / rugi
        $profit = $total_pendapatan -  $total_beban;

        $modal = $this->db->query("select a.no_coa, sum(a.nominal) as modal from tb_jurnal a where a.no_coa='300' $where2 group by a.no_coa")->getRowObject();
        $total_modal = 0;
        if ($modal !== null) {
            $total_modal = $modal->modal;
        }

        $prive = $this->db->query("select a.no_coa, sum(a.nominal) as prive from tb_jurnal a where a.no_coa='312' $where group by a.no_coa")->getRowObject();
        $total_prive = 0;
        if ($prive !== null) {
            $total_prive = $prive->prive;
        }

        $perubahan = $profit - $total_prive;

        $perubahan_modal = $total_modal + $perubahan;

        $res = [
            'periode'               => $periode_name,
            'laba_bersih'           => [
                'total_pendapatan'      => intval($total_pendapatan),
                'total_beban'           => intval($total_beban),
                'profit'                => $profit
            ],
            'modal'                 => [
                'total_modal'    => intval($total_modal),
                'total_prive'    => intval($total_prive)
            ],
            'perubahan'         => [
                'modal'             => intval($total_modal),
                'laba_bersih'       => intval($profit),
                'prive'             => intval($total_prive),
                'perubahan'         => intval($perubahan),
                'perubahan_modal'   => intval($perubahan_modal)

            ],
            'modal_akhir'           => $perubahan_modal
        ];

        // return $this->response->setJSON($res);
        return $res;
    }

    public function get_neraca()
    {
        $get_perubahan_modal = $this->get_laporan_perubahan_modal();

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');

        $where = "where a.tgl_jurnal != '' ";
        $where2 = "where a.tgl_jurnal != ''";
        if ($bulan !== null && $tahun !== null) {
            $periode = $tahun . '' . $bulan;
            $periode_name = 'Periode ' . medium_bulan($bulan) . ' ' . $tahun;
            $where .= " and date_format(a.tgl_jurnal,'%Y%m') = '$periode'";
            $where2 .= " and date_format(a.tgl_jurnal,'%Y%m') <= '$periode'";
        } else {
            $periode_name = "Semua Periode";
        }

        $modal = $get_perubahan_modal['modal_akhir'];
        $aktiva = $this->db->query("select aa.kodeAkun, aa.namaAkun, aa.posisi_d_c, 
        ifnull(ab.debet,0) as debet, 
        ifnull(ab.kredit,0) as kredit,
        if(aa.posisi_d_c = 'd', (ifnull(ab.debet,0)- ifnull(ab.kredit,0)),(ifnull(ab.kredit,0) - ifnull(ab.debet,0))) as saldo
        from akun aa 
        left join (
            select a.no_coa, sum(if(a.posisi_d_c='d', a.nominal, 0)) as debet, sum(if(a.posisi_d_c='k', a.nominal, 0)) as kredit 
            from tb_jurnal a   group by a.no_coa
        ) ab on aa.kodeAkun=ab.no_coa
        where aa.header = '1'")->getResultArray();

        $pasiva = $this->db->query("select aa.kodeAkun, aa.namaAkun, aa.posisi_d_c, 
        ifnull(ab.debet,0) as debet, 
        ifnull(ab.kredit,0) as kredit,
        if(aa.posisi_d_c = 'd', (ifnull(ab.debet,0)- ifnull(ab.kredit,0)),(ifnull(ab.kredit,0) - ifnull(ab.debet,0))) as saldo
        from akun aa 
        left join (
            select a.no_coa, sum(if(a.posisi_d_c='d', a.nominal, 0)) as debet, sum(if(a.posisi_d_c='k', a.nominal, 0)) as kredit 
            from tb_jurnal a $where group by a.no_coa
        ) ab on aa.kodeAkun=ab.no_coa
        where aa.header = '2'")->getResultArray();

        $debet = 0;
        $kredit = 0;
        foreach ($aktiva as $row) {
            if ($row['posisi_d_c'] == 'd') {
                $debet = ($debet + $row['debet']) - $row['kredit'];
            } else {
                if ($row['kredit'] > 0) {
                    $kredit = ($kredit +  $row['kredit']) - $debet;
                } else {
                    $kredit = 0;
                }
            }
        }
        $total_aktiva = $debet - $kredit;

        $debet2 = 0;
        $kredit2 = 0;
        foreach ($pasiva as $row1) {
            if ($row['posisi_d_c'] == 'k') {
                $kredit2 = ($kredit2 + $row1['kredit']) - $row1['debet'];
            } else {
                $debet2 = ($debet2 + $row1['debet']) - $kredit2;
            }
        }
        $total_pasiva = $kredit2 - $debet2;

        $res = [
            'periode'       => $periode_name,
            'aktiva'        => [
                'akun'          => $aktiva,
                'total_debet'   => $debet,
                'total_kredit'  => $kredit,
            ],
            'total_aktiva'  => $total_aktiva,
            'pasiva'        => [
                'akun'      => $pasiva,
                'total_debet'   => $debet2,
                'total_kredit'  => $kredit2,

            ],
            'modal'         => $modal,
            'total_pasiva'  => $total_pasiva + $modal,
        ];

        // return $this->response->setJSON($res);
        return $res;
    }
}
