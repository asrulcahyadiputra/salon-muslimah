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
                    <h4 class="card-title">Bukti Penggajian</h4>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-left" style="width:30%;">Tanggal</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td><?= mediumdate_indo($data->tgl_gaji) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="width:30%;">Karyawan</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td><?= $data->namaKaryawan ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="width:30%;">Gaji Pokok</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td class="text-left">
                                        <span>Rp <?= number_format($data->gajipokok, 2, ',', '.') ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="width:30%;">Bonus Service</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td class="text-left">
                                        <span>Rp <?= number_format($data->bonus_service, 2, ',', '.') ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="width:30%;">Bonus Hadir</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td class="text-left">
                                        <span>Rp <?= number_format($data->bonus_hadir, 2, ',', '.') ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="width:30%;">Take Home Pay</td>
                                    <td class="text-center" style="width:2%;">:</td>
                                    <td class="text-left">
                                        <span>Rp <?= number_format($data->gaji_bersih, 2, ',', '.') ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left text-bold" colspan="3" style="font-weight:bold;"><i><?= terbilang($data->gaji_bersih) ?> Rupiah</i></td>
                                </tr>

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