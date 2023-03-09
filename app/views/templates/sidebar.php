
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3"><?= $data['title']?></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    spp
                </div>
                <?php if($_SESSION['user']['role'] == 'admin' || 'petugas') {?>
                <li class="nav-item <?= routeUrl('transaski') ? 'active' : ''?>">
                    <a class="nav-link" href="<?= BASE_URL?>/transaksi">
                        <i class="fas fa-fw fa-graduation-cap"></i>
                        <span>Transaksi</span></a>
                </li>

                
                <?php }?>
                
                <li class="nav-item <?= routeUrl('historyTransaksi') ? 'active' : ''?>">
                    <a class="nav-link" href="<?= BASE_URL?>/historyTransaksi">
                        <i class="fas fa-fw fa-graduation-cap"></i>
                        <span>History Transaksi</span></a>
                </li>
                <?php if($_SESSION['user']['role'] == 'admin') { ?>
                <!-- Nav Item - Charts -->
                <li class="nav-item <?= routeUrl('siswa') ? 'active' : ''?>">
                    <a class="nav-link" href="<?= BASE_URL?>/siswa">
                        <i class="fas fa-fw fa-graduation-cap"></i>
                        <span>Siswa</span></a>
                </li>
                <?php }?>
                <!-- Nav Item - Charts -->
                <li class="nav-item <?= routeUrl('kelas') ? 'active' : ''?>">
                    <a class="nav-link" href="<?= BASE_URL?>/kelas">
                        <i class="fas fa-fw fa-graduation-cap"></i>
                        <span>Kelas</span></a>
                </li>

                <li class="nav-item <?= routeUrl('petugas') ? 'active' : ''?>">
                    <a class="nav-link" href="<?= BASE_URL?>/petugas">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Petugas</span></a>
                </li>
                <!-- Nav Item - Tables -->
                <li class="nav-item <?= routeUrl('pembayaran') ? 'active' : ''?>">
                    <a class="nav-link" href="<?= BASE_URL?>/pembayaran">
                        <i class="fas fa-fw fa-credit-card"></i>
                        <span>Pembayaran</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>