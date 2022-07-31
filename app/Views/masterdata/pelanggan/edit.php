<div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masterdata Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user/dashboard/masterdata/pelanggan/edit" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="id_pelanggan" class="col-sm-3 col-form-label">ID Pelanggan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat_domisili" class="col-sm-3 col-form-label">Alamat Domisili</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat_domisili" name="alamat_domisili">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-3 col-form-label">No. Telp</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="no_telp" name="no_telp">
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