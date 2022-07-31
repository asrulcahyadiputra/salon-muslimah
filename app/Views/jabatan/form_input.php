<form action="<?= base_url('jabatan/proses_tambah') ?>" class="formjabatan" id="form-tambah" method="POST">
	<div class="form-group mb-3">
		<label class="form-label">ID jabatan</label>
		<input type="text" name="id_jabatan" placeholder="Masukkan ID jabatan" value="<?php echo $id_jabatan; ?>" autocomplete="off" class="form-control" readonly>
	</div>
	<div class="form-group mb-3">
		<label class="form-label">Nama jabatan</label>
		<input type="text" name="nama_jabatan" placeholder="Masukkan Nama jabatan" autocomplete="off" class="form-control" required>
	</div>

	
	<div class="form-group mb-3">
		<label class="form-label"><strong>Gaji</strong></label>
		<input type="text" name="gaji" placeholder="Masukkan Gaji" autocomplete="off" class="form-control" required>
	</div>
	<div class="mb-3">

		<button type="submit" class="btn btn-primary w-100">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
				<path stroke="none" d="M0 0h24v24H0z" fill="none" />
				<line x1="10" y1="14" x2="21" y2="3" />
				<path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
			</svg>
			&nbsp;&nbsp;Simpan</button>
		<!-- <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Batal</button> -->
	</div>
</form>
</div>

<script>
	$(function() {
		$('.formjabatan').bootstrapValidator({
			fields: {
				id_jabatan: {
					message: 'ID jabatan Tidak Valid!',
					validators: {
						notEmpty: {
							message: 'ID jabatan Harus diisi!'
						},
						stringLength: {
							min: 3,
							max: 100,
							message: 'Masukkan karakter kurang dari 100 kata dan lebih dari 4 kata'
						}
					}
				},
				nama_jabatan: {
					message: 'Nama jabatan Tidak Valid!',
					validators: {
						notEmpty: {
							message: 'Nama jabatan Harus diisi!'
						},
						stringLength: {
							min: 3,
							max: 100,
							message: 'Masukkan karakter kurang dari 100 kata dan lebih dari 4 kata'
						}
					}
				},
			
				gaji: {
					message: 'gaji  Harus Diisi!',
					validators: {
						notEmpty: {
							message: 'gaji  Harus diisi!'
						},
						stringLength: {
							min: 1,
							max: 12,
							message: 'Nomor telepon tidak valid'
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Isi hanya dengan angka'
						}

					}
				},

			}
		});
	});
</script>