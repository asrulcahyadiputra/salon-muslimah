<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg" style="background: linear-gradient(to right, #9fa5d5, #e8f5c8);"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form action="" method="post" class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" style="color: #616161;">
                            <div class="d-sm-none d-lg-inline-block " style="color: #616161;"><span style="margin-left: -3.2rem;"><?= user()->username; ?></span></div>
                            <img alt="image" src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" class="rounded-circle mr-1">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('/user'); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar" style="background-color: #6e60a3;">
                <aside id="sidebar-wrapper" style="background:#6e60a3;">
                    <div class="sidebar-brand mb-5">
                        <a href="index.html" class="text-white">Sistem Informasi</a>
                        <h1 class="display-4 text-white" style="font-size: 16px; margin-top:-13px; ">Salon Muslimah DPM</h1>
                        <hr>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html" class="text-white">SI</a>
                    </div>
                    <ul class="sidebar-menu" style="background:#6e60a3;">
                        <li class="menu-header text-white">User Profile</li>
                        <li><a class="nav-link text-white" href="<?= base_url('/user'); ?>"><i class="far fa-user"></i> <span>My Profile</span></a></li>
                        <li><a class="nav-link text-white" href="<?= base_url('/user/edit/' . user()->id); ?>"><i class="fas fa-user-edit"></i> <span>Edit Profile</span></a></li>
                    </ul>
                    <ul class="sidebar-menu" style="background:#6e60a3;">
                        <li class="menu-header text-white">Dashboard</li>
                        <li><a class="nav-link text-white" href="<?= base_url('/user/dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

                    </ul>
                    <ul class="sidebar-menu" style="background:#6e60a3;">
                        <li class="menu-header text-white">Menu</li>
                        <?php if (in_groups('pemilik') || in_groups('admin2')) : ?>
                            <li class="nav-item dropdown" style="background-color: #6e60a3;">
                                <a href="#" class="nav-link has-dropdown text-white" data-toggle="dropdown" style="background-color: #6e60a3;"><i class="fas fa-concierge-bell"></i> <span>Masterdata</span></a>
                                <ul class="dropdown-menu" style="background-color: #6e60a3;">
                                    <li><a class="nav-link text-white" href="/user/dashboard/masterdata/aset" style="background-color: #6e60a3;">Aset</a></li>
                                    <li><a class="nav-link text-white" href="/user/dashboard/masterdata/pelanggan" style="background-color: #6e60a3;">Pelanggan</a></li>
                                    <li><a class="nav-link text-white" href="/user/dashboard/masterdata/satuan" style="background-color: #6e60a3;">Satuan</a></li>
                                    <li><a class="nav-link text-white" href="/user/dashboard/masterdata/product" style="background-color: #6e60a3;">Product</a></li>
                                    <li><a class="nav-link text-white" href="/user/dashboard/masterdata/kategori" style="background-color: #6e60a3;">Kategori</a></li>
                                    <li><a class="nav-link text-white" href="/user/dashboard/masterdata/jabatan" style="background-color: #6e60a3;">Jabatan</a></li>
                                    <li><a class="nav-link text-white" href="/user/dashboard/masterdata/jenis_service" style="background-color: #6e60a3;">Jenis Service</a></li>
                                    <li><a class="nav-link text-white" href="/user/dashboard/pencatatan-kas/akun" style="background-color: #6e60a3;">Akun</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (in_groups('pemilik') || in_groups('admin2')) : ?>
                            <li class="nav-item dropdown" style="background-color: #6e60a3;">
                                <a href="#" class="nav-link has-dropdown text-white" data-toggle="dropdown" style="background-color: #6e60a3;"><i class="fas fa-concierge-bell"></i> <span>Transaksi</span></a>
                                <ul class="dropdown-menu" style="background-color: #6e60a3;">

                                    <li><a class="nav-link text-white" href="<?= base_url('user/transaksi/service') ?>" style="background-color: #6e60a3;">Service</a></li>

                                    <li><a class="nav-link text-white" href="/user/transaksi/penjualan" style="background-color: #6e60a3;">Penjualan Product</a></li>

                                    <li><a class="nav-link text-white" href="/user/transaksi/pembelian" style="background-color: #6e60a3;">Pembelian Bahan</a></li>

                                    <li><a class="nav-link text-white" href="/user/transaksi/pengeluaranAset" style="background-color: #6e60a3;">Pembelian Aset</a></li>
                                    <li>
                                        <a class="nav-link text-white" href="<?= base_url('user/dashboard/penggajian') ?>" style="background-color: #6e60a3;">Penggajian</a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white" href="/user/dashboard/pencatatan-kas/pengeluaran/beban" style="background-color: #6e60a3;">Beban</a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white" href="/user/dashboard/pencatatan-kas/pengeluaran/lainnya" style="background-color: #6e60a3;">Transaksi Lainnya</a>
                                    </li>

                                </ul>

                            </li>
                        <?php endif; ?>


                        <?php if (in_groups('pemilik')) : ?>
                            <li class="nav-item dropdown" style="background-color: #6e60a3;">
                                <a href="#" class="nav-link has-dropdown text-white" data-toggle="dropdown" style="background-color: #6e60a3;"><i class="fas fa-clipboard"></i> <span>Laporan</span></a>
                                <ul class="dropdown-menu" style="background-color: #6e60a3;">
                                    <li class="nav-item dropdown" style="background-color: #6e60a3;">
                                        <a class=" nav-link text-white" href="/user/dashboard/laporan" style="background-color: #6e60a3;">
                                            <span>Laporan Keuangan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown" style="background-color: #6e60a3;">
                                        <a class=" nav-link text-white" href="/user/dashboard/laporan/stok" style="background-color: #6e60a3;">
                                            <span>History Stok</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (in_groups('pemilik') || in_groups('admin2') || in_groups('admin')) : ?>
                            <li class="nav-item dropdown" style="background-color: #6e60a3;">
                                <a class=" nav-link text-white" href="/user/dashboard/absensi" style="background-color: #6e60a3;">
                                    <i class=" fas fa-columns"></i>
                                    <span>Absensi Karyawan</span>
                                </a>
                            </li>
                        <?php endif ?>

                        <?php if (in_groups('customer')) : ?>
                            <li class="nav-item dropdown" style="background-color: #6e60a3;">
                                <a class="nav-link text-white" href="<?= base_url('user/transaksi/service') ?>" style="background-color: #6e60a3;">
                                    <i class="fas fa-bath"></i>
                                    Service
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </aside>
            </div>
        </div>
    </div>