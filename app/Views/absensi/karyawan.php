<?php
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
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-4">
                <h4>Daftar Absensi [<?= $periode_name ?>]</h4>
            </div>
            <div class="col-md-4">
                <form action="/absensi/karyawan" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="font-weight: bold;" id="basic-addon1">Periode</span>
                        </div>
                        <input type="month" class="form-control col-6" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="datePencarian">
                        <div class="input-group-append" style="margin-left: 3px;">
                            <button class="btn btn-secondary" type="submit" id="button-addon2" name="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-info" href="/user/dashboard/absensi/tambahKaryawan"><i class="fas fa-plus"></i> Tambah Karyawan</a>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">

                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/absensi/karyawan" style="text-decoration: none;">Daftar Karyawan</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/absensi" style="text-decoration: none;">Absensi</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/absensi/history" style="text-decoration: none;">History Absensi</a>
                    <thead>
                        <tr style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>ID Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Tanggal Bergabung</th>
                            <th class="text-center">Hadir</th>
                            <th class="text-center">Absen</th>
                            <th class="text-center">Izin</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataKaryawan as $row) : ?>
                            <tr>
                                <td><?= $row->kode_karyawan; ?></td>
                                <td><?= $row->nama_karyawan; ?></td>
                                <td><?= $row->no_telp; ?></td>
                                <td><?= $row->alamat; ?></td>
                                <td><?= $row->nama_jabatan; ?></td>
                                <td><?= $row->tgl_gabung; ?></td>
                                <td class="text-center"><?= $row->total_hadir ?></td>
                                <td class="text-center"><?= $row->total_absen ?></td>
                                <td class="text-center"><?= $row->total_izin ?></td>

                                <td class="text-center">
                                    <a href="<?= base_url("/user/dashboard/absensi/editKaryawan/" . $row->kode_karyawan) ?>">Edit</a>
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