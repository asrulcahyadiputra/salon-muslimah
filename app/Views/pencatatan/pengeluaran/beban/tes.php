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
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h4>Transaksi Pembelian Beban</h4>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="dataBeban" action="/Pencatatan/saveBeban" method="post">
                    <div class="form-row align-items-center d-flex justify-content-end">
                        <div class="row">
                            <label for="namaAdmin" class="col-sm-5 col-form-label font-weight-bold">Nama Admin</label>
                            <div class="col-sm-6 mb-2">
                                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" readonly value="<?= user()->fullname; ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1">
                    <input type="hidden" id="akunBeban" name="keterangan" value="Beban">
                    <input type="hidden" name="tanggalInputBeban" value="<?= date('Y-m-d'); ?>">
                    <input type="hidden" id="akun" name="akun" value="<?= $akun; ?>">
                    <table class="table table-md text-center" id="calculationBeban">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Nama Beban</th>
                                <th scope="col">Harga</th>
                                <!-- <th scope="col">Total</th> -->
                            </tr>
                        </thead>
                        <tbody id="insert-form1">
                            <tr class="line_items">
                                <td>
                                    <!-- <div class="form-row align-items-center">
                                        <div class="col-auto my-1"> -->
                                    <!-- <label class="mr-sm-2 sr-only" for="jenisBeban">Preference</label> -->
                                    <select class="custom-select mr-sm-2 col-6" id="jenisBeban1" name="jenisBeban[]" required>
                                        <option selected>Pilih jenis beban..</option>
                                        <?php foreach ($dataJenisBeban->getResult() as $row) : ?>
                                            <option value="<?= $row->jenisBeban; ?>"><?= $row->jenisBeban; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- </div>
                                    </div> -->
                                </td>
                                <td>
                                    <!-- <div class="form-row">
                                        <div class="row text-center"> -->
                                    <!-- <div class="col-8"> -->
                                    <input type="number" style="margin-left: auto; margin-right: auto;" class="form-control text-right col-6" name="priceBeban">
                                    <!-- </div>
                                        </div>
                                    </div> -->
                                </td>
                                <input type="hidden" class="form-control text-right" name="totalBeban[]" value="" jAutoCalc="{priceBeban}" readonly>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="button" name="tambahData" id="tambahData">Tambah Data</button> -->
                    <div class="row d-flex justify-content-end mt-3">
                        <div class="col-10"><button class="btn btn-success" type="submit" name="simpan-pesanan" onclick="return confirm('Apakah anda yakin?')">Simpan Data Beban</button></div>
                        <div class="col-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>