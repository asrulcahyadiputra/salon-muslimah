<?php
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
]
?>

<?php
$totalField += 1;
$idKaryawan = 'K00' . $totalField;
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
                        <li class="breadcrumb-item active" aria-current="page">Service</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Edit Data Karyawan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form action="/Absensi/updateKaryawan" method="post">
                    <!-- <input type="hidden" id="jumlah-form-service" value="1"> -->
                    <!-- <input type="hidden" name="tanggalBergabung" value=" date('Y-m-d'); ?>"> -->
                    <input type="hidden" id="idKaryawan" name="idKaryawan" value="<?= $karyawan->idKaryawan; ?>">
                    <input type="hidden" id="totalService" name="totalService[]" value="30000">
                    <!-- <input type="hidden" name="waktuAbsen" value="
                    <? #php date_default_timezone_set('Asia/Jakarta');
                    #echo date('H:i:s');
                    ?>">
                    <input type="hidden" name="tanggalAbsen" value="
                    <? #php date_default_timezone_set('Asia/Jakarta');
                    #echo date('Y:m:d');
                    ?>"> -->
                    <div class="form-group row">
                        <label for="namaKaryawan" class="col-sm-2 col-form-label" style="text-transform: capitalize;">Nama Karyawan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="namaKaryawan" value="<?= $karyawan->namaKaryawan ?>" name="namaKaryawan" style="text-transform: capitalize;">
                        </div>
                        <label for="noTelepon" class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-3">
                            <input type="number" value="<?= $karyawan->noTelepon ?>" class="form-control" id="noTelepon" name="noTelepon">
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="alamat" class="col-sm-2 col-form-label" style="margin-top: -1rem;">Alamat</label>
                        <div class="col-sm-3" style="margin-top: -1rem;">
                            <input type="text" class="form-control" id="alamat" value="<?= $karyawan->alamat ?>" name="alamat">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="role" name="role" value="Karyawan" readonly>
                    <div class="form-group row">
                        <label for="kode_jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-3">
                            <select name="kode_jabatan" id="kode_jabatan" class="form-control" requireds>
                                <?php foreach ($jabatan as $row) : ?>
                                    <option <?= $karyawan->kode_jabatan == $row->id ? 'selected' : '' ?> value="<?= $row->id ?>"><?= $row->deskripsi ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggalBergabung" class="col-sm-2 col-form-label" style="margin-top: -1rem;">Tanggal Bergabung</label>
                        <div class="col-sm-3" style="margin-top: -1rem;">
                            <input type="date" class="form-control" id="tanggalBergabung" name="tanggalBergabung" value="<?= $karyawan->tanggalBergabung ?>">
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" name="edit-data-karyawan">Simpan Data</button>
                </form>
            </div>
        </div>
    </section>
</div>