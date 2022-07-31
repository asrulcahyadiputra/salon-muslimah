<?php

// foreach ($totalPembelianAset->getResult() as $row2) {
//     if ($row2->akun == $row->akun) {
//         $totalAset = $row2->totalAset;
//     }
// }
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
];

$kodeAkun = [
    '111',
    '112',
    '113',
    '511',
    '512'
];

$namaAkun = [
    'Kas',
    'Perlengkapan',
    'Peralatan',
    'Beban Gaji',
    'Beban Listrik'
];

// $namaTotalAkun = [
//     'totalAset',
//     'totalBahan',
//     'totalBeban',
//     'totalGaji',
//     'totalTransaksi',
// ];

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
                        <li class="breadcrumb-item active" aria-current="page">Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php elseif (session()->getFlashdata('pesan2')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan2'); ?>
        </div>
    <?php endif; ?>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md">
                <h4 class="text-center" style="text-transform: uppercase;">Data Akun COA</h4>
            </div>
            <!-- <div class="col-md-2">
            </div> -->
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="#" style="text-decoration: none;">Akun COA</a></th>
                        </tr>
                    </thead> -->
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>No</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Header</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($totalAset->getResult() as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row->kodeAkun; ?></td>
                                <td><?= $row->namaAkun; ?></td>
                                <td><?= $row->header; ?></td>
                            </tr>
                            <?php $i++; ?>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Pencatatan/saveAkun" method="post">
                    <div class="form-group">
                        <label for="kodeAkun">Kode Akun <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="kodeAkun" name="kodeAkun" required placeholder="masukkan kode akun..">
                    </div>
                    <div class="form-group">
                        <label for="namAkun">Nama Akun <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="namAkun" name="namaAkun" required placeholder="masukkan nama akun..">
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <select class="mr-sm-2 form-control" id="header" name="header" required>
                            <option selected>--Header Akun--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <button class="btn btn-success col"><i class="fas fa-paper-plane"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>