<?= $this->extend('layout/template') ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php $this->section('content') ?>
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4">Data Kotak Saran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Kotak Saran</li>
        </ol>
        <div class="row">
            <div class="col">
                <!-- <button type="button" class="btn btn-sm btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Pesan Ruangan</button> -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        DataTable List Data Kotak Saran
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if (session('level') == 'admin') : ?>
                            <a href="<?= base_url(); ?>/admin/print-saran" class="btn btn-sm btn-info mb-3 mt-2"><i class="fa fa-print mr-2" aria-hidden="true"></i>Print PDF</a>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Saran</th>
                                        <th>Subject</th>
                                        <th>Tanggal Create</th>
                                        <th>Tanggal Update</th>
                                        <th>Created</th>
                                        <th>Progres</th>
                                        <th>Status</th>
                                        <?php if (session('level') == 'admin') : ?>
                                            <th>Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_keluhan as $data) : ?>
                                        <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'helpdesk_keluhan');
                                        // get nama karyawan
                                        $data_karyawan = $data['created'];
                                        // query manual
                                        $query = mysqli_query($conn, "SELECT * FROM guest WHERE kode_guest = '$data_karyawan' ");
                                        // get data booking as array
                                        $data_karyawan = mysqli_fetch_array($query);
                                        // cek status
                                        // create variable class
                                        $class = '';
                                        if ($data['status'] == 'Pengajuan') {
                                            $class = 'bg-secondary';
                                        }
                                        if ($data['status'] == 'Sedang Proses') {
                                            $class = 'bg-warning';
                                        }
                                        if ($data['status'] == 'Approved') {
                                            $class = 'bg-success';
                                        }
                                        if ($data['status'] == 'Selesai') {
                                            $class = 'bg-info';
                                        }
                                        if ($data['status'] == 'Deleted') {
                                            $class = 'bg-danger';
                                        }
                                        ?>
                                        <tr>
                                            <?php if (session('level') == 'admin') : ?>
                                                <td>
                                                    <a href="<?= base_url(); ?>/admin/detail-saran/<?= $data['kode_saran']; ?>"><?= $data['kode_saran']; ?></a>
                                                </td>
                                            <?php endif ?>
                                            <?php if (session('level') == 'karyawan') : ?>
                                                <td>
                                                    <a href="<?= base_url(); ?>/views/detail-saran/<?= $data['kode_saran']; ?>"><?= $data['kode_saran']; ?></a>
                                                </td>
                                            <?php endif ?>
                                            <td><?= $data['subject']; ?></td>
                                            <td><?= $data['tanggal_create']; ?></td>
                                            <td><?= $data['tanggal_update']; ?></td>
                                            <td><?= $data_karyawan['nama_lengkap']; ?></td>
                                            <td><?= $data['progres']; ?> %</td>
                                            <td><span class="badge p-2 <?= $class; ?>"><?= $data['status']; ?></span></td>
                                            <?php if (session('level') == 'admin') : ?>
                                                <?php if ($data['status'] == 'Pengajuan') { ?>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="<?= base_url(); ?>/admin/approve-saran/<?= $data['kode_saran']; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a class="btn btn-sm btn-danger tombol-hapus" href="<?= base_url(); ?>/admin/delete-saran/<?= $data['kode_saran']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td></td>
                                                <?php  } ?>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>