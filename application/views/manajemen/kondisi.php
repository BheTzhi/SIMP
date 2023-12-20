<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?> Kondisi</h1>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="mb-4 ml-1">
            <a data-toggle="modal" data-target="#tambahModal" class="btn btn-outline-primary"><i class="fa far fa-plus"></i> Tambah Data</a>
        </div>
        <div class="mb-4 ml-1">
            <a href="<?= base_url('manajemen') ?>" class="btn btn-outline-secondary"><i class="fa far fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kondisi as $k) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['kondisi'] ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editModal" data-id="<?= $k['id'] ?>" data-kondisi="<?= $k['kondisi'] ?>" class="btn btn-sm btn-warning editkondisi"><i class="fas fa-fw fa-cog"></i></a>
                                    <a href="<?= base_url('inventaris/deletekondisi/' . encrypt_url($k['id'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus <?= $k['kondisi'] ?>.?');"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="text" name="kondisi" id="kondisi" class="form-control" placeholder="....">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="edit" value="true">
                        <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
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

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="text" name="kondisi" id="kondisi" class="form-control" placeholder="....">
                        <input type="hidden" name="add" value="true">
                        <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
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