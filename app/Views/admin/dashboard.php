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
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <?php if (in_groups('pemilik') || in_groups('admin') || in_groups('admin2')) : ?>
        <div class="row">
            <section class="section col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="font-weight: bold;" id="basic-addon1">Periode</span>
                    </div>
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </section>
        </div>
        <div class="row">
            <section class="col-md-6 section">
                <!-- <div class="section-header" style="display: inline-block; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;"> -->
                <div class="section-header card" style="
                background: rgba(255, 255, 255, 0);
                border-radius: 15px;
                backdrop-filter: blur(1.2px);
                -webkit-backdrop-filter: blur(1.2px);
                border: 1px solid rgba(255, 255, 255, 0.29);
                box-shadow: 1px 4px 5px 3px rgba(0,0,0,0.75);
                ">
                    <!-- min-height: 535px; -->
                    <h4 class="text-center mb-5" style="font-size: 20px; text-transform: uppercase;">Info Penjualan Produk</h4>
                    <div class="row" style="margin-top: -15px;">
                        <?php foreach ($dataPembelianProduk->getResult() as $row) : ?>
                            <div class="col-xl-6">
                                <div class="card info_card box-product mb-3" style="max-width: 540px; background-color:#eaeaea; border-radius:20px; box-shadow: 0px 24px 10px -20px rgba(0,0,0,0.75);">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <img src="/img/skincare.jpg" alt="...">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body" style="margin-left: 10px;">
                                                <h5 class="card-title mt-2 display-3" style="font-size: 14px;"><?= $row->namaProduk; ?></h5>
                                                <p class="card-text" style="font-size: 12px; margin-top:-10px;"><?= $row->jumlahProduk; ?> Pcs Terjual</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </section>
            <section class="col-md-6 section">
                <!-- <div class="section-header" style="display: inline-block; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;"> -->
                <div class="section-header card" style="
                background: rgba(255, 255, 255, 0);
                border-radius: 15px;
                backdrop-filter: blur(1.2px);
                -webkit-backdrop-filter: blur(1.2px);
                border: 1px solid rgba(255, 255, 255, 0.29);
                box-shadow: 1px 4px 5px 3px rgba(0,0,0,0.75);
                ">
                    <h4 class="text-center mb-5" style="font-size: 20px; text-transform: uppercase;">Info Service</h4>
                    <div class="row" style="margin-top: -15px;">
                        <?php foreach ($dataPemesananService->getResult() as $row) : ?>
                            <div class="col-xl-6">
                                <div class="card info_card box-product mb-3" style="max-width: 540px; background-color:#eaeaea; border-radius:20px; box-shadow: 0px 24px 10px -20px rgba(0,0,0,0.75);">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <img src="/img/skincare.jpg" alt="...">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body" style="margin-left: 10px;">
                                                <h5 class="card-title mt-2 display-3" style="font-size: 14px;"><?= $row->jenisService; ?></h5>
                                                <p class="card-text" style="font-size: 12px; margin-top:-10px">Ny. Rani</p>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <p class="card-text" style="font-size: 7.5px; margin-top:-10px"><?= $row->tanggalPembayaran; ?></p>
                                                    </div>
                                                    <div class="col-5">
                                                        <p class="card-text" style="font-size: 7.5px; margin-top:-10px"><?= $row->jenisPelayanan; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </section>
        </div>
    <?php endif ?>

    <?php if (in_groups('customer')) : ?>
        <div class="row">
            <section class="section col-md-12">
                <h4>Selamat Datang</h4>
            </section>
        </div>
    <?php endif ?>
</div>
<script src="<?= base_url('/js/vanilla-tilt.js'); ?>"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelectorAll(".info_card"), {
        max: 25,
        speed: 4300,
        glare: true,
        "max-glare": 1,
    });
</script>