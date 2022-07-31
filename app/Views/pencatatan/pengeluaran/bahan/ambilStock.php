<?php
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
];
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
                <h2>Data Pengeluaran Bahan</h2>
            </div>
            <div class="col-md-2">
                <a class="btn btn-info" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/dataAmbilStock">Ambil Stock</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <a class="btn btn-secondary" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan">Data Pembelian Bahan</a>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/stock" style="text-decoration: none;">Stock</a></th>
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/ambil-stock" style="text-decoration: none;">Pengambilan Stock</a></th>
                        </tr>
                    </thead> -->
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/stock" style="text-decoration: none;">Stock</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/ambil-stock" style="text-decoration: none;">Pengambilan Stock</a>
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>Nama Barang</th>
                            <th>Stock diambil</th>
                            <th>Tanggal</th>
                            <th>Nama Karyawan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPengambilanStock->getResult() as $row) : ?>
                            <?php if ($row->jumlahPengambilanStock !== null && $row->inputTanggalPengambilanStock !== null && $row->namaKaryawan !== null) : ?>
                                <tr class="text-center">
                                    <td>
                                        <?= $row->namaBarang; ?>
                                    </td>
                                    <td>
                                        <?= $row->jumlahPengambilanStock; ?>
                                    </td>
                                    <td>
                                        <?= $row->inputTanggalPengambilanStock; ?>
                                    </td>
                                    <td>
                                        <?= $row->namaKaryawan; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#tabelmenu').DataTable();
                    });
                </script>
            </div>
        </div>
    </section>
</div>