<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Metode Pembayaran</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pembayaran</th>
                            <th>Kode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($pembayaran as $p) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $p['pembayaran'] ?></td>
                                <td><?= $p['kode'] ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#editModal<?= $p['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('pembayaran/delete/' . encrypt_url($p['id'])) ?>" onclick="return confirm('Yakin ingin menghapus data <?= $p['pembayaran'] ?>')" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Edit -->
                            <div class="modal fade" id="editModal<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Data Metode Pembayaran</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <?= form_open_multipart('pembayaran/edit/' . encrypt_url($p['id'])); ?>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="pembayaran">Pembayaran</label>
                                                <input type="text" value="<?= $p['pembayaran'] ?>" name="upembayaran" id="upembayaran" class="form-control" placeholder="....">
                                            </div>

                                            <div class="form-group">
                                                <label for="kode">Kode</label>
                                                <input type="text" value="<?= $p['kode'] ?>" name="ukode" id="ukode" class="form-control" placeholder="....">
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                        <?= form_close(); ?>
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
                <h5 class="modal-title" id="tambahModalLabel">Tambah Metode Pembayaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('pembayaran/add'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="pembayaran">Pembayaran</label>
                    <input type="text" name="pembayaran" id="pembayaran" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" id="kode" class="form-control" placeholder="....">
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>