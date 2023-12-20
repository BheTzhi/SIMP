<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Pegawai</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Npwp</th>
                            <th>Foto</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($pegawai as $p) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['nip'] ?></td>
                                <td><?= $p['npwp'] ?></td>
                                <td>
                                    <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/img/') . $p['foto']; ?>" class="img-thumbnail">
                                </td>
                                <td><?= $p['username'] ?></td>
                                <td><?= $p['role'] ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#editModal<?= encrypt_url($p['id']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('pegawai/delete/' . encrypt_url($p['id'])) ?>" onclick="return confirm('Yakin ingin menghapus data <?= $p['nama'] ?> ?')" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Edit -->
                            <div class="modal fade" id="editModal<?= encrypt_url($p['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Pegawai</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <?= form_open_multipart('pegawai/edit/' . encrypt_url($p['id'])); ?>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="unama">Nama</label>
                                                <input type="text" name="unama" id="unama" class="form-control" value="<?= $p['nama'] ?>" placeholder="....">
                                            </div>

                                            <div class="form-group">
                                                <label for="unip">Nip</label>
                                                <input type="text" name="unip" id="unip" class="form-control" value="<?= $p['nip'] ?>" placeholder="....">
                                            </div>

                                            <div class="form-group">
                                                <label for="unpwp">Npwp</label>
                                                <input type="text" name="unpwp" id="unpwp" class="form-control" value="<?= $p['npwp'] ?>" placeholder="....">
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img id="gambars" src="<?= base_url('assets/img/') . $p['foto']; ?>" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <label for="foto">Foto</label>
                                                            <input type="file" class="form-control" id="ufoto" name="ufoto" onchange="document.getElementById('gambars').src = window.URL.createObjectURL(this.files[0])">
                                                            <input type="hidden" class="form-control" value="<?= $p['foto'] ?>" id="ufoto" name="ufoto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="uusername">Username</label>
                                                <input type="text" name="uusername" id="uusername" class="form-control" value="<?= $p['username'] ?>" placeholder="....">
                                            </div>

                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control" name="urole" id="urole">
                                                    <?php
                                                    foreach ($role as $r) :
                                                        if ($r['role'] == $p['role']) :
                                                            $selected = "selected";
                                                        else :
                                                            $selected = "";
                                                        endif;
                                                    ?>
                                                        <option <?= $selected ?> value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
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
                <h5 class="modal-title" id="tambahModalLabel">Tambah Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('pegawai/add'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="nip">Nip</label>
                    <input type="text" name="nip" id="nip" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="npwp">Npwp</label>
                    <input type="text" name="npwp" id="npwp" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <img id="fotos" src="" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('fotos').src = window.URL.createObjectURL(this.files[0])">
                                <input type="hidden" name="foto" id="foto" value="default.jpg">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role">
                        <option value="">- Pilih -</option>
                        <?php foreach ($role as $r) : ?>
                            <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                        <?php endforeach; ?>
                    </select>
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