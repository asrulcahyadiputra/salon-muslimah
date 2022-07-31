<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Cetak</title>
</head>

<body>

    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Bukti Transaksi Pembelian Aset</h4>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td style="width:30%;">No Bukti</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td><?= $data_m->id_transaksi ?></td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">Tanggal</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td><?= mediumdate_indo($data_m->tgl_transaksi) ?></td>
                                </tr>

                                <tr>
                                    <td style="width:30%;">Vendor</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td><?= $data_m->supplier ?></td>
                                </tr>

                            </table>

                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th style="width:2%;" class="text-center">No</th>
                                        <th>Produk</th>
                                        <th class="text-right">Harga</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total = 0;
                                    foreach ($data_d as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= $row['nama_aset'] ?></td>
                                            <td class="text-right">Rp <?= number_format($row['harga_satuan'], 2, ',', '.') ?></td>
                                            <td class="text-center"><?= $row['qty'] ?></td>
                                            <td class="text-right">Rp <?= number_format($row['subtotal'], 2, ',', '.') ?></td>
                                        </tr>
                                        <?php $no++;
                                        $total = $total + $row['subtotal'];  ?>
                                    <?php endforeach ?>
                                    <tr>
                                        <td class="text-right" colspan="4">Total</td>
                                        <td class="text-right">Rp <?= number_format($total, 2, ',', '.') ?></td>
                                    </tr>
                                    <tr>

                                        <td class="text-center" style="font-weight:bold;" colspan="5"><i><?= terbilang($total) ?> Rupiah</i></td>
                                    </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>