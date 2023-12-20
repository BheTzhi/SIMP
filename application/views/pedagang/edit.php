<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-8">

            <form action="<?= base_url('pedagang/edit/') . encrypt_url($pedagang['id']); ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $pedagang['nama']; ?>">
                        <input type="hidden" class="form-control" name="role" id="role" value="<?= $pedagang['role_id']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="alamat">ِAlamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $pedagang['alamat']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nik">Nik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nik" id="nik" value="<?= $pedagang['nik']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="ju">Jenis Usaha</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ju" id="ju" value="<?= $pedagang['jenis_usaha']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="username">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" value="<?= $pedagang['username']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Dokumen</div>
                    <div class="col-sm-10">

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb1" src="<?= base_url('assets/pedagang/') . $pedagang['foto']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('gmb1').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="foto" name="foto" value="<?= $pedagang['foto'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb2" src="<?= base_url('assets/pedagang/') . $pedagang['ktp']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Ktp</label>
                                    <input type="file" class="form-control" id="ktp" name="ktp" onchange="document.getElementById('gmb2').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="ktp" name="ktp" value="<?= $pedagang['ktp'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb3" src="<?= base_url('assets/pedagang/') . $pedagang['npwp']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Npwp</label>
                                    <input type="file" class="form-control" id="npwp" name="npwp" onchange="document.getElementById('gmb3').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="npwp" name="npwp" value="<?= $pedagang['npwp'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb4" src="<?= base_url('assets/pedagang/') . $pedagang['kk']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Kk</label>
                                    <input type="file" class="form-control" id="kk" name="kk" onchange="document.getElementById('gmb4').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="kk" name="kk" value="<?= $pedagang['kk'] ?>">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="<?= base_url('pedagang/detail/' . $this->uri->segment(3)) ?>" class="btn btn-warning ml-4">Kembali</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->