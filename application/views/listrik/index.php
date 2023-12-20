<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah List Listrik</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Daya</th>
                            <th>Harga</th>
                            <th>Per Kwh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($listrik as $l) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= number_format($l['daya']) ?> Watt</td>
                                <td>Rp. <?= number_format($l['harga']) ?>,-</td>
                                <td>Rp. <?= number_format($l['pkwh']) ?>,-</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editModal<?= $l['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('listrik/delete/' . encrypt_url($l['id'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus daya <?= number_format($l['daya']) ?> Watt ?');"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Edit -->
                            <div class="modal fade" id="editModal<?= $l['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Tambah List Listrik</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <form action="<?= base_url('listrik/edit/' . encrypt_url($l['id'])) ?>" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="udaya">Daya</label>
                                                    <input type="text" name="udaya" id="udaya" class="form-control" value="<?= $l['daya'] ?>" placeholder="....">
                                                </div>

                                                <div class="form-group">
                                                    <label for="uharga">Harga</label>
                                                    <input type="text" name="uharga" id="uharga" class="form-control" value="<?= $l['harga'] ?>" placeholder="....">
                                                </div>

                                                <div class="form-group">
                                                    <label for="upkwh">Per Kwh</label>
                                                    <input type="text" name="upkwh" id="upkwh" class="form-control" value="<?= $l['pkwh'] ?>" placeholder="....">
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

</div>
<!-- /.container-fluid -->

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah List Listrik</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('listrik/add') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="daya">Daya</label>
                        <input type="text" name="daya" id="daya" class="form-control" placeholder="....">
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="....">
                    </div>

                    <div class="form-group">
                        <label for="pkwh">Per Kwh</label>
                        <input type="text" name="pkwh" id="pkwh" class="form-control" placeholder="....">
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