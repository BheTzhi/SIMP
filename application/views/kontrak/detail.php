<?php $status = ''; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail <?= $title; ?></h1>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="col-md-12">

        <a href="<?= base_url('kontrak') ?>" class="btn btn-warning mb-4"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="rounded-circle" src="<?= base_url('assets/kioss/' . $kontrak['foto']) ?>" alt="User profile picture" style="height: 200px; width: 200px;">
                </div>

                <br>

                <h3 class="profile-username text-center">Blok : <?= $kontrak['blok'] . '.' . $kontrak['nomor'] ?></h3>

                <br>

                <div class="row">

                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nama : </b> <span class="float-right"><?= $kontrak['nama'] ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Periode : </b> <span class="float-right"> <?= date('d F Y', strtotime($kontrak['start'])) . ' s/d ' . date('d F Y', strtotime($kontrak['end'])) ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-12">
                        <center>
                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nilai Kontrak : </b> <span class="float-right">Rp. <?= number_format($kontrak['nilai']) ?></span>
                                    </li>
                                </ul>
                            </div>
                        </center>
                    </div>

                    <div class="col-md-12">
                        <center>Pembayaran</center>
                        <br>
                    </div>
                    <?php if ($detail) : ?>
                        <?php foreach ($detail as $d) : ?>
                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>No Kwt : </b> <span class="float-right"> <?= $d['kwt'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nominal : </b> <span class="float-right">Rp. <?= number_format($d['nominal']) ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-1 mt-1">
                                <a href="<?= base_url('kontrak/delkon/' . encrypt_url($d['id']) . '/' . encrypt_url($kontrak['id'])) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus bukti pembayaran.?');"><i class="fas fa-trash"></i></a>
                            </div>
                        <?php endforeach; ?>
                        <?php if ($kontrak['nilai'] == $total['ttl']) :
                            $status .= 'Lunas';
                        else :
                            $status .= 'Kurang / Belum Lunas';
                        endif; ?>
                        <div class="col-md-6">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Status : </b> <span class="float-right"><?= $status ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total : </b> <span class="float-right">Rp. <?= number_format($total['ttl']) ?></span>
                                </li>
                            </ul>
                        </div>

                    <?php else : ?>
                        <div class="col-md-12">
                            <center>Belum bayar kontrak</center>
                            <br>
                        </div>
                    <?php endif; ?>
                    <?php
                    $kode = $kontrak['nama'];
                    $kode = preg_replace("/[a-z\s]+/", "", $kode);
                    ?>
                    <?php if ($status != 'Lunas') : ?>
                        <a href="" data-toggle="modal" data-kode="<?= $kode ?>" data-target="#tambahModal" class="btn btn-primary btn-block byr"><b>Bayar</b></a>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Bayar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('kontrak/bayar/' . encrypt_url($kontrak['id'])) ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="kwt">Nomor Kwt</label>
                        <input type="text" name="kwt" id="kwt" class="form-control" placeholder="01/SD-SEWA/VI/2023" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="1.000.000" onkeypress="return isNumber(event)">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>