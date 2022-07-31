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
                        <form action="<?= base_url('laporan/bukuBesar')?>" method="post">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                                <div class="col-sm-2">
                                    <select class="custom-select mr-sm-2" name="bulan">
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
                                    <select class="custom-select mr-sm-2" name="tahun" required>
                                        <option class="text-center" value="">Pilih Tahun</option>
                                        <?php for ($i=2020; $i <= 2025 ; $i++) { 
                                            echo '<option class="text-center" value="'.$i.'">'.$i.'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama CoA</label>
                                <div class="col-sm-4">
                                    <select class="custom-select mr-sm-2" name="coa">
                                        <option class="text-center" value="">Pilih CoA</option>
                                        <?php foreach ($coa as $key => $value) {
                                            echo '<option class="text-center" value="'.$value->kodeAkun.'">'.$value->namaAkun.'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section mt-3" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md">
                <h4 class="text-center">Salon Muslimah DPM</h4>
                <h4 class="text-center">Buku Besar</h4>
                <h4 class="text-center">
                    Periode <?= $per ?>
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table class="table table-bordered" style="background-color:white;">
                <thead>
                        <tr>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">Nama Akun</th>
                            <th rowspan="2">Reff</th>
                            <th rowspan="2" class="text-center">Debet</th>
                            <th rowspan="2" class="text-center">Kredit</th>
                            <th rowspan="2" class="text-center">Saldo </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0000-00-00</td>
                            <td>Saldo Awal</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><?= number_format($saldo_awal) ?></td>
                        </tr>
                        <?php foreach ($list as $item) { ?>
                            <tr>
                                <td><?= $item->tgl_jurnal ?></td>
                                <td><?= $item->namaAkun ?></td>
                                <td><?= $item->no_coa ?></td>
                                <?php if ($item->posisi_d_c =='d') { ?>
                                    <?php if ($item->header == 1 OR $item->header == 5 OR $item->header == 6 ) { ?>
                                        <?php $saldo_awal = $saldo_awal + $item->nominal; ?>
                                    <?php } else { ?>
                                        <?php $saldo_awal = $saldo_awal - $item->nominal; ?>
                                    <?php } ?>
                                    <td class="text-right"><?= number_format($item->nominal)?></td>
                                    <td></td>
                                <?php } else { ?>
                                    <?php if ($item->header == 1 OR $item->header == 5 OR $item->header == 6 ) { ?>
                                        <?php $saldo_awal = $saldo_awal - $item->nominal; ?>
                                    <?php } else { ?>
                                        <?php $saldo_awal = $saldo_awal + $item->nominal; ?>
                                <?php } ?>
                                <td></td>
                                <td class="text-right"><?= number_format($item->nominal)?></td>
                                <?php }?>
                                <td class="text-right"><?= number_format($saldo_awal)?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>