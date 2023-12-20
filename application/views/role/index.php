<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>

    <?= $this->session->flashdata('pesan1'); ?>

    <div class="row">
        <div class="col-lg-6">

            <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Role</a>

            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                                <a href="<?= base_url('role/roleakses/') . encrypt_url($r['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-coins"> Akses</i></a>
                                <a href="" data-toggle="modal" data-target="#editModal<?= $r['id'] ?>" class="btn btn-success btn-sm "><i class="fas fa-edit"> Ubah</i></a>
                                <a href="<?= base_url('role/delet/') . encrypt_url($r['id']) ?>" onclick="return confirm('Yakin, ingin menghapus data.?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"> Hapus</i></a>

                            </td>

                        </tr>
                        <?php $i++; ?>


                        <!-- Edit -->
                        <div class="modal fade" id="editModal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Tambah Role</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('role/edit/' . encrypt_url($r['id'])) ?>" method="post">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="urole">Role</label>
                                                <input type="text" value="<?= $r['role'] ?>" name="urole" id="urole" class="form-control" placeholder="...">
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success" type="submit">Simpan</button>
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
<!-- /.container-fluid -->

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Role</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('role/add') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" id="role" class="form-control" placeholder="...">
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