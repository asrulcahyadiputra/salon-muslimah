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
                    <div class="card-body">
                        <form action="<?= base_url('Laporan/jurnalUmum') ?>" method="get">
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
                                        <?php for ($i = 2021; $i <= 2025; $i++) { ?>
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
                        <h3>Jurnal Umum</h3>
                        <h4><?= $periode_name ?></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Tgl. Jurnal</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">No. COA</th>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_debit = 0;
                                $total_kredit = 0;
                                foreach ($jurnal as $row) { ?>
                                    <?php
                                    if ($row->posisi_d_c == 'd') {
                                        $total_debit += $row->nominal;
                                    } else {
                                        $total_kredit += $row->nominal;
                                    }
                                    ?>
                                    <tr>
                                        <?php if ($row->posisi_d_c == 'd') { ?>
                                            <td><?= $row->tgl_jurnal ?></td>
                                            <td class="text-left"><?= $row->namaAkun ?></td>
                                            <td><?= $row->no_coa ?></td>
                                            <td class="text-right">Rp <?= number_format($row->nominal, 2, ',', '.') ?></td>
                                            <td></td>
                                        <?php } else { ?>
                                            <td></td>
                                            <td class="text-center"><?= $row->namaAkun ?></td>
                                            <td><?= $row->no_coa ?></td>
                                            <td></td>
                                            <td class="text-right">Rp <?= number_format($row->nominal, 2, ',', '.') ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center" colspan="3">Jumlah</th>
                                    <th class="text-right">Rp <?= number_format($total_debit, 2, ',', '.') ?></th>
                                    <th class="text-right">Rp <?= number_format($total_kredit, 2, ',', '.') ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>