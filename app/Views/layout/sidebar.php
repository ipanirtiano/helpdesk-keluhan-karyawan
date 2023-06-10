<div id="layoutSidenav">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- jika yang login adalah admin -->
                    <?php if (session('level') == 'admin') : ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('/views'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>



                        <a class="nav-link" href="<?= base_url(); ?>/admin/data-keluhan">
                            <div class="sb-nav-link-icon"><i class="fa fa-clipboard mr-1" aria-hidden="true"></i></div>
                            Data Keluhan
                        </a>
                        <a class="nav-link" href="<?= base_url(); ?>/admin/data-saran">
                            <div class="sb-nav-link-icon"><i class="fa fa-clipboard mr-1" aria-hidden="true"></i></div>
                            Data Saran
                        </a>

                        <a class="nav-link" href="<?= base_url(); ?>/admin/departemen">
                            <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            Departemen
                        </a>

                        <a class="nav-link" href="<?= base_url(); ?>/admin/users">
                            <div class="sb-nav-link-icon"><i class="fa fa-user mr-1" aria-hidden="true"></i></div>
                            Data Karyawan
                        </a>


                        <div class="sb-sidenav-menu-heading">_______________________________</div>



                    <?php endif; ?>
                    <!-- akhir sidebar admin -->

                    <!-- jika yang login adalah guest -->
                    <?php if (session('level') == 'karyawan') : ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('/views'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="<?= base_url(); ?>/views/buat-keluhan">
                            <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                            Buat Keluhan
                        </a>

                        <a class="nav-link" href="<?= base_url(); ?>/views/buat-saran">
                            <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                            Masukan Saran
                        </a>

                        <?php if (session('level') == 'admin') : ?>
                            <a class="nav-link" href="<?= base_url(); ?>/views/data-keluhan">
                                <div class="sb-nav-link-icon"><i class="fa fa-clipboard mr-1" aria-hidden="true"></i></div>
                                Data Keluhan
                            </a>
                        <?php endif; ?>

                        <?php if (session('level') == 'karyawan') : ?>
                            <a class="nav-link" href="<?= base_url(); ?>/views/data-keluhan-karyawan/<?= session('kode_guest'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-clipboard mr-1" aria-hidden="true"></i></div>
                                Data Keluhan
                            </a>
                        <?php endif; ?>


                        <?php if (session('level') == 'admin') : ?>
                            <a class="nav-link" href="<?= base_url(); ?>/views/data-saran">
                                <div class="sb-nav-link-icon"><i class="fa fa-clipboard mr-1" aria-hidden="true"></i></div>
                                Data Saran
                            </a>
                        <?php endif; ?>

                        <?php if (session('level') == 'karyawan') : ?>
                            <a class="nav-link" href="<?= base_url(); ?>/views/data-saran-karyawan/<?= session('kode_guest'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-clipboard mr-1" aria-hidden="true"></i></div>
                                Data Saran
                            </a>
                        <?php endif; ?>


                    <?php endif; ?>
                    <!-- akhir sidebar guest -->


                    <!-- jika yang login adalah manager -->
                    <?php if (session('level') == 'manager') : ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= base_url('/views'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php $tanggal = date('d-m-Y'); ?>
                        <?php $date_encode = base64_encode($tanggal); ?>
                        <a class="nav-link" href="<?= base_url(); ?>/views/list-booking/<?= $date_encode; ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                            Pesan Ruangan
                        </a>

                        <?php $kode_guest = base64_encode(session('kode_guest')) ?>
                        <a class="nav-link" href="<?= base_url(); ?>/views/my-booking/<?= $kode_guest; ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-desktop" aria-hidden="true"></i></div>
                            My Booking
                        </a>


                        <a class="nav-link" href="<?= base_url(); ?>/views/report">
                            <div class="sb-nav-link-icon"><i class="fa fa-print" aria-hidden="true"></i></div>
                            Report
                        </a>
                    <?php endif; ?>
                    <!-- akhir sidebar manager -->

                    <a class="nav-link" href="<?= base_url(); ?>/views/update-password">
                        <div class="sb-nav-link-icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                        Update Password
                    </a>

                    <a class="nav-link tombol-logout" href="<?= base_url('auth/logout'); ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-power-off icon-label" aria-hidden="true"></i></div>
                        Logout
                    </a>


                </div>
            </div>
        </nav>
    </div>

    <?= $this->renderSection('content'); ?>

</div>