<?= $this->extend('layout/template') ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php $this->section('content') ?>
<?php if (session('level') == 'admin') : ?>
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body" style="text-align:center">
                            <i class="fa fa-clipboard mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i>
                            <br>Total Keluhan <br>
                            <h5><b><?= $keluhan .  ' ' ?></b></h5>
                        </div>
                        <div class="card-footer d-flex align-items-center 
                        justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/admin/data-keluhan">
                                View Details</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-4">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body" style="text-align:center">
                            <i class="fa fa-user mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i>
                            <br>Data Karyawan <br>
                            <h5><b><?= $pengguna .  ' ' ?></b></h5>
                        </div>
                        <div class="card-footer d-flex align-items-center 
                        justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/admin/users">
                                View Details</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body" style="text-align:center">
                            <i class="fa fa-cog mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i>
                            <br>Data Update Password <br>
                            <h5><b>Update Password</b></h5>
                        </div>
                        <div class="card-footer d-flex align-items-center 
                        justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/views/update-password">
                                View Details</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>




    <!-- jika yang login adalah guest -->
    <?php if (session('level') == 'karyawan') : ?>
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body" style="text-align:center">
                                <i class="fa fa-clipboard mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i>
                                <br>Total Keluhan <br>
                                <h5><b><?= $keluhan .  ' ' ?></b></h5>
                            </div>
                            <div class="card-footer d-flex align-items-center 
                            justify-content-between">
                                <a class="small text-white stretched-link" href="<?= base_url(); ?>/views/data-keluhan-karyawan/<?= session('kode_guest'); ?>">
                                    View Details</a>
                                <div class="small text-white">
                                    <i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-4">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body" style="text-align:center">
                                <i class="fa fa-user mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i>
                                <br>Data Karyawan <br>
                                <h5><b><?= $pengguna .  ' ' ?></b></h5>
                            </div>
                            <div class="card-footer d-flex align-items-center 
                            justify-content-between">
                                <a class="small text-white stretched-link" href="<?= base_url(); ?>/views/users">
                                    View Details</a>
                                <div class="small text-white">
                                    <i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body" style="text-align:center">
                                <i class="fa fa-cog mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i>
                                <br>Data Update Password <br>
                                <h5><b>Update Password</b></h5>
                            </div>
                            <div class="card-footer d-flex align-items-center 
                            justify-content-between">
                                <a class="small text-white stretched-link" href="<?= base_url(); ?>/views/update-password">
                                    View Details</a>
                                <div class="small text-white">
                                    <i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>




    <!-- jika yang login adalah manager -->
    <?php if (session('level') == 'manager') : ?>
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

                <div class="row">
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body" style="text-align:center">
                                <i class="fa fa-building mb-2" aria-hidden="true" style="width: 80px; 
                             height: 80px"></i><br>Ruang Meeting <br>
                                <small><?= $ruangan .  ' ' . 'Room' ?>
                                </small> </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?= base_url(); ?>/views/ruang-meeting">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3">
                        <?php $tanggal = date('d-m-Y'); ?>
                        <?php $date_encode = base64_encode($tanggal); ?>
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body" style="text-align:center"><i class="fa fa-address-book mb-2" aria-hidden="true" style="width: 80px; height: 80px"></i><br>Pesanan Hari Ini
                                <?php $i = 0 ?>
                                <?php foreach ($booking_today as $today) : ?>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                <br><small><?= $i .  ' ' . 'Booking' ?></small>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?= base_url(); ?>/views/list-booking/<?= $date_encode; ?>">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    <?php endif; ?>
    <?php $this->endSection() ?>