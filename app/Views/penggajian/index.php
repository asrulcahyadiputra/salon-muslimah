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
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
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
            <div class="col-lg-10">
                <h4>Transaksi Penggajian</h4>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add"> Tambah Data</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg mt-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tablemenu">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">ID Penggajian</th>
                                <th class="text-center">Tgl. Penggajian</th>
                                <th class="text-center">Nama Karyawan</th>
                                <th class="text-center">Total Kehadiran</th>
                                <th class="text-center">Gaji Pokok</th>
                                <th class="text-center">Bonus Service</th>
                                <th class="text-center">Total Service</th>
                                <th class="text-center">Gaji Bersih</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($list as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->id_gaji ?></td>
                                    <td><?= $row->tgl_gaji ?></td>
                                    <td><?= $row->namaKaryawan ?></td>
                                    <td><?= $row->jml_hadir ?></td>
                                    <td class="text-right">Rp <?= number_format($row->gajipokok, 2, ',', '.') ?></td>
                                    <td class="text-right">Rp <?= number_format($row->bonus_service, 2, ',', '.') ?></td>
                                    <td class="text-right">Rp <?= number_format($row->total_service, 2, ',', '.') ?></td>
                                    <td class="text-right">Rp <?= number_format($row->gaji_bersih, 2, ',', '.') ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('Penggajian/detailPenggajian/' . $row->id_gaji) ?>" target="_blank"><i class="fas fa-print fa-lg"></i> Bukti</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->include('penggajian/add') ?>
<script src="<?= base_url('/js/vanilla-tilt.js'); ?>"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelectorAll(".info_card"), {
        max: 25,
        speed: 4300,
        glare: true,
        "max-glare": 1,
    });
</script>
<script>
    function bonus(value) {
        $("#bonus").on("keyup", function() {
            return parseInt(value);
        });
    }

    $(document).ready(function() {
        $("#tablemenu").DataTable();
        var bonus = $("#bonus").val(0);

        $("#btn-simpan").prop("disabled", true);
        $("#pegawai").on("change", function() {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    url: "<?= base_url('Penggajian/detailPegawai') ?>",
                    method: "post",
                    data: {
                        kode: value
                    },
                    success: function(response) {
                        $(".div_detail").css("display", "block");

                        var obj = JSON.parse(response);

                        var bonus_service = parseInt(10 / 100) * obj.total_transaksi_per_pegawai;

                        var biaya = $("#biaya").val();
                        var tot_bonus = obj.total_hadir * biaya;

                        $("#bonus").on("keyup", function() {
                            var typing = $(this).val();
                            if (typing) {
                                var bonus = parseInt($("#bonus").val()) / 100;
                                var tot_bonus = bonus * obj.total_transaksi_per_pegawai
                                $("#bonus_service").val(tot_bonus);

                                var tot_bonus_kehadiran = parseInt($("#tot_bonus_hadir").val());


                                var gaji_bersih = parseInt(obj.gapok) + parseInt(tot_bonus) + parseInt(tot_bonus_kehadiran);
                                $("#gaji_bersih").val(gaji_bersih);
                            } else {
                                var tot_bonus_kehadiran = parseInt($("#tot_bonus_hadir").val());
                                var gapok = parseInt(obj.gapok);
                                var gajibersih = gapok + tot_bonus_kehadiran;

                                $("#bonus_service").val(0);
                                $("#gaji_bersih").val(gajibersih);
                            }
                        });

                        $("#gapok").val(obj.gapok);
                        // $("#jml_service").val(obj.jumlah_service);
                        $("#total_transaksi_service").val(obj.total_transaksi_per_pegawai);
                        $("#bonus_service").val(0);
                        $("#total_hadir").val(obj.total_hadir);
                        $("#tot_bonus_hadir").val(tot_bonus);

                        var gapok = $("#gapok").val();
                        var gajibersih = parseInt(gapok) + parseInt(tot_bonus);
                        $("#gaji_bersih").val(gajibersih);

                        $("#btn-simpan").prop("disabled", false);
                    }
                })
            } else {
                $(".div_detail").css("display", "none");
                $("#btn-simpan").prop("disabled", true);
            }
        });
    });
</script>