<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Transaksi/savePenjualan') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="id_transaksi_bayar" name="id_transaksi_bayar">
                    <?php foreach ($detail_penjualan as $row) { ?>
                        <input type="hidden" name="product[]" value="<?= $row->id_product ?>">
                        <input type="hidden" name="qty[]" value="<?= $row->qty ?>">
                    <?php } ?>
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-8">
                            <select name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
                                <option value="">-</option>
                                <?php foreach ($pelanggan as $key => $value) {
                                    echo '<option value=' . $value->nama . '>' . $value->nama . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="jenis_pembayaran" value="Tunai">
                    <!-- <div class="form-group row">
                        <label for="jenis_pembayaran" class="col-sm-4 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-8">
                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" required>
                                <option value="Tunai">Tunai</option>
                            </select>
                        </div>
                    </div> -->

                    <div id="div-bawah" style="display: none;">
                        <hr>

                        <div class="form-group row">
                            <label for="grandtotal" class="col-sm-4 col-form-label">Grandtotal</label>
                            <div class="col-sm-8">
                                <input type="text" name="grandtotal" id="grandtotal" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_bayar" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                            <div class="col-sm-8">
                                <input type="text" id="jumlah_bayar" name="jumlah_bayar" class="form-control">
                                <div id="info"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kembalian" class="col-sm-4 col-form-label">Kembalian</label>
                            <div class="col-sm-8">
                                <input type="text" id="kembalian" name="kembalian" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>