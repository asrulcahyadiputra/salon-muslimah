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
$totalField += 1;
$kodetransaksi = 'P000' . $totalField;
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
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Transaksi Pembelian Product</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="pembelian" action="/Product/save" method="post">
                    <div class="form-row align-items-center d-flex justify-content-end">
                        <div class="row">
                            <label for="namaAdmin" class="col-sm-5 col-form-label font-weight-bold">Nama Admin</label>
                            <div class="col-sm-6 mb-2">
                                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" readonly value="<?= user()->fullname; ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1">
                    <input type="hidden" name="tanggalPembelian" value="<?= date('Y-m-d'); ?>">
                    <input type="hidden" id="kodetransaksi" name="kodetransaksi" value="<?= $kodetransaksi; ?>">
                    <!-- <input type="hidden" id="total1" name="total[]" value="30000"> -->
                    <table class="table table-md" id="calculation">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="insert-form1">
                            <tr class="line_items">
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" class="form-control" id="namaProduk1" name="namaProduk[]">
                                                <!-- <select name="namaProduk[]" id="namaProduk1" class="form-control">
                                                <?php foreach ($produk as $item) { ?>
                                                <option value=""><?= $item->namaProduk ?></option>
                                                <?php } ?>
                                                </select> -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" class="form-control text-right" id="kuantitas" name="kuantitas[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-right" id="price" name="price[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" class="form-control text-right" name="total[]" value="" jAutoCalc="{#kuantitas} * {#price}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><button class="btn btn-primary row-add" type="button" name="tambahData" id="tambahData">Add <i class="fas fa-plus"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="button" name="tambahData" id="tambahData">Tambah Data</button> -->
                    <div class="row d-flex justify-content-end mt-3">
                        <div class="col-2"><button class="btn btn-success" type="submit" name="simpan-pesanan" onclick="return confirm('Apakah anda yakin?')">Simpan Pemesanan</button></div>
                        <div class="col-10"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>