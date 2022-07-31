<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');

$routes->get('/user/dashboard', 'Home::index');

$routes->group('/user/dashboard/masterdata', static function ($routes) {

    /** satuan */

    $routes->get('jenis_service', 'Masterdata::jenisService', ['filter' => 'role:pemilik, admin2']);
    $routes->post('jenis_service/save', 'Masterdata::jenis_serviceSave', ['filter' => 'role:pemilik, admin2']);
    $routes->post('jenis_service/edit', 'Masterdata::jenis_serviceEdit', ['filter' => 'role:pemilik, admin2']);

    $routes->get('satuan', 'Masterdata::satuan', ['filter' => 'role:pemilik, admin2']);
    $routes->post('satuan/save', 'Masterdata::satuanSave', ['filter' => 'role:pemilik, admin2']);
    $routes->post('satuan/edit', 'Masterdata::satuanEdit', ['filter' => 'role:pemilik, admin2']);

    /** pelanggan */
    $routes->get('pelanggan', 'Masterdata::pelanggan', ['filter' => 'role:pemilik, admin2']);
    $routes->post('pelanggan/save', 'Masterdata::pelangganSave', ['filter' => 'role:pemilik, admin2']);
    $routes->post('pelanggan/edit', 'Masterdata::pelangganEdit', ['filter' => 'role:pemilik, admin2']);

    /** kategori */
    $routes->get('kategori', 'Masterdata::kategori', ['filter' => 'role:pemilik, admin2']);
    $routes->post('kategori/save', 'Masterdata::kategoriSave', ['filter' => 'role:pemilik, admin2']);
    $routes->post('kategori/edit', 'Masterdata::kategoriEdit', ['filter' => 'role:pemilik, admin2']);

    /** product */
    $routes->get('product', 'Masterdata::product', ['filter' => 'role:pemilik, admin2']);
    $routes->get('product/(:any)', 'Masterdata::showProduct/$1', ['filter' => 'role:pemilik, admin2']);
    $routes->post('product/save', 'Masterdata::productSave', ['filter' => 'role:pemilik, admin2']);
    $routes->post('product/update', 'Masterdata::productUpdate', ['filter' => 'role:pemilik, admin2']);
    $routes->post('product/edit', 'Masterdata::productEdit', ['filter' => 'role:pemilik, admin2']);

    /** aset */
    $routes->get('aset', 'Masterdata::aset', ['filter' => 'role:pemilik, admin2']);
    $routes->get('aset/(:any)', 'Masterdata::showAset/$1', ['filter' => 'role:pemilik,admin,admin2']);
    $routes->post('aset/save', 'Masterdata::asetSave', ['filter' => 'role:pemilik, admin2']);
    $routes->post('aset/update', 'Masterdata::asetUpdate', ['filter' => 'role:pemilik, admin2']);
    $routes->post('aset/edit', 'Masterdata::asetEdit', ['filter' => 'role:pemilik, admin2']);

    /** jabatan */
    $routes->get('jabatan', 'Masterdata::jabatan', ['filter' => 'role:pemilik, admin2']);
    $routes->get('jabatan/(:any)', 'Masterdata::showJabatan/$1', ['filter' => 'role:pemilik, admin2']);
    $routes->post('jabatan/save', 'Masterdata::jabatanSave', ['filter' => 'role:pemilik, admin2']);
    $routes->post('jabatan/update', 'Masterdata::jabatanUpdate', ['filter' => 'role:pemilik, admin2']);
    $routes->post('jabatan/edit', 'Masterdata::jabatanEdit', ['filter' => 'role:pemilik, admin2']);
});

/** routes transaksi */
$routes->group('/user/transaksi', static function ($routes) {
    /** penjualan */
    $routes->get('penjualan', 'Transaksi::penjualan', ['filter' => 'role:pemilik, admin2']);
    $routes->get('penjualan/form', 'Transaksi::form_penjualan', ['filter' => 'role:pemilik, admin2']);
    $routes->post('penjualan/detail_penjualan', 'Transaksi::detail_penjualan', ['filter' => 'role:pemilik, admin2']);
    $routes->get('penjualan/save', 'Transaksi::save_penjualan', ['filter' => 'role:pemilik, admin2']);

    /** pembelian */
    $routes->get('pembelian', 'Transaksi::pembelian', ['filter' => 'role:pemilik, admin2']);
    $routes->get('pembelian/form', 'Transaksi::form_pembelian', ['filter' => 'role:pemilik, admin2']);
    $routes->post('pembelian/detail_pembelian', 'Transaksi::detail_pembelian', ['filter' => 'role:pemilik, admin2']);
    $routes->get('pembelian/save', 'Transaksi::save_pembelian', ['filter' => 'role:pemilik, admin2']);

    /** service */
    $routes->get('service', 'Transaksi::service', ['filter' => 'role:pemilik, admin2,customer']);
    $routes->get('service/form', 'Transaksi::form_service', ['filter' => 'role:pemilik, admin2,customer']);
    $routes->post('service/detail_service', 'Transaksi::detail_service', ['filter' => 'role:pemilik, admin2,customer']);
    $routes->get('service/save', 'Transaksi::save_service', ['filter' => 'role:pemilik, admin2,customer']);

    /** service */
    // $routes->get('service', 'Transaksi::service', ['filter' => 'role:pemilik, admin2']);
    // $routes->get('service/form', 'Transaksi::form_service', ['filter' => 'role:pemilik, admin2']);
    // $routes->post('service/detail_service', 'Transaksi::detail_service', ['filter' => 'role:pemilik, admin2']);
    // $routes->get('service/save', 'Transaksi::save_service', ['filter' => 'role:pemilik, admin2']);

    /** pengeluaran aset */
    $routes->get('pengeluaranAset', 'Transaksi::pengeluaranAset', ['filter' => 'role:pemilik, admin2']);
    $routes->get('pengeluaranAset/form', 'Transaksi::form_pengeluaranAset', ['filter' => 'role:pemilik, admin2']);
    $routes->post('pengeluaranAset/detail_pengeluaranAset', 'Transaksi::detail_pengeluaranAset', ['filter' => 'role:pemilik, admin2']);
    $routes->get('pengeluaranAset/save', 'Transaksi::save_pengeluaranAset', ['filter' => 'role:pemilik, admin2']);
});

/** penggajian */
$routes->group('/user/dashboard', static function ($routes) {
    $routes->get('penggajian', 'Penggajian::index', ['filter' => 'role:pemilik, admin2']);
});

// Product
$routes->get('/user/dashboard/product', 'Product::index', ['filter' => 'role:pemilik,admin2']);
$routes->get('/user/dashboard/product/offline-shipping', 'Product::index', ['filter' => 'role:pemilik,admin2']);
$routes->get('/user/dashboard/product/pembayaran', 'Product::pembayaran', ['filter' => 'role:pemilik,admin2']);
$routes->get('/user/dashboard/product/history', 'Product::history', ['filter' => 'role:pemilik,admin2']);
$routes->get('/user/dashboard/product/pembelian', 'Product::pembelian', ['filter' => 'role:pemilik,admin2']);

// Service
$routes->get('/user/dashboard/service', 'Service::index', ['filter' => 'role:pemilik,admin2']);
$routes->get('/user/dashboard/service/pembayaran', 'Service::pembayaran', ['filter' => 'role:pemilik,admin2']);
$routes->get('/user/dashboard/service/history', 'Service::history', ['filter' => 'role:pemilik,admin2']);
$routes->get('/user/dashboard/service/pemesanan', 'Service::pemesanan', ['filter' => 'role:pemilik,admin2']);

// Absensi Karyawan
$routes->get('/user/dashboard/absensi', 'Absensi::index');
$routes->get('/user/dashboard/absensi/karyawan', 'Absensi::karyawan');
$routes->get('/user/dashboard/absensi/history', 'Absensi::history');
$routes->get('/user/dashboard/absensi/tambahKaryawan', 'Absensi::tambahKaryawan');
$routes->get('/user/dashboard/absensi/editKaryawan/(:any)', 'Absensi::editKaryawan/$1');

// Laporan Keuangan
$routes->get('/user/dashboard/laporan', 'Laporan::index', ['filter' => 'role:pemilik']);
$routes->get('/user/dashboard/laporan/jurnal-umum', 'Laporan::jurnalUmum', ['filter' => 'role:pemilik']);
$routes->get('/user/dashboard/laporan/buku-besar', 'Laporan::bukuBesar', ['filter' => 'role:pemilik']);
$routes->get('/user/dashboard/laporan/laba-rugi', 'Laporan::labaRugi', ['filter' => 'role:pemilik']);
$routes->get('/user/dashboard/laporan/neraca', 'Laporan::neraca', ['filter' => 'role:pemilik']);
$routes->get('/user/dashboard/laporan/arus-kas', 'Laporan::arus_kas', ['filter' => 'role:pemilik']);
$routes->get('/user/dashboard/laporan/stok', 'Laporan::laporan_stok', ['filter' => 'role:pemilik']);
$routes->get('/user/dashboard/laporan/perubahan-modal', 'Laporan::laporan_perubahan_modal', ['filter' => 'role:pemilik']);

$routes->get('lap_perubahan_model', 'Laporan::get_laporan_perubahan_modal');
$routes->get('lap_neraca', 'Laporan::get_neraca');

// Pencatatan Kas
// Pemasukan
// Produk
$routes->get('/user/dashboard/pencatatan-kas/pemasukan/produk', 'Pencatatan::index', ['filter' => 'role:pemilik,admin']);
// Service
$routes->get('/user/dashboard/pencatatan-kas/pemasukan/service', 'Pencatatan::service', ['filter' => 'role:pemilik,admin']);
// Pengeluaran
// Beban
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/beban', 'Pencatatan::beban', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/beban/data-beban', 'Pencatatan::dataBeban', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/beban/pembayaran', 'Pencatatan::pembayaranBeban', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/beban/history', 'Pencatatan::historyBeban', ['filter' => 'role:pemilik,admin']);
// Aset
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/aset', 'Pencatatan::aset', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/aset/data-aset', 'Pencatatan::dataAset', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/aset/pembayaran', 'Pencatatan::pembayaranAset', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/aset/history', 'Pencatatan::historyAset', ['filter' => 'role:pemilik,admin']);
// Transaksi Lainnya
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/lainnya', 'Pencatatan::lainnya', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/lainnya/data-transaksi', 'Pencatatan::dataLainnya', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/lainnya/pembayaran', 'Pencatatan::pembayaranLainnya', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/lainnya/history', 'Pencatatan::historyLainnya', ['filter' => 'role:pemilik,admin']);
// Bahan
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/bahan', 'Pencatatan::bahan', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/bahan/data-bahan', 'Pencatatan::dataBahan', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/bahan/pembayaran', 'Pencatatan::pembayaranBahan', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/bahan/history', 'Pencatatan::historyBahan', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/bahan/stock', 'Pencatatan::stockBahan');
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/bahan/ambil-stock', 'Pencatatan::ambilStockBahan', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/bahan/dataAmbilStock', 'Pencatatan::dataAmbilStock', ['filter' => 'role:pemilik,admin']);
// Gaji
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/gaji', 'Pencatatan::gaji', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/gaji/pembayaran', 'Pencatatan::pembayaranGaji', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/pengeluaran/gaji/history', 'Pencatatan::historyGaji', ['filter' => 'role:pemilik,admin']);
// Akun
$routes->get('/user/dashboard/pencatatan-kas/akun', 'Pencatatan::akun', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/akun/data-akun', 'Pencatatan::dataAkun', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/akun/a110', 'Pencatatan::akunAset', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/akun/b110', 'Pencatatan::akunBahan', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/akun/b210', 'Pencatatan::akunBeban', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/akun/g110', 'Pencatatan::akunGaji', ['filter' => 'role:pemilik,admin']);
$routes->get('/user/dashboard/pencatatan-kas/akun/t110', 'Pencatatan::akunTransaksiLainnya', ['filter' => 'role:pemilik,admin']);


$routes->get('/login_view', 'Login::index');
// $routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
