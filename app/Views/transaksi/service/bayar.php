<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembyaran Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Transaksi/bayarService') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-4 col-form-label">ID Bayar</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $kode_bayar ?>" name="id_bayar" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-4 col-form-label">ID Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" readonly>
                        </div>
                    </div>
                    <hr>
                    <!-- <div class="form-group row">
                        <label for="jenis_pembayaran" class="col-sm-4 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-8">
                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" required>
                                <option value="Tunai">Tunai</option>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="jumlah_bayar" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                        <div class="col-sm-8">
                            <input type="text" id="jumlah_bayar" name="jumlah_bayar" class="form-control" data-type="currency">
                            <!-- <input type="text" id="jumlah_bayar" name="jumlah_bayar" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"> -->
                            <div id="info"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_transaksi" class="col-sm-4 col-form-label">Total Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" name="total_transaksi" id="total_transaksi" class="form-control" readonly>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="kembalian" class="col-sm-4 col-form-label">Kembalian</label>
                        <div class="col-sm-8">
                            <input type="text" id="kembalian" name="kembalian" class="form-control" readonly>
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