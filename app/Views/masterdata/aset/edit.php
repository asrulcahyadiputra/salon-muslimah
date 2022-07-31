<div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masterdata Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user/dashboard/masterdata/aset/update" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="id_aset" class="col-sm-3 col-form-label">ID Aset</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="id_aset" name="id_aset" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_aset" class="col-sm-3 col-form-label">Nama Aset</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_aset" name="nama_aset">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_aset" class="col-sm-3 col-form-label">Jenis Aset</label>
                        <div class="col-sm-9">
                            <select name="jenis_aset" id="jenis_aset" class="form-control">
                                <option value="Aset Lancar">Aset Lancar</option>
                                <option value="Aset Tetap">Aset Tetap</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_aset" class="col-sm-3 col-form-label">Harga Aset</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="harga_aset" name="harga_aset" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <select name="satuan" id="satuan" class="form-control">
                                <?php foreach ($satuan as $item) {
                                    echo '<option value="' . $item->keterangan . '">' . $item->keterangan . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>