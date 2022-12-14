<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masterdata Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user/dashboard/masterdata/jenis_service/save" method="post" id="form-tambah">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="id_aset" class="col-sm-3 col-form-label">Jenis Service</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jenisService" name="jenisService">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_aset" class="col-sm-3 col-form-label">Harga Service</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="harga_service" name="harga_service" data-type="currency">
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