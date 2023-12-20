<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h1 class="h3 mb-0 text-gray-800"><?= $title . ' Blok : ' . $blok['blok'] . ' Nomor : ' . $min['nomor'] . ' - ' . $terakhir['nomor'] ?></h1>
        </div>
    </div>

    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3 ml-1"><i class="fas fa-fw fa-plus"></i> Tambah Kios</a>

    <div class="row">
        <?php foreach ($sort as $k) : ?>
            <div class="card mr-4 ml-2 mb-2 mt-2" style="width: 17rem;">

                <!-- <img class="card-img-top" src="<?= base_url('assets/kioss/' . $k['foto']) ?>" style="height:5cm; weight:5cm;" alt="Card image cap"> -->
                <div class="card-body">
                    <?php
                    if ($k['lantai'] != 1) {
                        $lantai = 'Dasar';
                    } else {
                        $lantai = 'Satu';
                    }
                    ?>
                    <h5 class="mt-1 mb-1 ml-1 mr-1"><b>Blok : <?= $k['blok'] ?> </b></h5>
                    <!-- <p style="font-style: italic;">Ukuran : <?= $k['ukuran'] ?> </p> -->
                    <p style="font-style: italic;">Nomor : <?= $k['nomor'] ?></p>
                    <p style="font-style: italic;">Lantai : <?= $lantai ?></p>
                    <?php
                    if ($k['status'] == 0) : $status = 'Kosong';
                    else : $status = 'Laku';
                    endif;
                    ?>
                    <p style="font-style: italic;">Status : <?= $status ?></p>
                    <p style="font-style: italic;">Harga : Rp. <?= number_format($k['harga']) ?>,-</p>

                    <div class="d-sm-flex align-items-center justify-content-between mb-1">
                        <a href="<?= base_url('pasar/detailkios/'  . encrypt_url($k['id']) . '/' . encrypt_url($k['blok_id'])) ?>" class="btn btn-sm btn-success "><i class=" fas fa-sm fa-fw fa-eye"></i></a>
                        <?php if ($user['role_id'] == 1) : ?>
                            <a href="" data-toggle="modal" data-target="#editModal<?= $k['id'] ?>" class="btn btn-sm btn-warning "><i class=" fas fa-sm fa-fw fa-eye-dropper"></i></a>
                            <a href="<?= base_url('pasar/deletekios/' . encrypt_url($k['id']) . '/' . encrypt_url($k['blok_id'])) ?>" onclick="return confirm('Yakin ingin menghapus kios blok <?= $k['blok'] . ' Nomor ' . $k['nomor'] ?> ? ')" class="ubahKios btn btn-sm btn-danger "><i class=" fas fa-sm fa-fw fa-trash"></i></a>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Edit Master -->
            <div class="modal fade" id="editModal<?= $k['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Kios</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <?php echo form_open_multipart('pasar/editkios/' . encrypt_url($k['id']) . '/' . encrypt_url($blok['id'])); ?>

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="uharga">Harga</label>
                                <input type="text" class="form-control" name="uharga" id="uharga" value="<?= $k['harga'] ?>" onkeypress="return isNumber(event)">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>

                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

    <div class="container pagging text-center mt-4">
        <?php
        echo $this->pagination->create_links();
        ?>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php echo form_open_multipart('pasar/addkios/' . encrypt_url($blok['id'])); ?>

            <div class="modal-body">

                <div class="form-group">
                    <label for="blok">Blok</label>
                    <select class="form-control" name="blok" id="blok">
                        <option value="<?= $blok['id'] ?>"><?= $blok['blok'] ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nomor">Nomor</label>
                    <?php if ($terakhir != null) : ?>
                        <?php $nomors = sprintf("%03d", $terakhir['nomor'] + 1); ?>
                        <input class="form-control" type="text" name="nomor" id="nomor" placeholder=". . ." value="<?= $nomors ?>" readonly>
                    <?php else : ?>
                        <?php $nomors = sprintf("%03d", $terakhir + 1); ?>
                        <input class="form-control" type="text" name="nomor" id="nomor" placeholder=". . ." value="<?= $terakhir + 1 ?>" readonly>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="lantai">Lantai</label>
                    <select class="form-control" name="lantai" id="lantai">
                        <option value="">- Pilih -</option>
                        <option value="0">Dasar</option>
                        <option value="1">Satu</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <img id="gmb" src="" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <label for="gambar">Foto</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" onchange="document.getElementById('gmb').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="hargass" placeholder=". . ." onkeypress="return isNumber2(event)">
                </div>

                <div class="form-group">
                    <label for="listrik">Listrik</label>
                    <select class="form-control" name="listrik" id="listrik">
                        <option value="">- Pilih -</option>
                        <?php foreach ($listrik as $l) : ?>
                            <?php if ($l['id'] == 1) : ?>
                                <option value="<?= $l['id'] ?>"><?= $l['daya'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>