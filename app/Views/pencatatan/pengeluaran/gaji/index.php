<?php
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
];
$totalGaji = 0;
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
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pesan2')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan2'); ?>
        </div>
    <?php endif; ?>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h4>Data Pengeluaran Gaji</h4>
            </div>
            <!-- <div class="col-md-2">
                <a class="btn btn-info" href="/user/dashboard/pencatatan-kas/pengeluaran/aset/data-aset">Tambah Data</a>
            </div> -->
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button>
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah Data</a>
                </button> -->
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji" style="text-decoration: none;">Gaji</a></th>
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/pembayaran" style="text-decoration: none;">Pembayaran</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/history" style="text-decoration: none;">History</a></th>
                        </tr>
                    </thead> -->
                    <!-- <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji" style="text-decoration: none;">Gaji</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/pembayaran" style="text-decoration: none;">Pembayaran</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/history" style="text-decoration: none;">History</a> -->
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>ID Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Role</th>
                            <th>Tanggal Bergabung</th>
                            <th>Tanggal Penggajian</th>
                            <th>No. Telepon</th>
                            <th>Upah Gaji</th>
                            <th>Status Gaji Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($upahGaji->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td>
                                    <?php foreach ($dataGajiKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row->namaKaryawan == $row2->namaKaryawan) : ?>
                                            <?= $row2->idKaryawan; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $row->namaKaryawan; ?></td>
                                <td>Karyawan</td>
                                <td>
                                    <?php foreach ($dataGajiKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row->namaKaryawan == $row2->namaKaryawan) : ?>
                                            <?= $row2->tanggalBergabung; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?= $row->tanggalPenggajian; ?>
                                </td>
                                <td>
                                    <?php foreach ($dataGajiKaryawan->getResult() as $row2) : ?>
                                        <?php if ($row->namaKaryawan == $row2->namaKaryawan) : ?>
                                            <?= $row2->noTelepon; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $row->upahGaji; ?></td>
                                <td>
                                    <form action="/Pencatatan/updateUpahGaji/<?= $row->id; ?>" method="post">
                                        <input type="hidden" name="statusPembayaran" value="Sudah Dibayar">
                                        <?php if ($row->statusPembayaran == null) : ?>
                                            <button type="submit" class="btn btn-outline-warning">
                                                <i class="fas fa-money-check-alt"></i>
                                            </button>
                                        <?php else : ?>
                                            <span class="badge badge-success">Sudah dibayar</span>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <thead>
                            <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <p>Total Terbayar</p>
                                </th>
                                <th>
                                    <?php foreach ($upahGaji->getResult() as $row) : ?>
                                        <?php if ($row->statusPembayaran !== null) : ?>
                                            <?php $totalGaji += $row->upahGaji;  ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <p><?= $totalGaji; ?></p>
                                </th>
                                <th></th>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Pencatatan/saveGaji" method="post">
                    <div class="form-group">
                        <label for="namaKaryawan">Nama Karyawan <span style="color: red;">*</span></label>
                        <!-- <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" required placeholder="masukkan nama karyawan.." style="text-transform: capitalize;"> -->
                        <select class="mr-sm-2 form-control" id="namaKaryawan" name="namaKaryawan" autofocus required style="text-transform: capitalize;">
                            <?php foreach ($dataKaryawan->getResult() as $row) : ?>
                                <option id="<?= $row->namaKaryawan; ?>" value="<?= $row->namaKaryawan; ?>">
                                    <?= $row->namaKaryawan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggalPenggajian">Tanggal Penggajian<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="tanggalPenggajian" name="tanggalPenggajian" required placeholder="masukkan tanggal penggajian.." value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="form-group">
                        <label for="upahGaji">Upah Gaji <span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="upahGaji" name="upahGaji" placeholder="masukkan jumlah gaji..">
                    </div>
                    <button class="btn btn-success col"><i class="fas fa-paper-plane"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>