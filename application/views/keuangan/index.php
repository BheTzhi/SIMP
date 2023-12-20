<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Pokok</h4>
    </div>

    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">Nomor</th>
                            <th>Jabatan</th>
                            <th>Pokok</th>
                            <th>Tunjangan</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jabatan as $j) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $j['role'] ?></td>
                                <td>Rp. <?= number_format($j['pokok']) ?>,-</td>
                                <td>Rp. <?= number_format($j['tunjangan']) ?>,-</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#earningModal<?= $j['id'] ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-dollar-sign"></i> Earning</a>
                                </td>
                            </tr>

                            <!-- Earning -->
                            <div class="modal fade" id="earningModal<?= $j['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="earningModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="earningModalLabel">Earning</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('keuangan/earnging/' . encrypt_url($j['id'])) ?>" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="role">Jabatan</label>
                                                    <input type="text" name="role" id="role" class="form-control" value="<?= $j['role'] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="pokok">Pokok</label>
                                                    <?php
                                                    if ($j['pokok']) :
                                                        $value = 'value="Rp. ' . number_format($j['pokok']) . '"';
                                                    else :
                                                        $value = 'placeholder="...."';
                                                    endif;
                                                    ?>
                                                    <input type="text" name="pokok" id="pokok" class="form-control" <?= $value ?>>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tunjangan">Tunjangan</label>
                                                    <?php
                                                    if ($j['pokok']) :
                                                        $values = 'value="Rp. ' . number_format($j['tunjangan']) . '"';
                                                    else :
                                                        $values = 'placeholder="...."';
                                                    endif;
                                                    ?>
                                                    <input type="text" name="tunjangan" id="tunjangan" class="form-control" <?= $values ?>>
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

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Page Heading -->

    <hr>
    <!-- Page Heading 2 -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Potongan</h4>
    </div>

    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Potongan</a>

    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">Nomor</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Akasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($potongan as $p) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['keterangan'] ?></td>
                                <td><?= $p['nominal'] ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editModal<?= $p['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('keuangan/delpotongan/' . encrypt_url($p['id'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus potongan <?= $p['keterangan'] ?> ?')"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Edit Potongan -->
                            <div class="modal fade" id="editModal<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Potongan</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('keuangan/editpotongan/' . encrypt_url($p['id'])) ?>" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="uketerangan">Keterangan</label>
                                                    <input value="<?= $p['keterangan'] ?>" type="text" name="uketerangan" id="uketerangan" class="form-control" placeholder="....">
                                                </div>

                                                <div class="form-group">
                                                    <label for="unominal">Nominal</label>
                                                    <input value="<?= $p['nominal'] ?>" type="text" name="unominal" id="unominal" class="form-control" placeholder="....">
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

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Page Heading 2 -->

</div>
<!-- /.container-fluid -->


<!-- Tambah Potongan -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Potongan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('keuangan/addpotongan') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="....">
                    </div>

                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="....">
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