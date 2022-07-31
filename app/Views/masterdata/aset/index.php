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
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-lg-10">
                <h4>Masterdata Aset</h4>
            </div>
            <div class="col-lg-2">
                <a class="btn btn-info" href="#add" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg mt-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tablemenu">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>ID Aset</th>
                                <th>Nama Aset</th>
                                <th>Jenis Aset</th>
                                <th class="text-right">Harga Aset</th>
                                <th>Satuan</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($aset as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->id_aset ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->jenis_aset ?></td>
                                    <td class="text-right"><?= number_format($row->harga, 2, ',', '.') ?></td>
                                    <td><?= $row->satuan ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm" id="btn-edit" data-id="<?= $row->id_aset ?>"> Edit</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->include('masterdata/aset/add'); ?>
<?= $this->include('masterdata/aset/edit'); ?>
<script src="<?= base_url('/js/vanilla-tilt.js'); ?>"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelectorAll(".info_card"), {
        max: 25,
        speed: 4300,
        glare: true,
        "max-glare": 1,
    });
</script>
<script>
    $(document).ready(function() {
        $("#tablemenu").DataTable();
    });

    $('#tablemenu').on('click', '#btn-edit', function() {
        let id_aset = $(this).attr('data-id');

        // console.log("edit data " + id_aset);

        editData(id_aset);
    });

    const editData = (id_aset) => {
        $.ajax({
            type: 'get',
            url: '<?= base_url("user/dashboard/masterdata/aset") ?>/' + id_aset,
            dataType: 'json',
            success: (res) => {
                // console.log(res);
                $('#editForm #id_aset').val(res.id_aset);
                $('#editForm #nama_aset').val(res.nama);
                $('#editForm #jenis_aset').val(res.jenis_aset);
                $('#editForm #harga_aset').val(res.harga);
                $('#editForm #satuan').val(res.satuan);
                $('#editForm').modal('show');
            }
        });
    }
</script>