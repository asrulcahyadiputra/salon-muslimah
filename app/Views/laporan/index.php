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
                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="section" style="background-color: white; padding: 2rem; box-shadow: 1px 2px 3px 1px rgba(0,0,0,0.75); border-radius: 15px;">
        <div class="row" style="font-size: 20px;">
            <div class="col-md-6">
                <h3>Jurnal Umum</h3>
                <p>
                    Laporan ini untuk mengukur kas yang telah dihasilkan atau digunakan oleh suatu perusahaan dan menunjukkan detail pergerakannya dalam suatu periode.
                </p>
                <a class="btn btn-secondary" href="/user/dashboard/laporan/jurnal-umum">Lihat Laporan</a>
            </div>
            <div class="col-md-6">
                <h3>Buku Besar</h3>
                <p>
                    Laporan ini menampilkan semua transaksi yang telah dilakukan untuk suatu periode. Laporan ini bermanfaat jika anda memerlukan daftar kronologis untuk semua transaksi yang telah dilakukan oleh perusahaan anda.
                </p>
                <a class="btn btn-secondary" href="/user/dashboard/laporan/buku-besar">Lihat Laporan</a>
            </div>
        </div>

        <div class="row mt-4" style="font-size: 20px;">
            <div class="col-md-6">
                <h3>Laba Rugi</h3>
                <p>
                    Menampilkan setiap tipe transaksi dan jumlah total untuk pendapatan dan pengeluaran anda.
                </p>
                <a class="btn btn-secondary" href="/user/dashboard/laporan/laba-rugi">Lihat Laporan</a>
            </div>
            <div class="col-md-6">
                <h3>Neraca</h3>
                <p>
                    Menampilkan apa yang anda miliki(aset), apa yang anda hutang(liabilitas), dan apa yang sudah anda investasikan pada perusahaan anda (ekuitas).
                </p>
                <a class="btn btn-secondary" href="/user/dashboard/laporan/neraca">Lihat Laporan</a>
            </div>
        </div>

        <div class="row mt-4" style="font-size: 20px;">
            <div class="col-md-6">
                <h3>Laporan Perubahan Modal</h3>
                <p>
                    Laporan ini untuk mengukur kas yang telah dihasilkan atau digunakan oleh suatu perusahaan dan menunjukkan detail pergerakannya dalam suatu periode.
                </p>
                <a class="btn btn-secondary" href="/user/dashboard/laporan/perubahan-modal">Lihat Laporan</a>
            </div>
            <div class="col-md-6">
                <h3>Arus Kas</h3>
                <p>
                    Laporan ini menampilkan semua transaksi yang telah dilakukan untuk suatu periode. Laporan ini bermanfaat jika anda memerlukan daftar kronologis untuk semua transaksi yang telah dilakukan oleh perusahaan anda.
                </p>
                <a class="btn btn-secondary" href="<?= base_url('/user/dashboard/laporan/arus-kas') ?>">Lihat Laporan</a>
            </div>
        </div>
    </section>
</div>