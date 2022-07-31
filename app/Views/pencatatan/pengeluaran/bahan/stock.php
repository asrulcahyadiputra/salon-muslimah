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
            <!-- <div class="col-md-2">
                <a class="btn btn-info" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/data-bahan">Tambah Stock</a>
            </div> -->
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
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/stock" style="text-decoration: none;">Stock</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/ambil-stock" style="text-decoration: none;">Pengambilan Stock</a></th>
                        </tr>
                    </thead> -->
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/stock" style="text-decoration: none;">Stock</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/bahan/ambil-stock" style="text-decoration: none;">Pengambilan Stock</a>
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>Nama Barang</th>
                            <th>Total Barang Terbeli</th>
                            <th>Stock Tersedia</th>
                            <th>Total Pengambilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataStockBahan->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td>
                                    <?= $row->namaBarang; ?>
                                </td>
                                <td>
                                    <?php foreach ($dataKuantitasBahan->getResult() as $row2) : ?>
                                        <?php if ($row2->namaBarang == $row->namaBarang) : ?>
                                            <p><?= $row2->kuantitasBarang; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <p>
                                        <?php foreach ($dataPengambilanJumlahStock->getResult() as $row2) : ?>
                                            <?php if ($row2->namaBarang == $row->namaBarang) : ?>
                                                <?php if ($row->kuantitasBarang - $row2->jumlahPengambilanStock <= 0) : ?>
                                                    <?= '-'; ?>
                                                <?php break;
                                                endif; ?>
                                                <?= $row->kuantitasBarang - $row2->jumlahPengambilanStock; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </p>
                                </td>
                                <td>
                                    <?php foreach ($dataPengambilanJumlahStock->getResult() as $row2) : ?>
                                        <?php if ($row2->namaBarang == $row->namaBarang) : ?>
                                            <?php if ($row2->jumlahPengambilanStock == null && $row2->inputTanggalPengambilanStock == null && $row2->namaKaryawan == null) : ?>
                                                <p><?= 0; ?></p>
                                            <?php endif; ?>
                                            <p>
                                                <?= $row2->jumlahPengambilanStock; ?>
                                            </p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
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