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
                <h4>Transaksi Service</h4>
            </div>
        </div>
        <hr>
        <form action="<?= base_url('Transaksi/saveService') ?>" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="id_transaksi" class="col-sm-4 col-form-label">ID Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $kode ?>">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?= date('Y-m-d') ?>" readonly>
                    <!-- <div class="form-group row">
                        <label for="tgl_transaksi" class="col-sm-4 col-form-label">Tgl. Transaksi</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="tgl_service" class="col-sm-4 col-form-label">Tanggal Pelayanan</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tgl_service" name="tgl_service" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <?php if (!in_groups('customer')) : ?>
                        <div class="form-group row">
                            <label for="pelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-8">
                                <select name="pelanggan" id="pelanggan" class="form-control" name="pelanggan" required>
                                    <option value="">Pilih Pelanggan</option>
                                    <?php foreach ($pelanggan as $item) { ?>
                                        <option value="<?= $item->nama ?>"><?= $item->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" name="jenis_pesan" id="jenis_pesan" value="Offline">
                        <!-- <div class="form-group row">
                            <label for="jenis_pesan" class="col-sm-4 col-form-label">Jenis Pesan</label>
                            <div class="col-sm-8">
                                <select name="jenis_pesan" id="jenis_pesan" class="form-control" name="jenis_pesan" required>
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="jenis_pelayanan" class="col-sm-4 col-form-label">Jenis Pelayanan</label>
                            <div class="col-sm-8">
                                <select name="jenis_pelayanan" id="jenis_pelayanan" class="form-control" name="jenis_pelayanan" required>
                                    <option value="Onsite">Onsite</option>
                                    <option value="Dirumah">Dirumah</option>
                                </select>
                            </div>
                        </div>

                    <?php else : ?>

                        <input type="hidden" name="pelanggan" value="<?= user()->fullname ?>">
                        <input type="hidden" name="jenis_pesan" value="Online">

                        <div class="form-group row">
                            <label for="jenis_pelayanan" class="col-sm-4 col-form-label">Jenis Pelayanan</label>
                            <div class="col-sm-8">
                                <select name="jenis_pelayanan" id="jenis_pelayanan" class="form-control" name="jenis_pelayanan" required>
                                    <option value="Onsite">Onsite</option>
                                    <option value="Dirumah">Dirumah</option>
                                </select>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="form-group row">
                        <label for="karyawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <select name="karyawan" id="karyawan" class="form-control" name="karyawan" required>
                                <option value="">Pilih Karyawan</option>
                                <?php foreach ($karyawan as $item) { ?>
                                    <option value="<?= $item->idKaryawan ?>"><?= $item->namaKaryawan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th class="text-center">Jenis Service</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="service[]" id="service1" onchange="getHarga(1)" class="form-control" required>
                                            <option value="">Pilih Service</option>
                                            <?php foreach ($jenis_service as $row) { ?>
                                                <option value="<?= $row->id ?>"><?= $row->jenisService ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="harga[]" id="harga1" class="form-control harga" readonly>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary add-row"> <i class="fas fa-plus"></i> Tambah Service</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <?php if (!in_groups('customer')) : ?>
                                    <tr>
                                        <td>Diskon</td>
                                        <td>
                                            <input type="text" class="form-control" id="diskon" name="diskon" data-type="currency">
                                            <!-- <input type="number" class="form-control" id="diskon" name="diskon" data-type="currency" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"> -->
                                            <p id="info"></p>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php else : ?>
                                    <input type="hidden" name="diskon" value="0">
                                <?php endif ?>
                                <tr>
                                    <td>Grand total</td>
                                    <td><input type="text" class="form-control" name="subtotal" id="subtotal" readonly></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <a href="<?= base_url('user/transaksi/service') ?>" class="btn btn-secondary"> Kembali</a>
                    <button type="submit" class="btn btn-primary btn-simpan"> Simpan</button>
                </div>
            </div>
        </form>
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
<script>
    function getHarga(id) {
        var value = $('#service' + id).val();
        if (value) {
            $.ajax({
                url: "<?= base_url('Transaksi/list_harga_service') ?>",
                type: "post",
                data: {
                    id: value,
                },
                success: function(response) {
                    var obj = JSON.parse(response);
                    // console.log(obj)
                    let harga = obj.harga_service;
                    let harga_currency = 'Rp ' + number_to_price(obj.harga_service);
                    $("#harga" + id).val(harga_currency);

                    // var sum = 0;
                    var sum_value = 0;
                    var diskon = $("#diskon").val();
                    $('.harga').each(function() {
                        sum_value += +price_to_number($(this).val());
                        let sum_replace = 'Rp ' + number_to_price(sum_value);
                        $('#subtotal').val(sum_replace);
                    });

                    $("#footer").css("display", "block");
                }
            });
        } else {
            $("#harga" + id).val(0);
            $('#subtotal').val(0);
            $("#footer").css("display", "none");
        }
    }

    $(document).ready(function() {
        $("#tablemenu").DataTable();
        $("#info").hide()
        $("input[name='diskon']").on("keyup", function() {
            var typing = price_to_number($(this).val());
            if (typing) {
                if (typing > 10000) {
                    $("#info").show();
                    let info = `<i>diskon maksimal adalah 10.000</i>`;
                    $("#info").html(info);
                    $(".btn-simpan").prop("disabled", true);
                } else {
                    var sum_value = 0;
                    $('.harga').each(function() {
                        sum_value += +price_to_number($(this).val());
                        $('#subtotal').val(sum_value);
                    });
                    var grandtotal = sum_value - typing;
                    let grandtotal_replace = 'Rp ' + number_to_price(grandtotal)
                    $("#subtotal").val(grandtotal_replace);
                    $("#info").hide();
                    $(".btn-simpan").prop("disabled", false);
                }
            } else {
                $("input[name='diskon']").val(0);
                var sum_value = 0;
                $('.harga').each(function() {
                    sum_value += +price_to_number($(this).val());
                    let sum_replace = 'Rp ' + number_to_price(sum_value);
                    $('#subtotal').val(sum_replace);
                });
            }
        });

        var i = 2;
        $(".add-row").click(function() {
            var data = `<tr>
                            <td>
                                <select name="service[]" id="service${i}" onchange="getHarga('${i}')" class="form-control">
                                    <option value="">Pilih Service</option>
                                    <?php foreach ($jenis_service as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->jenisService ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="harga[]" id="harga${i}" class="form-control harga" readonly>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger remove-row"> <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>`;
            $('table').append(data);
            i++;
        });

        $("#mytable").on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    });
</script>