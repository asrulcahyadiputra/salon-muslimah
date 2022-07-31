<?php
date_default_timezone_set('Asia/Jakarta');
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
                        <li class="breadcrumb-item active" aria-current="page">Gaji</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h4>Data Pengeluaran Gaji</h4>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji" style="text-decoration: none;">Gaji</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/pembayaran" style="text-decoration: none;">Pembayaran</a></th>
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/history" style="text-decoration: none;">History</a></th>
                        </tr>
                    </thead> -->
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji" style="text-decoration: none;">Gaji</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/pembayaran" style="text-decoration: none;">Pembayaran</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/history" style="text-decoration: none;">History</a>
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>ID Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Role</th>
                            <th>Service Dikerjakan</th>
                            <th>Hadir</th>
                            <th>Absen</th>
                            <th>Izin</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Total Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataGajiKaryawan->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td>
                                    <?php foreach ($dataKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row2->namaKaryawan == $row->namaKaryawan) : ?>
                                            <?= $row2->idKaryawan; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $row->namaKaryawan; ?></td>
                                <td>Karyawan</td>
                                <td>
                                    <?php foreach ($dataKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row2->namaKaryawan == $row->namaKaryawan) : ?>
                                            <?= $row2->serviceDikerjakan; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($dataKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row2->namaKaryawan == $row->namaKaryawan) : ?>
                                            <?php if ($row2->hadir == null && $row2->absen == null && $row2->izin == null) : ?>
                                                <?= '-'; ?>
                                            <?php elseif ($row2->hadir == null) : ?>
                                                <?= 0; ?>
                                            <?php else : ?>
                                                <?= $row2->hadir; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($dataKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row2->namaKaryawan == $row->namaKaryawan) : ?>
                                            <?php if ($row2->hadir == null && $row2->absen == null && $row2->izin == null) : ?>
                                                <?= '-'; ?>
                                            <?php elseif ($row2->absen == null) : ?>
                                                <?= 0; ?>
                                            <?php else : ?>
                                                <?= $row2->absen; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($dataKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row2->namaKaryawan == $row->namaKaryawan) : ?>
                                            <?php if ($row2->hadir == null && $row2->absen == null && $row2->izin == null) : ?>
                                                <?= '-'; ?>
                                            <?php elseif ($row2->izin == null) : ?>
                                                <?= 0; ?>
                                            <?php else : ?>
                                                <?= $row2->izin; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $row->tanggalPembayaran; ?></td>
                                <td>
                                    <span class="badge badge-success">
                                        Sudah Bayar
                                    </span>
                                </td>
                                <td>
                                    <form action="/pencatatan/deleteGaji/<?= $row->id; ?>" method="post">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td><?= $row->totalPembayaran; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <thead>
                            <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th>
                                    <?php foreach ($dataTotalGajiKaryawan->getResult() as $row) : ?>
                                        <?= $row->totalPembayaran;  ?>
                                    <?php endforeach; ?>
                                </th>
                            </tr>
                        </thead>
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