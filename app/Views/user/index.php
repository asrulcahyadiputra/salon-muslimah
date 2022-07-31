<style>
    .jam {
        /* margin-top: 10px; */
        font-size: 30px;
        font-weight: 700;
        /* display: block; */
        /* width: auto; */
        /* color: #3498DB; */
    }
</style>
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
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- <div class="row mb-3">
        <div class="col-md-10"></div>
        <div class="col-md-2 jam">
            <div class="jam text-center" style="border-radius: 8px;">
                <span id="jam">00</span>
                <span>:</span>
                <span id="menit">00</span>
                <span>:</span>
                <span id="detik">00</span>
            </div>
        </div>
    </div> -->
    <!-- <div class="alert alert-success col" role="alert">
        <h4 class="alert-heading">Welcome <?= user()->fullname; ?>!</h4>
        <p>Let's Start</p>
    </div> -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome <?= user()->fullname; ?>!</h4>
            <p>Let's Start</p>
        </div>
    <?php endif; ?>
    <div class="row">
        <section class=" col-md-6 section">
            <!-- <div class="card mb-3" style="background-color:#e8e9eb; border-radius:20px; box-shadow: 0px 30px 10px -20px rgba(0,0,0,0.75);"> -->
            <div class="card user_card" style="
                background: rgba(255, 255, 255, 0);
                border-radius: 16px;
                backdrop-filter: blur(1.2px);
                -webkit-backdrop-filter: blur(1.2px);
                border: 1px solid rgba(255, 255, 255, 0.29);
                box-shadow: 1px 4px 5px 3px rgba(0,0,0,0.75);
                ">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center">
                        <img style="width: 80px; height: 80px; margin-top: 40px; border-radius: 50%;" src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" alt="gambar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title" style="text-transform: uppercase;"><?= user()->fullname; ?></h4>
                            <?php if (in_groups('pemilik')) : ?>
                                <h5 class="card-title"><span class="badge badge-warning">Pemilik</span></h5>
                                <p class="card-text">Role Pemilik dapat mengakses semua fitur yang ada pada website.</p>
                            <?php elseif (in_groups('admin') || in_groups('admin2')) : ?>
                                <h5 class="card-title"><span class="badge badge-info">Admin</span></h5>
                                <p class="card-text">Role admin dapat mengakses fitur User Profile, Dashboard, dan Menu (Service&Product, Pencatatan Kas dan Absensi Karyawan).</p>
                            <?php else : ?>
                                <h5 class="card-title"><span class="badge badge-info">Customer</span></h5>
                                <p class="card-text">Role customer dapat mengakses fitur User Profile, Dashboard, dan booking service.</p>
                            <?php endif; ?>

                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="row text-center" style="margin-top: 13rem;">
        <div class="col-sm-9"></div>
        <div class="col-sm-3 jam">
            <div class="jam" style="border-radius: 8px;">
                <span id="jam">00</span>
                <span>:</span>
                <span id="menit">00</span>
                <span>:</span>
                <span id="detik">00</span>
            </div>
        </div>
    </div>
</div>
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>