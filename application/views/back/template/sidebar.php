<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/images/profile/' . $this->session->image_user); ?>" class="img-circle elevation-2">

            </div>
            <div class=" info">
                <a href="#" class="d-block">
                    <?= $this->session->username; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <?php if (is_it()) { ?>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('dashboard') ?>" class="nav-link <?php echo uri_string() == 'dashboard' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Data Master</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-id-badge"></i>
                            <p>Master Pakar
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('penyakit') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Penyakit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('gejala') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Gejala</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('pengetahuan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pengetahuan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Laporan Tiket</li>
                    <li class="nav-item">
                        <a href="<?= base_url('laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Laporan</p>
                        </a>
                    </li>


                    <li class="nav-header">Profile</li>
                    <li class="nav-item">
                        <a href="<?= base_url('karyawan/profile/' . $this->session->id_users); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profile User</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Log out</p>
                        </a>
                    </li>

                <?php } else { ?>


                    <!-- <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Master Tiket
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('tiket') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Tiket</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Laporan Tiket</li>
                    <li class="nav-item">
                        <a href="<?= base_url('laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Laporan</p>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a href="<?php echo base_url('konsultasi') ?>" class="nav-link <?php echo str_contains(uri_string(), 'konsultasi') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Konsultasi</p>
                        </a>
                    </li>

                    <li class="nav-header">Profile</li>
                    <li class="nav-item">
                        <a href="<?= base_url('karyawan/profile/' . $this->session->id_users); ?>" class="nav-link <?php echo str_contains(uri_string(), 'karyawan/profile') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profile User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Log out</p>
                        </a>
                    </li>

                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>