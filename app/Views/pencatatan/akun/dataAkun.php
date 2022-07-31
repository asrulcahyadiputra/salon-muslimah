<?php
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
]
?>

<?php
date_default_timezone_set('Asia/Jakarta');

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 7px 0px 7px rgba(0,0,0,0.75);">
            <div class="col-md-6">
                <h1>DASHBOARD</h1>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class=" breadcrumb mt-3 d-flex justify-content-end" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Pencatatan kas</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Transaksi Pembelian Aset</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="dataAset" action="/Pencatatan/saveAset" method="post">
                    <div class="form-row align-items-center d-flex justify-content-end">
                        <div class="row">
                            <label for="namaAdmin" class="col-sm-5 col-form-label font-weight-bold">Nama Admin</label>
                            <div class="col-sm-6 mb-2">
                                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" readonly value="<?= user()->fullname; ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1">
                    <input type="hidden" id="akunAset" name="keterangan" value="Aset">
                    <input type="hidden" name="tanggalInputAset" value="<?= date('Y-m-d'); ?>">
                    <table class="table table-md" id="calculationAset">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Kode Akun</th>
                                <th scope="col">Jenis Akun</th>
                                <th scope="col">Nama Akun</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="insert-form1">
                            <tr class="line_items">
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="namaAset" name="namaAset[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto my-1">
                                            <label class="mr-sm-2 sr-only" for="jenisAset">Preference</label>
                                            <select class="custom-select mr-sm-2" id="jenisAset1" name="jenisAset[]">
                                                <option id="AsetLancar" value="Beban">Beban</option>
                                                <option id="AsetTetap" value="Transaksi Lainnya">Transaksi Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="namaAset" name="namaAset[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="number" class="form-control text-right" id="kuantitasAset" min="1" name="kuantitasAset[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-right" id="priceAset" name="priceAset[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" class="form-control text-right" name="totalAset[]" value="" jAutoCalc="{#priceAset} * {#kuantitasAset}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><button class="btn btn-primary row-add-aset" type="button" name="tambahData" id="tambahData">Add <i class="fas fa-plus"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="button" name="tambahData" id="tambahData">Tambah Data</button> -->
                    <div class="row d-flex justify-content-end mt-3">
                        <div class="col-2"><button class="btn btn-success" type="submit" name="simpan-pesanan">Simpan Data Aset</button></div>
                        <div class="col-10"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>