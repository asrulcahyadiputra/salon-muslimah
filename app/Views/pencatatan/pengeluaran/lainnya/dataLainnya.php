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
$akun = 'T110' . $totalField;
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 7px 0px 7px rgba(0,0,0,0.75);">
            <div class="col-md-6">
                <h1>DASHBOARD</h1>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class=" breadcrumb mt-3 d-flex justify-content-end" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Pencatatan kas</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lainnya</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Transaksi Lainnya</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="dataTransaksi" action="/Pencatatan/saveTransaksi" method="post">
                    <div class="form-row align-items-center d-flex justify-content-end">
                        <div class="row">
                            <label for="namaAdmin" class="col-sm-5 col-form-label font-weight-bold">Nama Admin</label>
                            <div class="col-sm-6 mb-2">
                                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" readonly value="<?= user()->fullname; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center d-flex justify-content-start">
                        <div class="row">
                            <div class="col-sm mb-2">

                                </button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1">
                    <input type="hidden" id="akunTransaksi" name="keterangan" value="Transaksi Lainnya">
                    <input type="hidden" name="tanggalInputTransaksi" value="<?= date('Y-m-d'); ?>">
                    <input type="hidden" id="akun" name="akun" value="<?= $akun; ?>">
                    <table class="table table-md" id="calculationTransaksi">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Nama Transaksi</th>
                                <th scope="col">Jenis Transaksi</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="insert-form1">
                            <tr class="line_items">
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="keteranganTransaksi" name="keteranganTransaksi[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto my-1">
                                            <label class="mr-sm-2 sr-only" for="jenisTransaksi">Preference</label>
                                            <select class="custom-select mr-sm-2" id="jenisTransaksi1" name="jenisTransaksi[]">
                                                <?php foreach ($dataJenisTransaksiLainnya->getResult() as $row) : ?>
                                                    <option value="<?= $row->jenisTransaksiLainnya; ?>" style="text-transform: capitalize;"><?= $row->jenisTransaksiLainnya; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-right" name="priceTransaksi">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" class="form-control text-right" name="totalTransaksi[]" value="" jAutoCalc="{priceTransaksi}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="button" name="tambahData" id="tambahData">Tambah Data</button> -->
                    <div class="row d-flex justify-content-end mt-3">
                        <div class="col-2"><button class="btn btn-success" type="submit" name="simpan-pesanan" onclick="return confirm('Apakah anda yakin?')">Simpan Data transaksi</button></div>
                        <div class="col-10"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaksi Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/Pencatatan/saveJenisTransaksiLainnya" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tambahTransaksi" class="col-sm-4 col-form-label">Transaksi Lainnya</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tambahTransaksi" name="jenisTransaksiLainnya" style="text-transform: capitalize;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>