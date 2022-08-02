<?php
date_default_timezone_set('Asia/Jakarta');
$judulCard = [
    'Jumlah Karyawan',
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
                        <li class="breadcrumb-item active" aria-current="page">Absensi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="row">
        <?php for ($i = 0; $i < 1; $i++) : ?>
            <div class="col-md-3 section text-center">
                <!-- <div class="card" style="border-radius: 20px; box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.75);"> -->
                <div class="card info_card" style="
                background: rgba(255, 255, 255, 0);
                border-radius: 16px;
                backdrop-filter: blur(1.2px);
                -webkit-backdrop-filter: blur(1.2px);
                border: 1px solid rgba(255, 255, 255, 0.29);
                box-shadow: 1px 4px 5px 3px rgba(0,0,0,0.75);
                ">
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: 20px;">
                            <p style="font-weight: bold;"><?= $judulCard[$i]; ?></p>
                        </h3>
                        <h3 class="card-subtitle mb-2 text-muted mt-2 font-size: 14px;">
                            <?php if ($judulCard[$i] == 'Jumlah Karyawan') : ?>
                                <p><?= $totalField; ?></p>
                            <?php else : ?>
                                <p>20</p>
                            <?php endif; ?>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <?php if (session()->getFlashdata('sukses')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> <?= session()->getFlashdata('sukses') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('warning')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> <?= session()->getFlashdata('warning') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h4>Daftar Absensi</h4>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/absensi/karyawan" style="text-decoration: none;">Daftar Karyawan</a></th>
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="/user/dashboard/absensi" style="text-decoration: none;">Absensi</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/absensi/history" style="text-decoration: none;">History Absensi</a></th>
                        </tr>
                    </thead> -->
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/absensi/karyawan" style="text-decoration: none;">Daftar Karyawan</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/absensi" style="text-decoration: none;">Absensi</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/absensi/history" style="text-decoration: none;">History Absensi</a>
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>ID Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataKaryawanAbsen->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td><?= $row->idKaryawan; ?></td>
                                <td><?= $row->namaKaryawan; ?></td>
                                <td><?= $row->role; ?></td>
                                <td>
                                    <div class="row justify-content-center mt-2 mb-2">
                                        <div class="col-2">
                                            <form action="/Absensi/saveAbsen">
                                                <input type="hidden" name="hadir" value="1">
                                                <input type="hidden" name="keterangan" value="Hadir">
                                                <input type="hidden" name="waktuAbsen" value="
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                echo date('H:i:s');
                                                ?>
                                                ">
                                                <input type="hidden" name="tanggalAbsen" value="
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                echo date('Y:m:d');
                                                ?>
                                                ">
                                                <input type="hidden" name="idKaryawan" value="<?= $row->idKaryawan; ?>">
                                                <?php if (count($dataAbsen->getResult()) == 0) : ?>
                                                    <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-success" style="padding-left: 1rem; padding-right: 1rem;">Hadir</button>
                                                <?php endif; ?>
                                                <?php foreach ($dataAbsen->getResult() as $row2) : ?>
                                                    <?php if ($row2->idKaryawan == $row->idKaryawan) : ?>
                                                        <?php if (date('Y-m-d') == $row2->tanggalAbsen) : ?>
                                                            <h1 style="display: none;"></h1>
                                                        <?php else : ?>
                                                            <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-success" style="padding-left: 1rem; padding-right: 1rem;">Hadir</button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </form>
                                        </div>
                                        <div class="col-2">
                                            <form action="/Absensi/saveAbsen">
                                                <input type="hidden" name="absen" value="1">
                                                <input type="hidden" name="keterangan" value="Absen">
                                                <input type="hidden" name="waktuAbsen" value="
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                echo date('H:i:s');
                                                ?>
                                                ">
                                                <input type="hidden" name="tanggalAbsen" value="
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                echo date('Y:m:d');
                                                ?>
                                                ">
                                                <input type="hidden" name="idKaryawan" value="<?= $row->idKaryawan; ?>">
                                                <?php if (count($dataAbsen->getResult()) == 0) : ?>
                                                    <button class="btn btn-success" style="padding-left: 1rem; padding-right: 1rem;" onclick="return confirm('Apakah anda yakin?')">Hadir</button>
                                                <?php endif; ?>
                                                <?php foreach ($dataAbsen->getResult() as $row2) : ?>
                                                    <?php if ($row2->idKaryawan == $row->idKaryawan) : ?>
                                                        <?php if (date('Y-m-d') == $row2->tanggalAbsen) : ?>
                                                            <span class="btn btn-info" href="#"><i class="fas fa-check"></i></span>
                                                        <?php else : ?>
                                                            <button class="btn btn-danger" style="padding-left: 1rem; padding-right: 1rem;" onclick="return confirm('Apakah anda yakin?')">Absen</button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <!-- <h1></h1> -->
                                            </form>
                                        </div>
                                        <div class="col-2">
                                            <form action="/Absensi/saveAbsen">
                                                <input type="hidden" name="izin" value="1">
                                                <input type="hidden" name="keterangan" value="Izin">
                                                <input type="hidden" name="waktuAbsen" value="
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                echo date('H:i:s');
                                                ?>
                                                ">
                                                <input type="hidden" name="tanggalAbsen" value="
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                echo date('Y:m:d');
                                                ?>
                                                ">
                                                <input type="hidden" name="idKaryawan" value="<?= $row->idKaryawan; ?>">
                                                <?php if (count($dataAbsen->getResult()) == 0) : ?>
                                                    <button class="btn btn-success" style="padding-left: 1rem; padding-right: 1rem;" onclick="return confirm('Apakah anda yakin?')">Hadir</button>
                                                <?php endif; ?>
                                                <?php foreach ($dataAbsen->getResult() as $row2) : ?>
                                                    <?php if ($row2->idKaryawan == $row->idKaryawan) : ?>
                                                        <?php if (date('Y-m-d') == $row2->tanggalAbsen) : ?>
                                                            <h1 style="display: none;"></h1>
                                                        <?php else : ?>
                                                            <button class="btn btn-warning" style="padding-left: 1rem; padding-right: 1rem;" onclick="return confirm('Apakah anda yakin?')">Izin</button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <!-- <h1></h1> -->
                                            </form>
                                        </div>
                                    </div>
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
<script src="<?= base_url('/js/vanilla-tilt.js'); ?>"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelectorAll(".info_card"), {
        max: 25,
        speed: 4300,
        glare: true,
        "max-glare": 1,
    });
</script>