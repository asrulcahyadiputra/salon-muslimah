<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 7px 0px 7px rgba(0,0,0,0.75);">
            <div class="col-md-6">
                <h2>Transaksi Service</h2>
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
                <!-- <h4>Transaksi Service</h4> -->
            </div>
            <div class="col-lg-2">
                <a class="btn btn-info btn-block" href="<?= base_url('user/transaksi/service/form') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg mt-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tablemenu" style="cursor:pointer;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">ID Transaksi</th>
                                <th class="text-center">Tgl. Transaksi</th>
                                <th class="text-center">Tgl. Pelayanan</th>
                                <th class="text-center">Nama Pelanggan</th>
                                <th class="text-center">Nama Karyawan</th>
                                <th class="text-center">Jenis Pesan</th>
                                <th class="text-center">Jenis Pelayanan</th>
                                <th class="text-center">Diskon</th>
                                <th class="text-center">Total Transaksi</th>
                                <?php if (!in_groups('customer')) : ?>
                                    <th class="text-center">Total Bayar</th>
                                <?php endif ?>
                                <?php if (!in_groups('customer')) : ?>
                                    <th class="text-center">Action</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($tb_serivce as $item) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $item->id_transaksi ?></td>
                                    <td><?= $item->tgl_transaksi ?></td>
                                    <td><?= $item->tgl_service ?></td>
                                    <td><?= $item->nama_pelanggan ?></td>
                                    <td><?= $item->nama_karyawan ?></td>
                                    <td><?= $item->jenis_pesan ?></td>
                                    <td><?= $item->jenis_pelayanan ?></td>
                                    <td class="text-right">Rp <?= number_format($item->diskon, 2, ',', '.') ?></td>
                                    <td class="text-right">Rp <?= number_format($item->subtotal, 2, ',', '.') ?></td>
                                    <?php if (!in_groups('customer')) : ?>
                                        <td class="text-right">Rp <?= number_format($item->total_bayar, 2, ',', '.') ?></td>
                                    <?php endif ?>
                                    <?php if (!in_groups('customer')) : ?>
                                        <td class="text-center action">
                                            <?php
                                            if ($item->status_bayar == 'belum bayar') {
                                                # code...
                                                echo '<button type="button" class="btn btn-primary btn-sm bayar" data-toggle="modal" data-target="#bayar" data-id="' . $item->id_transaksi . '" data-total-bayar="' . $item->subtotal . '">Bayar</button>';
                                            }
                                            // else {

                                            //     echo '<button type="button" class="btn btn-success btn-sm"> Sudah Bayar</button>';
                                            // }
                                            echo ' <button type="button" class="btn btn-light btn-sm ambilstok" data-toggle="modal" data-target="#ambilstok" data-id="' . $item->id_transaksi . '">Pengambilan Stok</button>';
                                            ?>
                                        </td>
                                    <?php endif ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->include('transaksi/service/bayar'); ?>
<?= $this->include('transaksi/service/ambil_stok'); ?>
<?= $this->include('transaksi/service/detail'); ?>
<script src="<?= base_url('/js/vanilla-tilt.js'); ?>"></script>
<script src="<?= base_url('js/currency.js') ?>"></script>
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
        $("#kembalian").val(0);
        $("#jumlah_bayar").on("keyup", function() {
            var jumlah_bayar = price_to_number($(this).val());
            console.log(jumlah_bayar)
            var total_input = $("#total_transaksi").val();
            var total = price_to_number(total_input);
            var kembalian = jumlah_bayar - total;
            let kembalian_replace = 'Rp ' + number_to_price(kembalian);

            let info = `<i>jumlah bayar harus sama atau lebih dari total transaksi.</i>`;
            $("#info").html(info);

            if (jumlah_bayar) {
                if (kembalian >= 0) {
                    $("#kembalian").val(kembalian_replace);
                    $("#btn-simpan").prop("disabled", false);
                    $("#info").hide();
                } else {
                    $("#kembalian").val(kembalian_replace);
                    $("#btn-simpan").prop("disabled", true);
                    $("#info").show();
                }
            } else {
                $("#btn-simpan").prop("disabled", true);
                $("#info").show();
            }
        });
    });

    var i = 2;
    $(".tambah").click(function() {
        var data = `<tr>
                        <td>
                            <select name="bahan[]" id="bahan${i}" class="form-control">
                                <option value="">-</option>
                                <?php foreach ($bahan as $key => $value) { ?>
                                <option value="<?= $value->id_product ?>"><?= $value->nama_product ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" min="1" name="qty[]" id="qty${i}" class="form-control">
                        </td>
                        <td>
                            <button type="button" class="hapus">Hapus</button>
                        </td>
                    </tr>`;
        $('#stoktable').append(data);
        i++;
    });

    $("#stoktable").on('click', '.hapus', function() {
        $(this).closest('tr').remove();
    });

    $(document).on("click", ".bayar", function() {
        console.log('ini bayar')
        var id = $(this).data('id');
        var total_transaksi = $(this).data('total-bayar');
        let total_replcae = 'Rp ' + number_to_price(total_transaksi);
        $(".modal-body #id_transaksi").val(id);
        $(".modal-body #total_transaksi").val(total_replcae);
    });

    $(document).on("click", ".ambilstok", function() {
        var id = $(this).data('id');
        $(".modal-body #id_transaksi").val(id);
    });

    $('#tablemenu').on('click', 'tr', function(e) {
        if (!$(e.target).closest('.action').length) {
            let id = $(this).closest('tr').find('td').eq(1).html();
            console.log(id)
            $.ajax({
                type: 'get',
                url: '<?= base_url("Transaksi/detailService") ?>',
                data: {
                    id_transaksi: id
                },
                dataType: 'json',
                success: (res) => {
                    let data_m = res.data_m;
                    let data_d = res.data_d;
                    let html = '';
                    html += `<table>
                        <tr>
                            <td>ID Transaksi</td>
                            <td>:</td>
                            <td>${data_m.id_transaksi}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>${data_m.tgl_transaksi}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pelayanan</td>
                            <td>:</td>
                            <td>${data_m.tgl_service}</td>
                        </tr>
                        <tr>
                            <td>Pelanggan</td>
                            <td>:</td>
                            <td>${data_m.nama_pelanggan}</td>
                        </tr>
                        <tr>
                            <td>Karyawan</td>
                            <td>:</td>
                            <td>${data_m.nama_karyawan}</td>
                        </tr>
                    </table>`;

                    html += `<table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Service</th>
                                <th class="text-right">Harga</th>
                            </tr>
                        </thead><tbody>`;
                    let no = 1;
                    let total = 0;
                    for (let i = 0; i < data_d.length; i++) {
                        const line = data_d[i];
                        html += `<tr>
                            <td>${no}</td>
                            <td>${line.nama_service}</td>
                            <td class="text-right">Rp ${number_to_price(line.harga)},00</td>
                        </tr>`;
                        no++;
                        total += parseInt(line.harga);
                    }
                    html += `<tr>
                        <td class="text-right" colspan="2">Subtotal</td>
                        <td class="text-right">Rp ${number_to_price(total)},00</td>
                    </tr>`;
                    html += `<tr>
                        <td class="text-right" colspan="2">Diskon</td>
                        <td class="text-right">Rp ${number_to_price(data_m.diskon)},00</td>
                    </tr>`;
                    html += `<tr>
                        <td class="text-right" colspan="2">Total</td>
                        <td class="text-right">Rp ${number_to_price(data_m.subtotal)},00</td>
                    </tr>`;
                    html += `</tbody></table>`;
                    let url = "<?= base_url('Transaksi/catakService') ?>/" + data_m.id_transaksi;
                    html += `<a href="${url}" target="_blank" class="btn btn-block btn-primary text-white">Cetak Bukti</a>`;
                    $('#detail #print-area').html(html);
                    $('#detail').modal('show');
                }
            });
        }


    });
</script>