<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?= $this->session->flashdata('pesan1'); ?>

    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Pedagang</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($pedagang as $p) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['nik'] ?></td>
                                <td>
                                    <a href="<?= base_url('pedagang/detail/' . encrypt_url($p['id'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                    <?php if ($user['role_id'] == 1) : ?>
                                        <a href="<?= base_url('pedagang/delet/' . encrypt_url($p['id'])); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data <?= $p['nama'] ?> ?')"><i class="fas fa-fw fa-trash"></i></a>
                                    <?php else : ?>
                                    <?php endif; ?>
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

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Pedagang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('pedagang/add'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="...." required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="...." required>
                </div>

                <div class="form-group">
                    <label for="nik">Nik</label>
                    <input type="text" name="nik" id="nik" class="form-control" placeholder="...." required>
                </div>

                <div class="form-group">
                    <label for="ju">Jenis Usaha</label>
                    <input type="text" name="ju" id="ju" class="form-control" placeholder="...." required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="...." required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="...." required>
                </div>

                <!-- <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <input type="file" name="foto" id="foto" class="form-control" placeholder="...." onchange="document.getElementById('gmb').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ktp">Ktp</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb2" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <input type="file" name="ktp" id="ktp" class="form-control" placeholder="...." onchange="document.getElementById('gmb2').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="npwp">Npwp</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb3" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <input type="file" name="npwp" id="npwp" class="form-control" placeholder="...." onchange="document.getElementById('gmb3').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kk">KK</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb4" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <input type="file" name="kk" id="kk" class="form-control" placeholder="...." onchange="document.getElementById('gmb4').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role" readonly>
                        <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
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