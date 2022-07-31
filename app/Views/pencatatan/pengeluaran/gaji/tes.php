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
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji" style="text-decoration: none;">Gaji</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/pembayaran" style="text-decoration: none;">Pembayaran</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/history" style="text-decoration: none;">History</a></th>
                        </tr>
                    </thead> -->
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji" style="text-decoration: none;">Gaji</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/pembayaran" style="text-decoration: none;">Pembayaran</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/gaji/history" style="text-decoration: none;">History</a>
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>ID Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Role</th>
                            <th>Service Dikerjakan</th>
                            <th>Bayaran per Produk</th>
                            <th>Action</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataGajiKaryawan->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td><?= $row->idKaryawan; ?></td>
                                <td><?= $row->namaKaryawan; ?></td>
                                <td>Karyawan</td>
                                <td>
                                    <?php if ($row->serviceDikerjakan == null) : ?>
                                        <?= 0; ?>
                                    <?php else : ?>
                                        <?= $row->serviceDikerjakan; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row->bayaranPerProduk == null) : ?>
                                        <?= 0; ?>
                                    <?php else : ?>
                                        <?= $row->bayaranPerProduk; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal<?= $row->id; ?>"><i class="fas fa-edit"></i></button>
                                </td>
                                <td>
                                    <?= $row->serviceDikerjakan * $row->bayaranPerProduk; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <thead>
                            <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                                <th></th>
                                <th>
                                </th>
                                <th>

                                </th>
                                <th></th>
                                <th></th>
                                <th>
                                    <p>Total</p>
                                </th>
                                <th>
                                    <?php foreach ($dataKaryawan->getResult() as $row) : ?>
                                        <?php $totalGaji += $row->serviceDikerjakan * $row->bayaranPerProduk;  ?>
                                    <?php endforeach; ?>
                                    <p><?= $totalGaji; ?></p>
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
<?php foreach ($dataGajiKaryawan->getResult() as $row) : ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?= $row->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengeluaran Gaji</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/Pencatatan/updatePengeluaranGaji/<?= $row->id; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="serviceDikerjakan" class="col-sm-4 col-form-label">Service Dikerjakan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="serviceDikerjakan" id="serviceDikerjakan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bayaranPerProduk" class="col-sm-4 col-form-label">Bayaran Per Produk</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="bayaranPerProduk" id="bayaranPerProduk">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>