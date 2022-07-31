<?php
$namaBulan = [
    'Januari', 'Februari', 'Maret', 'April',
    'Mei', 'Juni', 'Juli', 'Agustus',
    'September', 'Oktober', 'November', 'Desember'
];
$periodeTahun = [
    2021, 2022, 2023, 2024, 2025
];
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 7px 0px 7px rgba(0,0,0,0.75);">
            <div class="col-md-6">
                <h2>DASHBOARD</h2>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class=" breadcrumb mt-3 d-flex justify-content-end" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Pencatatan kas</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Beban</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
                    <div class="card-body">
                        <form action="<?= base_url('Laporan/laporan_stok') ?>" method="get">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                                <div class="col-sm-2">
                                    <select class="custom-select mr-sm-2" id="jenisBeban1" name="bulan" required>
                                        <option class="text-center" value="">Pilih Bulan</option>
                                        <option class="text-center" value="01">Januari</option>
                                        <option class="text-center" value="02">Februari</option>
                                        <option class="text-center" value="03">Maret</option>
                                        <option class="text-center" value="04">April</option>
                                        <option class="text-center" value="05">Mei</option>
                                        <option class="text-center" value="06">Juni</option>
                                        <option class="text-center" value="07">Juli</option>
                                        <option class="text-center" value="08">Agustus</option>
                                        <option class="text-center" value="09">September</option>
                                        <option class="text-center" value="10">Oktober</option>
                                        <option class="text-center" value="11">November</option>
                                        <option class="text-center" value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="custom-select mr-sm-2" id="jenisBeban1" name="tahun" required>
                                        <option class="text-center" value="">Pilih Tahun</option>
                                        <?php for ($i = 2021; $i <= 2025; $i++) { ?>
                                            <option class="text-center" value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="judul text-center" style="margin: 2rem;">
                        <h3>History Stok</h3>
                        <h4><?= $periode_name ?></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Stok Awal</th>
                                    <th class="text-center">Stok Masuk</th>
                                    <th class="text-center">Stok Keluar</th>
                                    <th class="text-center">Sisa Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($stok as $item) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->kode_produk ?></td>
                                        <td><?= $item->nama_produk ?></td>
                                        <td class="text-center"><?= $item->begining_stock ?></td>
                                        <td class="text-center"><?= $item->stock_in ?></td>
                                        <td class="text-center"><?= $item->stock_out ?></td>
                                        <td class="text-center"><?= $item->stock ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>