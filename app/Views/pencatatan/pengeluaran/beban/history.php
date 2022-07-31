<?php
$judulCard = [
    'Total Product Terjual',
    'Total Penjualan'
];
$volumeCard = [
    '3 pcs',
    'Rp 60.000'
];
// function sum($total)
// {
//     $total = 0;
//     foreach ($total as $t) {
//     }
// }
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
                        <li class="breadcrumb-item active" aria-current="page">Beban</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h4>Data Pengeluaran Beban</h4>
            </div>
            <div class="col-md-2">

            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <table id="tabelmenu" class="table table-striped table-sm">
                    <!-- <thead>
                        <tr class="text-center" class="text-center">
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/beban" style="text-decoration: none;" style="text-decoration: none;">Beban</a></th>
                            <th class="table-bordered"><a class="text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/beban/pembayaran" style="text-decoration: none;">Pembayaran</a></th>
                            <th class="table-bordered" style="background-color: #eaeaea;"><a class="text-dark" href="#" style="text-decoration: none;">History</a></th>
                        </tr>
                    </thead> -->
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/beban" style="text-decoration: none;">Beban</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" style="background-color: #eaeaea;" href="/user/dashboard/pencatatan-kas/pengeluaran/beban/pembayaran" style="text-decoration: none;">Pembayaran</a>
                    <a class="btn btn-light mr-1 mb-2 text-dark" href="/user/dashboard/pencatatan-kas/pengeluaran/beban/history" style="text-decoration: none;">History</a>
                    <thead>
                        <tr class="text-center" style="background-color: #eaeaea; box-shadow: 2px 1px 3px 0px rgba(0,0,0,0.75);">
                            <th>ID Beban</th>
                            <th>Nama Beban</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataTransaksiBeban->getResult() as $row) : ?>
                            <tr class="text-center">
                                <td><?= $row->akun; ?></td>
                                <td>
                                    <?php foreach ($all_data->getResult() as $row2) : ?>
                                        <?php if ($row2->akun == $row->akun) : ?>
                                            <p><?= $row2->jenisBeban; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?= $row->tanggalPembayaran; ?>
                                </td>
                                <td>
                                    <?= $row->statusPembayaran; ?>
                                </td>
                                <td>
                                    <form action="/Pencatatan/deleteBeban/<?= $row->id; ?>" method="post">
                                        <input type="hidden" name="statusPembayaran" value="null">
                                        <input type="hidden" name="idKelolaBeban" value="
                                        <?php foreach ($dataKelolaBeban->getResult() as $row2) : ?>
                                            <?php if ($row2->akun == $row->akun) : ?>
                                                <?= $row2->id ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        ">
                                        <button type="submit" class="btn btn-danger" id="<?= $row->akun; ?>" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <?php foreach ($totalPembelianBeban->getResult() as $row2) : ?>
                                        <?php if ($row2->akun == $row->akun) : ?>
                                            <p><?= $row2->totalBeban ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#tabelmenu').DataTable();
                    });
                </script>
            </div>
        </div>
    </section>
</div>