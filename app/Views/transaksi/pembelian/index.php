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
                <h4>Transaksi Pembelian Bahan</h4>
            </div>
            <div class="col-lg-2">
                <a class="btn btn-info" href="<?= base_url('user/transaksi/pembelian/form') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                <th class="text-center">Supplier</th>
                                <th class="text-center">Total Transaksi</th>
                                <th class="text-center">Kembalian</th>
                                <th class="text-center">Jumlah Bayar</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pmb as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $value->id_transaksi ?></td>
                                    <td><?= $value->tgl_transaksi ?></td>
                                    <td><?= ucwords($value->supplier) ?></td>
                                    <td class="text-right">Rp <?= number_format($value->subtotal, 2, ',', '.') ?></td>
                                    <td class="text-right">Rp <?= number_format($value->kembalian, 2, ',', '.') ?></td>
                                    <td class="text-right">Rp <?= number_format($value->jumlah_bayar, 2, ',', '.') ?></td>
                                    <td class="text-center"><?= ($value->status == 'selesai') ? '<span class="badge badge-success">Sudah Bayar</span>' : '<span class="badge badge-warning">' . ucwords($value->status) . '</span>' ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url('/js/vanilla-tilt.js'); ?>"></script>
<script src="<?= base_url('js/currency.js') ?>"></script>
<?= $this->include('transaksi/pembelian/detail'); ?>
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
    });

    $(document).on("click", ".edit", function() {
        var id = $(this).data('id');
        var keterangan = $(this).data('keterangan');
        $(".modal-body #id").val(id);
        $(".modal-body #keterangan").val(keterangan);
    });

    $('#tablemenu').on('click', 'tr', function(e) {
        if (!$(e.target).closest('.action').length) {
            let id = $(this).closest('tr').find('td').eq(1).html();
            console.log(id)
            $.ajax({
                type: 'get',
                url: '<?= base_url("Transaksi/detailPembelian") ?>',
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
                            <td>Vendor</td>
                            <td>:</td>
                            <td>${data_m.supplier}</td>
                        </tr>
                    </table>`;

                    html += `<table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th class="text-center">Qty</th>
                                <th class="text-right">Harga</th>
                                <th class="text-right">Subotal</th>
                            </tr>
                        </thead><tbody>`;
                    let no = 1;
                    let total = 0;
                    for (let i = 0; i < data_d.length; i++) {
                        const line = data_d[i];
                        html += `<tr>
                            <td>${no}</td>
                            <td>${line.nama_product}</td>
                            <td class="text-center">${line.qty}</td>
                            <td class="text-right">Rp ${number_to_price(line.harga_satuan)},00</td>
                            <td class="text-right">Rp ${number_to_price(line.subtotal)},00</td>
                        </tr>`;
                        no++;
                        total += parseInt(line.subtotal);
                    }
                    html += `<tr>
                        <td class="text-right" colspan="4">Total</td>
                        <td class="text-right">Rp ${number_to_price(total)},00</td>
                    </tr>`;
                    html += `</tbody></table>`;
                    let url = "<?= base_url('Transaksi/cetakPembelian') ?>/" + data_m.id_transaksi;
                    html += `<a href="${url}" target="_blank" class="btn btn-block btn-primary text-white">Cetak Bukti</a>`;
                    $('#detail #print-area').html(html);
                    $('#detail').modal('show');
                }
            });
        }


    });
</script>