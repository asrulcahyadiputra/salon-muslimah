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
                <h4>DASHBOARD</h4>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class=" breadcrumb mt-3 d-flex justify-content-end" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item"><a href="#">Laporan Keuangan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perubahan Modal</li>
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
                        <form action="<?= base_url('user/dashboard/laporan/perubahan-modal') ?>" method="get">
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
                                        <?php for ($i = 2021; $i <= date('Y'); $i++) { ?>
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
                        <h3>Laporan Perubahan Modal</h3>
                        <h4><?= $perubahan['periode'] ?></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr style="font-weight:bold;">
                                    <td>Modal</td>
                                    <td></td>
                                    <td><?= number_format($perubahan['perubahan']['modal'], 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Laba Bersih</td>
                                    <td><?= number_format($perubahan['perubahan']['laba_bersih'], 2, ',', '.') ?></td>
                                    <td></td>
                                </tr>
                                <tr style="border-top:1px ;">
                                    <td>Prive</td>
                                    <td>(<?= number_format($perubahan['perubahan']['prive'], 2, ',', '.') ?>)</td>
                                    <td></td>
                                </tr>
                                <tr style="font-weight:bold;">
                                    <td>Penambahan Modal</td>
                                    <td></td>
                                    <td><?= number_format($perubahan['perubahan']['perubahan'], 2, ',', '.') ?></td>
                                </tr>
                                <tr style="font-weight:bold;">
                                    <td>Modal Akhir</td>
                                    <td></td>
                                    <td><?= number_format($perubahan['perubahan']['perubahan_modal'], 2, ',', '.') ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    $(document).ready(function() {
        load_report();
    });

    const load_report = () => {
        console.log('OK');
    }
</script>