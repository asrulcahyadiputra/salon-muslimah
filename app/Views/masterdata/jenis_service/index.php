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
                <h4>Masterdata Jenis Service</h4>
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
                                <th>No</th>
                                <th>ID</th>
                                <th>Jenis Service</th>
                                <th>Harga Service</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($jenis_service as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->id ?></td>
                                    <td><?= $row->jenisService ?></td>
                                    <td class="text-right"><?= 'Rp ' . number_format($row->harga_service, 2, ',', '.') ?></td>
                                    <td>
                                        <button data-id="<?= $row->id ?>" data-jenis_service="<?= $row->jenisService ?>" data-harga_service="<?= $row->harga_service ?>" data-toggle="modal" data-target="#edit" class="btn btn-warning edit">Edit</button>
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
<?= $this->include('masterdata/jenis_service/add'); ?>
<?= $this->include('masterdata/jenis_service/edit'); ?>
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
        var id = $(this).data('id');
        var jenisService = $(this).data('jenis_service');
        var harga_service = $(this).data('harga_service');

        $(".modal-body #id").val(id);
        $(".modal-body #jenisService").val(jenisService);
        $(".modal-body #harga_service").val(harga_service);
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
            jenisService: {
                required: true
            },
            harga_service: {
                required: true
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
            jenisService: {
                required: true
            },
            harga_service: {
                required: true
            }

        },
        submitHandler: function(form, event) {
            $('#form-edit').submit();
        }
    });
</script>