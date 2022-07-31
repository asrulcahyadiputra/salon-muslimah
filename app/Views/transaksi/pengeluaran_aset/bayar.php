<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Transaksi/savepengeluaranAset') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="id_transaksi_bayar" name="id_transaksi_bayar">
                    <div class="form-group row">
                        <label for="supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="supplier" name="supplier" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_pembayaran" class="col-sm-4 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-8">
                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" required>
                                <option value="Tunai">Tunai</option>
                            </select>
                        </div>
                    </div>

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
                                <input type="number" id="jumlah_bayar" name="jumlah_bayar" class="form-control">
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