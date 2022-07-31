<!-- Main Content -->
<div class="main-content">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-lg-10">
                <h4>Transaksi Pembelian Aset</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="<?= base_url('user/transaksi/pengeluaranAset/detail_pengeluaranAset') ?>">
                    <div class="form-group row">
                        <label for="id_transaksi" class="col-sm-4 col-form-label">ID Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $kode ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_transaksi" class="col-sm-4 col-form-label">Tgl. Transaksi</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_aset" class="col-sm-4 col-form-label">Jenis Aset</label>
                        <div class="col-sm-8">
                            <select name="jenis_aset" id="jenis_aset" class="form-control" name="jenis_aset" required>
                                <option value="">Pilih Jenis</option>
                                <option value="Aset Tetap">Aset Tetap</option>
                                <option value="Aset Lancar">Aset Lancar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aset" class="col-sm-4 col-form-label">Aset</label>
                        <div class="col-sm-8">
                            <select name="aset" id="aset" class="form-control" name="aset" required>
                                <option value="">-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" class="col-sm-4 col-form-label">Qty</label>
                        <div class="col-sm-8">
                            <input type="number" min="1" value="1" class="form-control" id="qty" name="qty">
                        </div>
                    </div>
                    <input type="hidden" id="harga_satuan" name="harga_satuan">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <a href="<?= base_url('user/transaksi/pengeluaranAset') ?>" class="btn btn-secondary"> Kembali</a>
                            <button type="submit" class="btn btn-primary"> Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Aset</th>
                                    <th class="text-center">Jenis Aset</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $grandtotal = 0;
                                foreach ($detail_transaksi as $item) { ?>
                                    <?php
                                    $grandtotal += $item->subtotal;
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->nama ?></td>
                                        <td><?= $item->jenis_aset ?></td>
                                        <td><?= $item->qty ?></td>
                                        <td class="text-right">Rp<?= number_format($item->harga_satuan, 2, ',', '.') ?></td>
                                        <td class="text-right">Rp <?= number_format($item->subtotal, 2, ',', '.') ?></td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Grandtotal</th>
                                    <th class="text-right">Rp <?= number_format($grandtotal, 2, ',', '.') ?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="hidden" id="grandtot" value="<?= $grandtotal ?>">
                    </div>
                    <?php
                    if (count($detail_transaksi) > 0) {
                        # code...
                        echo '<button class="btn btn-success" data-toggle="modal" data-target="#bayar"> Bayar</button>';
                    } else {
                        # code...
                        echo '<button class="btn btn-danger" disabled> Bayar</button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->include('transaksi/pengeluaran_aset/bayar'); ?>
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
    $(document).ready(function() {
        $("#tablemenu").DataTable();

        $("#jenis_aset").on("change", function() {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    url: "<?= base_url('Transaksi/getAset') ?>",
                    method: "post",
                    data: {
                        jenis_aset: value
                    },
                    success: function(response) {
                        var obj = JSON.parse(response);
                        let option = '<option value="">-</option>';
                        obj.forEach(element => {
                            option += `<option value="${element.id_aset}">${element.nama}</option>`;
                        });
                        $('#aset').html(option);

                    }
                })
            } else {
                let option = '<option value="">-</option>';
                $('#aset').html(option);
            }
        });

        let id_transaksi = $("#id_transaksi").val();

        $("#id_transaksi_bayar").val(id_transaksi);

        $("#aset").on("change", function() {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    url: "<?= base_url('Transaksi/list_aset') ?>",
                    method: "post",
                    type: "json",
                    data: {
                        id_aset: value
                    },
                    success: function(response) {
                        var obj = JSON.parse(response);
                        console.log(obj)
                        $("#harga_satuan").val(obj.harga)
                    }
                });
            } else {
                $("#harga_satuan").val(0);
            }
        });
    });

    $(document).on("keyup", "#supplier", function() {
        var value = $(this).val();
        $("#kembalian").val(0);
        if (value) {
            $("#div-bawah").css("display", "block");
            $("#btn-simpan").prop("disabled", false);

            let total = $("#grandtot").val();
            $("#grandtotal").val(total);

            $("#jumlah_bayar").on("keyup", function() {
                let jumlah_bayar = $(this).val();
                let grandtot = $("input[name='grandtotal']").val();
                let kembalian = jumlah_bayar - grandtot;

                let info = `<i>jumlah bayar harus sama atau lebih dari total transaksi.</i>`;
                $("#info").html(info);

                if (jumlah_bayar) {
                    if (kembalian >= 0) {
                        $("#kembalian").val(kembalian);
                        $("#btn-simpan").prop("disabled", false);
                        $("#info").hide();
                    } else {
                        $("#kembalian").val(kembalian);
                        $("#btn-simpan").prop("disabled", true);
                        $("#info").show();
                    }
                } else {
                    $("#btn-simpan").prop("disabled", true);
                    $("#info").show();
                }
            });
        } else {
            $("#div-bawah").css("display", "none");
            $("#btn-simpan").prop("disabled", true);
        }
    });

    $(document).on("change", "#nama_pelanggan", function() {
        var value = $(this).val();
        $("#kembalian").val(0);
        if (value) {
            $("#div-bawah").css("display", "block");
            $("#btn-simpan").prop("disabled", false);

            let total = $("#grandtot").val();
            $("#grandtotal").val(total);

            $("#jumlah_bayar").on("keyup", function() {
                let jumlah_bayar = $(this).val();
                let grandtot = $("input[name='grandtotal']").val();
                let kembalian = jumlah_bayar - grandtot;

                let info = `<i>jumlah bayar harus sama atau lebih dari total transaksi.</i>`;
                $("#info").html(info);

                if (jumlah_bayar) {
                    if (kembalian >= 0) {
                        $("#kembalian").val(kembalian);
                        $("#btn-simpan").prop("disabled", false);
                        $("#info").hide();
                    } else {
                        $("#kembalian").val(kembalian);
                        $("#btn-simpan").prop("disabled", true);
                        $("#info").show();
                    }
                } else {
                    $("#btn-simpan").prop("disabled", true);
                    $("#info").show();
                }
            });
        } else {
            $("#div-bawah").css("display", "none");
            $("#btn-simpan").prop("disabled", true);
        }
    });
</script>