<div class="modal fade" id="ambilstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ambil Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Transaksi/saveStok')?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-4 col-form-label">ID Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="karyawan" class="col-sm-4 col-form-label">Karyawan</label>
                        <div class="col-sm-8">
                            <select name="karyawan" id="karyawan" class="form-control">
                                <?php foreach ($karyawan as $key => $value) { ?>
                                <option value="<?= $value->idKaryawan ?>"><?= $value->namaKaryawan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    
                    <table class="table table-bordered" id="stoktable">
                        <thead>
                            <tr>
                                <th>Bahan</th>
                                <th>Qty</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="bahan[]" id="bahan1" class="form-control">
                                        <option value="">-</option>
                                        <?php foreach ($bahan as $key => $value) { ?>
                                        <option value="<?= $value->id_product ?>"><?= $value->nama_product ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" min="1" name="qty[]" id="qty1" class="form-control">
                                </td>
                                <td>
                                    <button type="button" class="tambah">Tambah</button>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>