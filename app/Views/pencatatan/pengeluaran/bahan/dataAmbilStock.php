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
?>
<!-- Main Content -->
<div class="main-content">
    <!-- <button class="btn btn-success simpanStock1" type="button" name="simpanStock">Simpan Data Stock</button> -->
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
                        <li class="breadcrumb-item active" aria-current="page">Bahan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Pengambilan Stock</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="dataStock" action="/Pencatatan/saveStock" method="post">
                    <div class="form-row align-items-center d-flex justify-content-end">
                        <div class="row">
                            <label for="namaAdmin" class="col-sm-5 col-form-label font-weight-bold">Nama Admin</label>
                            <div class="col-sm-6 mb-2">
                                <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" readonly value="<?= user()->fullname; ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1">
                    <input type="hidden" name="inputTanggalPengambilanStock" value="<?= date('Y-m-d'); ?>">
                    <div class="form-group row">
                        <label for="namaKaryawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" autofocus required> -->
                            <select class="mr-sm-2 form-control" id="namaKaryawan" name="namaKaryawan" autofocus required>
                                <?php foreach ($dataKaryawan->getResult() as $row) : ?>
                                    <option id="<?= $row->namaKaryawan; ?>" value="<?= $row->namaKaryawan; ?>">
                                        <?= $row->namaKaryawan; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <table class="table table-md" id="calculationStock">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="insert-form1">
                            <tr class="line_items">
                                <td>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto my-1">
                                            <label class="mr-sm-2 sr-only" for="namaBarang">Preference</label>
                                            <select class="mr-sm-2 form-control" id="namaBarang" name="namaBarang[]">
                                                <?php foreach ($dataStockBahan->getResult() as $row) : ?>
                                                    <?php foreach ($dataPengambilanJumlahStock->getResult() as $row3) : ?>
                                                        <?php if ($row3->namaBarang == $row->namaBarang) : ?>
                                                            <?php if ($row->kuantitasBarang - $row3->jumlahPengambilanStock > 8) : ?>
                                                                <option id="<?= $row->namaBarang; ?>" value="<?= $row->namaBarang; ?>"><?= $row->namaBarang; ?></option>
                                                            <?php break;
                                                            endif; ?>
                                                        <?php break;
                                                        endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-">
                                                <input type="number" class="form-control text-right" id="jumlahPengambilanStock" name="jumlahPengambilanStock[]" min="1" max="9">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="number" class="form-control text-right" id="jumlahPengambilanStock" name="jumlahPengambilanStock[]" max="5">
                                            </div>
                                        </div>
                                    </div> -->
                                </td>
                                <td id="aksi">
                                    <?php foreach ($dataPengambilanJumlahStock->getResult() as $row3) : ?>
                                        <?php foreach ($dataStockBahan->getResult() as $row) : ?>
                                            <?php if ($row3->namaBarang == $row->namaBarang) : ?>
                                                <?php if ($row->kuantitasBarang - $row3->jumlahPengambilanStock > 2) : ?>
                                                    <button class="btn btn-success simpanStock" type="submit" name="simpanStock" onclick="return confirm('Apakah anda yakin?')">Simpan Data Stock</button>
                                                <?php break;
                                                endif; ?>
                                            <?php break;
                                            endif; ?>
                                        <?php break;
                                        endforeach; ?>
                                    <?php endforeach; ?>
                                    <!-- <script>
                                        if (isEmpty($('.simpanStock'))) {
                                            alert('oke')
                                        }
                                    </script> -->
                                    <!-- <button class="btn btn-primary row-add-stock" type="button" name="tambahData" id="tambahData">Add <i class="fas fa-plus"></i></button> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="button" name="tambahData" id="tambahData">Tambah Data</button> -->
                    <div class="row d-flex justify-content-end mt-3">
                        <div class="col-2">
                            <!-- <button class="btn btn-success simpanStock" type="submit" name="simpanStock">Simpan Data Stock</button> -->
                            <!-- <button class="btn btn-success simpanStock" type="button" onclick="return alert('Stock tidak tersedia!')" name="simpanStock">Simpan Data Stock</button> -->
                        </div>
                        <div class="col-10"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>