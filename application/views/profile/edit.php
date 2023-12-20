<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

    <div class="row">
        <div class="col-lg-8">
            <?php if ($role != 4) : ?>
                <?= form_open_multipart('profile/ubah/' . encrypt_url($user['id'])); ?>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="username">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="role">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="role" id="role" value="<?= $user['role']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Nip</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">

                                <!-- <img id="qrcode" class="img-thumbnail"> -->
                                <div id="qrcode"></div>

                            </div>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control " value="<?= $user['nip'] ?>" id="nip" name="nip" readonly>
                                <input type="text" class="form-control " id="res" onclick='updateQRCode(this.value)' readonly>
                                <button type="button" id="generate" class="btn btn-success mt-4 "> Generate</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="npwp">NPWP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="npwp" id="npwp" value="<?= $user['npwp']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Foto</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb" src="<?= base_url('assets/img/') . $user['foto']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('gmb').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" value="<?= $user['foto'] ?>" id="foto" name="foto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>

                <?= form_close(); ?>

            <?php else : ?>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>">
                        <input type="hidden" class="form-control" name="role" id="role" value="<?= $user['role_id']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="alamat">ِAlamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $user['alamat']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nik">Nik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nik" id="nik" value="<?= $user['nik']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="ju">Jenis Usaha</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ju" id="ju" value="<?= $user['jenis_usaha']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="username">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Dokumen</div>
                    <div class="col-sm-10">

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb1" src="<?= base_url('assets/pedagang/') . $user['foto']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('gmb1').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="foto" name="foto" value="<?= $user['foto'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb2" src="<?= base_url('assets/pedagang/') . $user['ktp']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Ktp</label>
                                    <input type="file" class="form-control" id="ktp" name="ktp" onchange="document.getElementById('gmb2').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="ktp" name="ktp" value="<?= $user['ktp'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb3" src="<?= base_url('assets/pedagang/') . $user['npwp']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Npwp</label>
                                    <input type="file" class="form-control" id="npwp" name="npwp" onchange="document.getElementById('gmb3').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="npwp" name="npwp" value="<?= $user['npwp'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <img id="gmb4" src="<?= base_url('assets/pedagang/') . $user['kk']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Kk</label>
                                    <input type="file" class="form-control" id="kk" name="kk" onchange="document.getElementById('gmb4').src = window.URL.createObjectURL(this.files[0])">
                                    <input type="hidden" class="form-control" id="kk" name="kk" value="<?= $user['kk'] ?>">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script type="text/javascript" src="<?= base_url('assets/js/') ?>qrcode.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>html5-qrcode.js"></script>

<script type="text/javascript">
    function updateQRCode(text) {

        const result = document.getElementById("qrcode");

        // var bodyElement = document.body;
        if (result.lastChild)
            result.replaceChild(showQRCode(text), result.lastChild);
        else
            result.appendChild(showQRCode(text));
    }
    // updateQRCode('www.tutorialspoint.com');
</script>