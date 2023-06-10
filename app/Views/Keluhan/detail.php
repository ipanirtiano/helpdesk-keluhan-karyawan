<?= $this->extend('layout/template') ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php $this->section('content') ?>
<div id="layoutSidenav_content">
    <div class="container-fluid">


        <div class="row">
            <div class="col">
                <h1 class="mt-4">Detail Keluhan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Data Keluhan</li>
                    <li class="breadcrumb-item active">Detail Keluhan</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-envelope-open mr-2" aria-hidden="true"></i> Detail Keluhan
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        <i class="fa  fa-sticky-note mr-2" aria-hidden="true"></i> ID Keluhan : <?= $data_keluhan['kode_keluhan']; ?>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"> <i class="fa fa-list-ul mr-3" aria-hidden="true"></i> <b><?= $data_keluhan['kode_keluhan']; ?></b> </li>
                                            <li class="list-group-item"><i class="fa fa-calendar mr-3" aria-hidden="true"></i> <b><?= $data_keluhan['tanggal_create']; ?> (Created)</b> </li>
                                            <li class="list-group-item"><i class="fa fa-calendar mr-3" aria-hidden="true"></i> <b><?= $data_keluhan['tanggal_update']; ?> (Updated)</b> </li>
                                            <li class="list-group-item"><i class="fa fa-user mr-3" aria-hidden="true"></i> <b><?= $nama['nama_lengkap']; ?> (Submited)</b> </li>
                                            <li class="list-group-item"><i class="fa fa-envelope mr-3" aria-hidden="true"></i> <b><?= $nama['email']; ?></b> </li>
                                            <li class="list-group-item"><i class="fa fa-phone mr-3" aria-hidden="true"></i> <b><?= $nama['phone']; ?></b> </li>


                                            <li class="list-group-item bg-light"></li>
                                            <li class="list-group-item"><i class="fa fa-briefcase mr-3" aria-hidden="true"></i> <b><?= $data_keluhan['subject']; ?></b> </li>
                                            <li class="list-group-item"><i class="fa fa-briefcase mr-3" aria-hidden="true"></i> <b>Detail Keluhan</b>
                                                <div class="form-floating mt-3">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" readonly><?= $data_keluhan['detail_keluhan']; ?>
                                            </textarea>
                                                </div>
                                            </li>

                                            <br>
                                            <?php
                                            // create variable class
                                            $class = '';
                                            if ($data_keluhan['status'] == 'Pengajuan') {
                                                $class = 'bg-secondary';
                                            }
                                            if ($data_keluhan['status'] == 'Sedang Proses') {
                                                $class = 'bg-warning';
                                            }
                                            if ($data_keluhan['status'] == 'Selesai') {
                                                $class = 'bg-info';
                                            }
                                            ?>
                                            <li class="list-group-item"><b>Status Keluhan : </b><span class="badge <?= $class; ?> px-2 py-1"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i><b><?= $data_keluhan['status']; ?></b></span> </li>
                                        </ul>
                                        <br>

                                        <?php if (session('level') == 'admin') : ?>
                                            <form action="<?= base_url(); ?>/keluhan/update_progres/<?= $data_keluhan['kode_keluhan']; ?>" method="POST">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label"><b>Update Progres Keluhan</b></label>
                                                            <select class="form-control form-control mb-2" name="progres">
                                                                <option selected="selected" value=" ">-- PILIH --</option>
                                                                <option value="0" <?= ($data_keluhan['progres'] == '0' ? 'selected' : ''); ?>>PROGRES 0%</option>
                                                                <option value="10" <?= ($data_keluhan['progres'] == '10' ? 'selected' : ''); ?>>PROGRES 10%</option>
                                                                <option value="20" <?= ($data_keluhan['progres'] == '20' ? 'selected' : ''); ?>>PROGRES 20%</option>
                                                                <option value="30" <?= ($data_keluhan['progres'] == '30' ? 'selected' : ''); ?>>PROGRES 30%</option>
                                                                <option value="40" <?= ($data_keluhan['progres'] == '40' ? 'selected' : ''); ?>>PROGRES 40%</option>
                                                                <option value="50" <?= ($data_keluhan['progres'] == '50' ? 'selected' : ''); ?>>PROGRES 50%</option>
                                                                <option value="60" <?= ($data_keluhan['progres'] == '60' ? 'selected' : ''); ?>>PROGRES 60%</option>
                                                                <option value="70" <?= ($data_keluhan['progres'] == '70' ? 'selected' : ''); ?>>PROGRES 70%</option>
                                                                <option value="80" <?= ($data_keluhan['progres'] == '80' ? 'selected' : ''); ?>>PROGRES 80%</option>
                                                                <option value="90" <?= ($data_keluhan['progres'] == '90' ? 'selected' : ''); ?>>PROGRES 90%</option>
                                                                <option value="100" <?= ($data_keluhan['progres'] == '100' ? 'selected' : ''); ?>>PROGRES 100%</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane mr-3" aria-hidden="true"></i>Update</button>
                                            </form>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        <i class="fa  fa-sticky-note mr-2" aria-hidden="true"></i> Foto Keluhan
                                    </div>
                                    <div class="card-body">
                                        <center><img src="<?= base_url(); ?>/data/foto keluhan/<?= $data_keluhan['foto']; ?>" alt="" width="500px"></center>
                                        <br>


                                        <?php if (session('level') == 'admin') : ?>
                                            <form action="<?= base_url(); ?>/keluhan/update_foto/<?= $data_keluhan['kode_keluhan']; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label"><b>Update Foto</b></label>
                                                            <div class="col-md-12">
                                                                <input type="file" class="form-control form-control" id="colFormLabelSm" name="foto_keluhan[]" value="" placeholder="Foto Keluhan" required multiple="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane mr-3" aria-hidden="true"></i>Update Foto</button>
                                            </form>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>