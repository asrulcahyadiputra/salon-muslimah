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
                <h2>DASHBOARD</h2>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class=" breadcrumb mt-3 d-flex justify-content-end" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Pencatatan kas</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lainnya</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h4>Data Transaksi Lainnya</h4>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/lainnya" style="text-decoration: none;">Transaksi</a></th>
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="#" style="text-decoration: none;">Pembayaran</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/lainnya/history" style="text-decoration: none;">History</a></th>
                        </tr>
                    </thead> -->
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/lainnya" style="text-decoration: none;">Transaksi</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/lainnya/pembayaran" style="text-decoration: none;">Pembayaran</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/lainnya/history" style="text-decoration: none;">History</a>
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>ID Transaksi</th>
                            <th>Nama Transaksi</th>
                            <th>Jenis Transaksi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataTransaksiLainnya->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td>
                                    <?= $row->akun; ?>
                                </td>
                                <td>
                                    <?php foreach ($all_data->getResult() as $row2) : ?>
                                        <?php if ($row2->akun == $row->akun) : ?>
                                            <p><?= $row2->keteranganTransaksi; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($all_data->getResult() as $row2) : ?>
                                        <?php if ($row2->akun == $row->akun) : ?>
                                            <p><?= $row2->jenisTransaksi; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?= $row->tanggalInputTransaksi; ?>
                                </td>
                                <td>
                                    <form action="/Pencatatan/updateStatusPembayaranTransaksiLainnya/<?= $row->id; ?>" method="post">
                                        <input type="hidden" name="keterangan" value="Transaksi Lainnya">
                                        <input type="hidden" name="statusPembayaran" value="Sudah Membayar">
                                        <input type="hidden" id="akun" name="akun" value="<?= $row->akun; ?>">
                                        <input type="hidden" name="tanggalPembayaran" value="<?= date('Y-m-d'); ?>">
                                        <input type="hidden" id="totalTransaksi" name="totalTransaksi" value="
                                        <?php foreach ($totalPembelianTransaksiLainnya->getResult() as $row2) : ?>
                                            <?php if ($row2->akun == $row->akun) : ?>
                                                <?= $row2->totalTransaksi ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        ">
                                        <?php foreach ($statusPembayaranTransaksiLainnya->getResult() as $row2) : ?>
                                            <?php if ($row2->akun == $row->akun) : ?>
                                                <?php if ($row2->statusPembayaran == null) : ?>
                                                    <button type="submit" class="btn btn-outline-warning" id="<?= $row->akun; ?>" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-money-check-alt"></i></button>
                                                <?php else : ?>
                                                    <span class="badge badge-success">Sudah Bayar</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </form>
                                </td>
                                <td>
                                    <?php foreach ($totalPembelianTransaksiLainnya->getResult() as $row2) : ?>
                                        <?php if ($row2->akun == $row->akun) : ?>
                                            <p><?= $row2->totalTransaksi ?></p>
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