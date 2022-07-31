<?php
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
];

$kodeAkun = [
    'a110',
    'b110',
    'b210',
    'g110',
    't110'
];

$namaAkun = [
    'Aset',
    'Bahan',
    'Beban',
    'Gaji',
    'Transaksi Lainnya'
]

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
                        <li class="breadcrumb-item active" aria-current="page">Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Data Akun Bahan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table class="table table-striped table-sm">
                    <tbody>
                        <thead>
                            <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                                <th>Akun</th>
                                <th>ID Peralatan</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Nama Supplier</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <?php foreach ($dataTransaksiBahan->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td>B110</td>
                                <td>
                                    <?= $row->idPeralatan; ?>
                                </td>
                                <td>
                                    <?php foreach ($all_data->getResult() as $row2) : ?>
                                        <?php if ($row2->idPeralatan == $row->idPeralatan) : ?>
                                            <p><?= $row2->namaBarang; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($all_data->getResult() as $row2) : ?>
                                        <?php if ($row2->idPeralatan == $row->idPeralatan) : ?>
                                            <p><?= $row2->kuantitasBarang; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>-</td>
                                <td>
                                    <?php foreach ($all_data->getResult() as $row2) : ?>
                                        <?php if ($row2->idPeralatan == $row->idPeralatan) : ?>
                                            <p><?= $row2->namaSupplier; ?></p>
                                        <?php break;
                                        endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?= $row->tanggalPembayaran; ?>
                                </td>
                                <td>
                                    <?php foreach ($totalPembelianBahan->getResult() as $row2) : ?>
                                        <?php if ($row2->idPeralatan == $row->idPeralatan) : ?>
                                            <p><?= $row2->totalBahan ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>