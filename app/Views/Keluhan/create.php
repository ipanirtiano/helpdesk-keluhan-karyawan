<?= $this->extend('layout/template') ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php $this->section('content') ?>
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4">Buat Keluhan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Buat Keluhan</li>
        </ol>
        <div class="row">
            <div class="col">
                <!-- <button type="button" class="btn btn-sm btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Pesan Ruangan</button> -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        DataTable Buat Keluhan
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

                        <div class="card">
                            <div class="card-body">
                                <?php if (session('level') == 'admin') : ?>
                                    <form action="<?= base_url(); ?>/keluhan/proses_input" method="post" enctype="multipart/form-data">
                                    <?php endif; ?>

                                    <?php if (session('level') == 'karyawan') : ?>
                                        <form action="<?= base_url(); ?>/keluhan/proses_input2" method="post" enctype="multipart/form-data">
                                        <?php endif; ?>
                                        <?= csrf_field() ?>
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">ID Keluhan</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control form-control <?= ($validation->hasError('id_keluhan') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="id_keluhan" value="<?= $id_keluhan; ?>" placeholder="Subject Keluhan" readonly>
                                                <div class="invalid-feedback" style="font-size: small">
                                                    <?= $validation->getError('id_keluhan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Subject Keluhan</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control <?= ($validation->hasError('subject_keluhan') ? 'is-invalid' : ''); ?>" id="colFormLabelSm" name="subject_keluhan" value="<?= old('subject_keluhan'); ?>" placeholder="Subject Keluhan">
                                                <div class="invalid-feedback" style="font-size: small">
                                                    <?= $validation->getError('subject_keluhan'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Detail Keluhan</label>
                                            <div class="col-md-9">
                                                <div class="form-floating">
                                                    <textarea class="form-control <?= ($validation->hasError('detail_keluhan') ? 'is-invalid' : ''); ?>" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="detail_keluhan" value="<?= old('detail_keluhan'); ?>">
                                            </textarea>
                                                    <div class="invalid-feedback" style="font-size: small">
                                                        <?= $validation->getError('detail_keluhan'); ?>
                                                    </div>
                                                    <label for="floatingTextarea2">Detail Keluhan</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Foto Keluhan</label>
                                                <div class="col-md-3">
                                                    <input type="file" class="form-control form-control" id="colFormLabelSm" name="foto_keluhan[]" value="" placeholder="Foto Keluhan" required multiple="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary">Input</button>
                                                <a href="<?= base_url(); ?>/views" class="btn btn-danger" data-bs-dismiss="modal">Cancel</a>
                                            </div>
                                        </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>