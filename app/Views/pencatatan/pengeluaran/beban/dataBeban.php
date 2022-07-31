<?php
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
]
?>

<?php
date_default_timezone_set('Asia/Jakarta');
$totalField += 1;
$akun = 'B210' . $totalField;
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
    <div class="container">
        <div class="row">
            <div class="col-md text-center">
                <h4>Form Transaksi Beban</h4>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="dataBeban" action="/Pencatatan/saveBeban" method="post">
                    <input type="hidden" id="jumlah-form" value="1">
                    <input type="hidden" id="akunBeban" name="keterangan" value="Beban">
                    <div class="col-md-8 text-center card" style="margin-left: auto; margin-right: auto; background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="noTransaksi">No. Transaksi Beban</label>
                                <input type="text" class="form-control" name="akun" id="noTransaksi" value="<?= $kode; ?>" readonly>
                            </div>
                            <div class=" form-group">
                                <label for="tanggalTransaksi">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="tanggalTransaksi" name="tanggalInputBeban" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenisBeban1">Nama Beban</label>
                                <select class="custom-select mr-sm-2" id="jenisBeban1" name="jenisBeban[]">
                                    <option value="">-</option>
                                    <?php foreach ($beban as $row) : ?>
                                        <option class="text-center" value="<?= $row->kodeAkun . '-' . $row->namaAkun ?>"><?= $row->namaAkun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control text-right" name="totalBeban[]" id="total-beban" data-type="currency" required>
                            </div>
                            <button class="btn btn-success" type="submit" name="simpan-pesanan" onclick="return confirm('Apakah anda yakin?')">Simpan Data Beban</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- testing script -->
<!-- <script>
    let totalBeban = document.getElementById('total-beban');

    totalBeban.addEventListener('change', function() {
        let value = totalBeban.value;
        let replace = price_to_number(value);
        console.log(replace);
        console.log(value);
    });

</script> -->