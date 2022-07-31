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
                <h4>Transaksi Pembelian Bahan</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="<?= base_url('user/transaksi/pembelian/detail_pembelian') ?>">
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
                        <label for="product" class="col-sm-4 col-form-label">Bahan</label>
                        <div class="col-sm-8">
                            <select name="product" id="product" class="form-control" name="product" required>
                                <option value="">-</option>
                                <?php foreach ($product as $item) { ?>
                                    <option value="<?= $item->id_product ?>"><?= $item->nama_product ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="harga_satuan" id="harga_satuan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" class="col-sm-4 col-form-label">Qty</label>
                        <div class="col-sm-8">
                            <input type="number" min="1" value="1" class="form-control" id="qty" name="qty">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <a href="<?= base_url('user/transaksi/pembelian') ?>" class="btn btn-secondary"> Kembali</a>
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
                                    <th class="text-center">Nama Bahan</th>
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
                                foreach ($detail_penjualan as $item) { ?>
                                    <?php
                                    $grandtotal += $item->subtotal;
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->nama_product ?></td>
                                        <td><?= $item->qty ?></td>
                                        <td class="text-right">Rp <?= number_format($item->harga_satuan, 2, ',', '.') ?></td>
                                        <td class="text-right">Rp <?= number_format($item->subtotal, 2, ',', '.') ?></td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Grandtotal</th>
                                    <th class="text-right">Rp <?= number_format($grandtotal, 2, ',', '.') ?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="hidden" id="grandtot" value="<?= $grandtotal ?>">
                    </div>
                    <?php
                    if (count($detail_penjualan) > 0) {
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
<?= $this->include('transaksi/pembelian/bayar'); ?>
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
        let id_transaksi = $("#id_transaksi").val();
        $("#id_transaksi_bayar").val(id_transaksi)
        $("#product").on("change", function() {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    url: "<?= base_url('Transaksi/list_product') ?>",
                    method: "post",
                    type: "json",
                    data: {
                        id_product: value
                    },
                    success: function(response) {
                        var obj = JSON.parse(response);
                        $("#harga_satuan").val(obj.harga_satuan)
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
</script>