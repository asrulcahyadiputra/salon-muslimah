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
                <h4>Masterdata Product</h4>
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
                                <th align="center">No</th>
                                <th align="center">ID Product</th>
                                <th align="center">Nama Product</th>
                                <th align="center">Merk</th>
                                <th align="center">Satuan</th>
                                <th align="center">Kategori</th>
                                <th class="text-center"">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($product as $item) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item->id_product ?></td>
                                    <td><?= $item->nama_product ?></td>
                                    <td><?= $item->merk ?></td>
                                    <td><?= $item->nama_satuan ?></td>
                                    <td><?= $item->kategori ?></td>
                               
                                <td class=" text-center">
                                    <a class="btn btn-warning" id="btn-edit" data-id="<?= $item->id_product ?>">Edit</a>
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
<?= $this->include('masterdata/product/add'); ?>
<?= $this->include('masterdata/product/edit'); ?>
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
        let id_product = $(this).attr('data-id');
        editData(id_product);

    });

    const editData = (id_product) => {
        $.ajax({
            type: 'get',
            url: '<?= base_url("user/dashboard/masterdata/product") ?>/' + id_product,
            dataType: 'json',
            success: (res) => {
                $('#modalForm #id_product').val(res.id_product);
                $('#modalForm #nama_product').val(res.nama_product);
                $('#modalForm #harga_satuan').val(res.harga_satuan);
                $('#modalForm #kategori').val(res.id_kategori);
                $('#modalForm #satuan').val(res.satuan);
                $('#modalForm #merk').val(res.merk);
                // $('#modalForm #stok_akhir').val(res.stok_akhir);
                // $('#modalForm #min_stok').val(res.min_stok);
                $('#modalForm').modal('show');
            }
        });
    }
</script>