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
$totalLabaKotor = 0;
$totalSeluruhProduct = 0;
$totalSeluruhService = 0;
$totalSeluruhBahan = 0;
$totalSeluruhBeban = 0;
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
                    <div class="card-header" style="background-color: #eaeaea;">
                        Filter Laporan Neraca
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('user/dashboard/laporan/neraca') ?>" method="GET">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                                <div class="col-sm-2">
                                    <select class="custom-select mr-sm-2" id="jenisBeban1" name="bulan">
                                        <option class="text-center" value="" disabled selected>Pilih Bulan</option>
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
                                        <option class="text-center" value="" disabled selected>Pilih Tahun</option>
                                        <?php for ($i = 2021; $i <= date('Y'); $i++) { ?>
                                            <option class="text-center" value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Salon Muslimah DPM</h4>
                <h4 class="text-center">Neraca</h4>
                <h4 class="text-center"><?= $neraca['periode'] ?></h4>
            </div>



        </div>


        <div class="row mt-4">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2">Aktiva</th>
                    </tr>

                    <?php foreach ($neraca['aktiva']['akun'] as $row) : ?>
                        <tr>
                            <td><?= $row['namaAkun'] ?></td>
                            <td class="text-right">
                                <?= $row['posisi_d_c'] == 'k' ? '(' . number_format($row['saldo'], 2, ',', '.') . ')' : number_format($row['saldo'], 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2">Pasiva</th>
                    </tr>

                    <?php foreach ($neraca['pasiva']['akun'] as $row) : ?>
                        <tr>
                            <td><?= $row['namaAkun'] ?></td>
                            <td class="text-right">
                                <?= $row['posisi_d_c'] == 'd' ? '(' . number_format($row['saldo'], 2, ',', '.') . ')' : number_format($row['saldo'], 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <td>Modal</td>
                        <td class="text-right"><?= number_format($neraca['modal'], 2, ',', '.') ?></td>
                    </tr>

                </table>


            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <td>Total Aktiva</td>
                        <td class="text-right"><?= number_format($neraca['total_aktiva'], 2, ',', '.') ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <td>Total Pasiva + Modal</td>
                        <td class="text-right"><?= number_format($neraca['total_pasiva'], 2, ',', '.') ?></td>
                    </tr>
                </table>
            </div>
        </div>

    </section>
</div>