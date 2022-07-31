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
$kodetransaksi = 'SN000' . $totalField;
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
                        <li class="breadcrumb-item active" aria-current="page">Service</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- <div class="row">
        <? #php for ($i = 0; $i < 2; $i++) : 
        ?>
            <div class="col-md-3 section text-center">
                <div class="card" style="border-radius: 20px; box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.75);">
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: 14px;"><? #= $judulCard[$i]; 
                                                                        ?></h3>
                        <h4 class="card-subtitle mb-2 text-muted mt-2 font-size: 14px;"><? #= $volumeCard[$i]; 
                                                                                        ?></h4>
                    </div>
                </div>
            </div>
        <? #php endfor; 
        ?>
    </div> -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-md-10">
                <h2>Transaksi Pemesanan Service</h2>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <form id="pemesanan" action="/Service/save" method="post">
                    <input type="hidden" id="jumlah-form-service" value="1">
                    <input type="hidden" name="tanggalPemesanan" value="<?= date('Y-m-d'); ?>">
                    <input type="hidden" id="kodetransaksi" name="kodetransaksi" value="<?= $kodetransaksi; ?>">
                    <!-- <input type="hidden" id="totalService1" name="totalService[]" value="30000"> -->
                    <div class="form-group row">
                        <label for="namaPelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" id="namaPelanggan1" name="namaPelanggan"> -->
                            <select name="" id="" class="form-control">
                                <?php foreach ($pelanggan as $item) { ?>
                                    <option value=""><?= $item->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- <label for="alamat" class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="noTelepon" name="noTelepon">
                        </div> -->
                        <label for="jenisPesan" class="col-sm-2 col-form-label font-weight-bold">Jenis Pesan</label>
                        <div class="col-md-3">
                            <select class="custom-select mr-sm-2" id="jenisPesan" name="jenisPesan[]">
                                <option id="Online" value="Online">Online</option>
                                <option id="Offline" value="Offline">Offline</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label" style="margin-top: -1rem;">Alamat</label>
                        <div class="col-sm-3" style="margin-top: -1rem;">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>

                        <label for="jenisPelayanan" class="col-sm-2 col-form-label font-weight-bold" style="margin-top: -1rem;">Jenis Pelayanan</label>
                        <div class="col-md-3">
                            <select class="custom-select mr-sm-2" id="jenisPelayanan" name="jenisPelayanan[]" style="margin-top: -1rem;">
                                <option id="Onsite" value="Onsite">Onsite</option>
                                <option id="Dirumah" value="Dirumah">Dirumah</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label" style="margin-top: -1rem;">No. Telepon</label>
                        <div class="col-sm-3" style="margin-top: -1rem;">
                            <input type="number" class="form-control" id="noTelepon" name="noTelepon">
                        </div>

                        <label for="jenisPelayanan" class="col-sm-2 col-form-label font-weight-bold" style="margin-top: -1rem;">Nama Karyawan</label>
                        <div class="col-md-3">
                            <select name="karyawan" id="karyawan" class="form-control">
                                <?php foreach ($karyawan as $item) { ?>
                                    <option value=""><?= $item->namaKaryawan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="subTotal">Diskon</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control col" id="diskon" name="diskon[]" min="0" max="100" value="0" data-type="currency" style="text-align: right;">
                        </div>
                    </div>
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
                                <button type="button" id="tambahJenisService" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-plus"></i> Jenis Service
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-md" id="calculationPemesanan">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Jenis Service</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="insert-form-service1">
                            <tr class="line_items_pemesanan">
                                <td>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto my-1">
                                            <label class="mr-sm-2 sr-only" for="jenisService">Preference</label>
                                            <select class="custom-select mr-sm-2" id="jenisService1" name="jenisService[]" style="text-transform: capitalize;">
                                                <?php foreach ($dataJenisService->getResult() as $row) : ?>
                                                    <option value="<?= $row->jenisService; ?>" style="text-transform: capitalize;"><?= $row->jenisService; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="text" class="form-control text-right" id="pricePemesanan" name="pricePemesanan[]">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <input type="hidden" class="form-control text-right totalservice" id="totalservice" name="totalService[]" value="" jAutoCalc="{#pricePemesanan}" readonly>
                                <td>
                                    <button class="btn btn-primary row-add-pemesanan mt-2" type="button" name="tambahData" id="tambahData">Add <i class="fas fa-plus"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group row justify-content-end">
                        <label class="col-sm-2 col-form-label" for="subTotal">Sub Total</label>
                        <div class="col-sm-2">
                            <input id="subTotal" type="number" name="sub_total" class="form-control" value="" jAutoCalc="SUM({.totalservice})" style="text-align: right;">
                        </div>
                    </div>
                    <div class="form-group row justify-content-end" style="margin-top: -1rem;">
                        <label class="col-sm-2 col-form-label" for="subTotal">Total</label>
                        <div class="col-sm-2">
                            <input type="number" name="tax_total" class="form-control" value="" jAutoCalc="{sub_total} * ((100-{#diskon})/100)" style="text-align: right;">
                        </div>
                    </div>
                    <div class="col-2"><button class="btn btn-success" type="submit" name="simpan-pesanan" onclick="return confirm('Apakah anda yakin?')">Simpan Pemesanan</button></div>
                    <div class="row d-flex justify-content-end mt-3">
                        <div class="col-10"></div>
                        <!-- <div class="col-2"><button class="btn btn-success" type="submit" name="simpan-pesanan" onclick="return confirm('Apakah anda yakin?')">Simpan Pemesanan</button></div> -->
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
        <h5 class="modal-title" id="exampleModalLabel">Jenis Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/Service/saveJenisService" method="post">
        <div class="modal-body">
            <div class="form-group row">
                <label for="tambahService" class="col-sm-4 col-form-label">Jenis Service</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tambahService" name="jenisService" style="text-transform: capitalize;">
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