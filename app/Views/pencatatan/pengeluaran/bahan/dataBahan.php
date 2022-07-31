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
$totalField += 1;
$idPeralatan = 'B110' . $totalField;
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
                        <li class="breadcrumb-item active" aria-current="page">Bahan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Transaksi Pembelian Bahan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="dataBahan" action="/Pencatatan/saveBahan" method="post">
                    <div class="form-row align-items-center d-flex justify-content-end">
                        <div class="row">
                            <label for="namaAdmin" class="col-sm-5 col-form-label font-weight-bold">Nama Admin</label>
                            <div class="col-sm-6 mb-2">
                                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" readonly value="<?= user()->fullname; ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1">
                    <input type="hidden" id="akunBahan" name="keterangan" value="Bahan">
                    <input type="hidden" name="tanggalInputBahan" value="<?= date('Y-m-d'); ?>">
                    <input type="hidden" id="idPeralatan" name="idPeralatan" value="<?= $idPeralatan; ?>">
                    <div class="form-group row">
                        <label for="namaSupplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="namaSupplier" name="namaSupplier">
                        </div>
                    </div>
                    <table class="table table-md" id="calculationBahan">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="insert-form1">
                            <tr class="line_items">
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="namaBarang" name="namaBarang[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="number" class="form-control text-right" id="kuantitasBarang" name="kuantitasBarang[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-right" id="priceBarang" name="priceBarang[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" class="form-control text-right" name="totalBahan[]" value="" jAutoCalc="{#priceBarang}*{#kuantitasBarang}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><button class="btn btn-primary row-add-bahan" type="button" name="tambahData" id="tambahData">Add <i class="fas fa-plus"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="button" name="tambahData" id="tambahData">Tambah Data</button> -->
                    <div class="row d-flex justify-content-end mt-3">
                        <div class="col-2"><button class="btn btn-success" type="submit" name="simpan-pesanan" onclick="return confirm('Apakah anda yakin?')">Simpan Data Bahan</button></div>
                        <div class="col-10"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>