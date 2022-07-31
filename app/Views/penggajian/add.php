<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proses Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Penggajian/savePenggajian')?>" method="post">
                <div class="modal-body">
                
                    <div class="form-group row">
                        <label for="id_gaji" class="col-sm-4 col-form-label">ID Gaji</label>
                        <div class="col-sm-8">
                            <input type="text" id="id_gaji" name="id_gaji" class="form-control" value="<?= $kode ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl_gaji" class="col-sm-4 col-form-label">Tgl. Penggajian</label>
                        <div class="col-sm-8">
                            <input type="date" id="tgl_gaji" name="tgl_gaji" class="form-control" value="<?= date('Y-m-d')?>" readonly>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="form-group row">
                        <label for="pegawai" class="col-sm-4 col-form-label">Nama Pegawai</label>
                        <div class="col-sm-8">
                            <select name="pegawai" id="pegawai" class="form-control" required>
                                <option value="">-</option>
                                <?php foreach ($pegawai as $key => $value) {
                                    echo '<option value='.$value->idKaryawan.'>'.$value->namaKaryawan.'</option>';
                                }?>
                            </select>
                        </div>
                    </div>

                    <div class="div_detail" style="display: none;">

                        <div class="form-group row">
                            <label for="gapok" class="col-sm-4 col-form-label">Gaji Pokok</label>
                            <div class="col-sm-8">
                                <input type="text" id="gapok" name="gapok" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detail_service" class="col-sm-4 col-form-label">Detail Service</label>
                            <div class="col-sm-4">
                                <input type="" id="bonus" name="bonus" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <i style="font-size: small;">bonus (%)</i>
                            </div>
                            <!-- <div class="col-sm-2">
                                <input type="text" id="jml_service" name="jml_service" class="form-control" readonly>
                                <i style="font-size: small;">jumlah service</i>
                            </div> -->
                            <div class="col-sm-4">
                                <input type="text" id="total_transaksi_service" name="total_transaksi_service" class="form-control" readonly>
                                <i style="font-size: small;">total transaksi service</i>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bonus_service" class="col-sm-4 col-form-label">Bonus Service</label>
                            <div class="col-sm-8">
                                <input type="text" id="bonus_service" name="bonus_service" class="form-control" readonly>
                                <i style="font-size: small;">Note: bonus didapatkan total transaksi service * persentase bonus.</i>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="total_hadir" class="col-sm-4 col-form-label">Detail Kehadiran</label>
                            <div class="col-sm-4">
                                <input type="text" id="total_hadir" name="total_hadir" class="form-control" readonly>
                                <i style="font-size: small;">total kehadiran</i>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" id="biaya" name="biaya" class="form-control" value="5000" readonly>
                                <i style="font-size: small;">bonus kehadiran perhari</i>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tot_bonus_hadir" class="col-sm-4 col-form-label">Bonus Hadir</label>
                            <div class="col-sm-8">
                                <input type="text" id="tot_bonus_hadir" name="tot_bonus_hadir" class="form-control" readonly>
                                <i style="font-size: small;">Note: bonus didapatkan total hadir * bonus kehadiran perhari.</i>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="gaji_bersih" class="col-sm-4 col-form-label">Gaji Bersih</label>
                            <div class="col-sm-8">
                                <input type="text" id="gaji_bersih" name="gaji_bersih" class="form-control" readonly>
                                <i><strong>gaji bersih = gapok + bonus service + (jml hadir * 5000) </strong></i>
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