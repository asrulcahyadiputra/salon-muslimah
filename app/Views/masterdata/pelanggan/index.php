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
    <?php if (session()->getFlashdata('sukses')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> <?= session()->getFlashdata('sukses') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row">
            <div class="col-lg-10">
                <h4>Masterdata Pelanggan</h4>
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
                                <th>ID Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat Domisili</th>
                                <th>No. Telp</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pelanggan as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->id_pelanggan ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->alamat ?></td>
                                    <td><?= $row->no_telp ?></td>
                                    <td class="text-center">
                                        <button data-id_pelanggan="<?= $row->id_pelanggan ?>" data-nama="<?= $row->nama ?>" data-alamat="<?= $row->alamat ?>" data-telp="<?= $row->no_telp ?>" data-toggle="modal" data-target="#editForm" class="btn btn-warning edit">Edit</button>
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
<?= $this->include('masterdata/pelanggan/add'); ?>
<?= $this->include('masterdata/pelanggan/edit'); ?>
<script src="<?= base_url('/js/vanilla-tilt.js'); ?>"></script>
<script src="<?= base_url() ?>/validate/jquery.validate.min.js"></script>
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

    $(document).on("click", ".edit", function() {
        var id = $(this).data('id_pelanggan');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var telp = $(this).data('telp');
        $("#editForm #id_pelanggan").val(id);
        $("#editForm #nama_pelanggan").val(nama);
        $("#editForm #alamat_domisili").val(alamat);
        $("#editForm #no_telp").val(telp);
    });

    $('#form-tambah').validate({
        errorClass: "control-label",
        highlight: function(element, errorClass) {
            $(element).parent().addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parent().removeClass('error');
        },
        rules: {
            nama_pelanggan: {
                required: true
            },
            alamat_domisili: {
                required: true
            },
            no_telp: {
                number: true,
                required: true,
                minlength: 6,
                maxlength: 13
            }

        },
        submitHandler: function(form, event) {
            $('#form-tambah').submit();
        }
    });

    $('#form-edit').validate({
        errorClass: "control-label",
        highlight: function(element, errorClass) {
            $(element).parent().addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parent().removeClass('has-error');
        },
        rules: {
            nama_pelanggan: {
                required: true
            },
            alamat_domisili: {
                required: true
            },
            no_telp: {
                number: true,
                required: true,
                minlength: 6,
                maxlength: 13
            }
        },
        submitHandler: function(form, event) {
            $('#form-edit').submit();
        }
    });
</script>