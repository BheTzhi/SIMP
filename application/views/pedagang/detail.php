<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('pedagang/ubah/' . encrypt_url($pedagang['id'])) ?>" class="btn btn-success"> <i class="fas fa-fw fa-edit"></i> Ubah data</a>
    </div>




    <div class="card text-center">
        <div class="card-header">
            <h4 class="card-title">Nama : <b><?= ucfirst($pedagang['nama']) ?></b></h4>
            <p class="card-title">username : <b><?= $pedagang['username'] ?></b></p>

        </div>
        <div class="card-body">
            <p class="card-text" style="text-align: left;">
                <b>Nik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b> <?= $pedagang['nik']; ?> <br>
                <b>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </b> <?= $pedagang['alamat']; ?><br>
                <b>Jenis Usaha : </b> <?= $pedagang['jenis_usaha']; ?><br>
                <?php
                if ($kios != true) :
                    $milik = 'Tidak memiliki Kios / Los';
                else :
                    $milik = count($kios) . ' Buah';
                endif;
                ?>
                <b>Kios / Los Dimiliki : </b> <?= $milik ?><br>
                <?php if ($kios) :
                    $sisa = $sisa['sisa'];
                    echo '<b>Sisa Pembayaran : </b> Rp. ' . number_format($sisa) . ',- <br>';
                else :

                endif; ?>
            <h4 style="margin-bottom: 4px;">Gambar Data Diri</h4>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="foto">Foto</label>
                        <img src="<?= base_url('assets/pedagang/') . $pedagang['foto']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-3">
                        <label for="ktp">Ktp</label>
                        <img src="<?= base_url('assets/pedagang/') . $pedagang['ktp']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-3">
                        <label for="npwp">Npwp</label>
                        <img src="<?= base_url('assets/pedagang/') . $pedagang['npwp']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-3">
                        <label for="kk">Kk</label>
                        <img src="<?= base_url('assets/pedagang/') . $pedagang['kk']; ?>" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <div class="row mt-4">

                <!-- Jika Punya Kios -->

                <div class="container">
                    <!-- cek punya kios atau tidak -->
                    <?php if ($kios != true) : ?>
                        <h4><b> Tidak Memiliki Kios</b></h4>
                    <?php else : ?>
                        <h4 class="mt-4 mb-2"><b> Kios / Los yang dimiliki</b></h4>
                        <div class="row ml-1">
                            <?php foreach ($kios as $b) : ?>
                                <div class="card mr-4 ml-2 mb-2 mt-2" style="width: 18rem;">
                                    <img class="card-img-top" src="<?= base_url('assets/kioss/' . $b['foto']) ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $b['type'] . ' Blok ' . $b['blok'] ?></h5>
                                        <p class="card-text">
                                            nomor : <?= $b['nomor'] ?><br>
                                            Ukuran : <?= $b['ukuran'] ?><br>
                                        </p>
                                        <a href="<?= base_url('pasar/detailkios/' . encrypt_url($b['id']) . '/' . encrypt_url($b['blok_id'])) ?>" class="btn btn-success"><i class="fas fa-fw fa-eye"></i> Lihat</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Tombol Beli -->
                    <?php if ($user['role_id'] == 1) : ?>
                        <a data-toggle="modal" data-target="#beliKios" class="btn btn-primary bsss"> Beli Kios</a>
                    <?php else : ?>
                    <?php endif; ?>
                </div>

            </div>

            </p>
        </div>
    </div>

    <div class="container mt-4">
        <?php if ($prev != null) : ?>
            <a href="<?= base_url('pedagang/detail/' . encrypt_url($prev['id'])) ?>" class="btn btn-sm btn-secondary mb-2" style="float: left;"><i class="fas fa-fw fa-arrow-left"></i> Prev</a>
        <?php else : ?>
        <?php endif; ?>
        <?php if ($next != null) : ?>
            <a href="<?= base_url('pedagang/detail/' . encrypt_url($next['id'])) ?>" class="btn btn-sm btn-secondary mb-2" style="float: right;">Next <i class="fas fa-fw fa-arrow-right"></i></a>
        <?php else : ?>
        <?php endif; ?>
    </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="beliKios" tabindex="-1" role="dialog" aria-labelledby="beliKiosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="beliKiosLabel">Beli Kios</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('pedagang/belikios/' . $this->uri->segment(3)) ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="blok">Pilih Blok</label>
                    <select class="form-control" name="blok" id="blok" onchange="block(value)">
                        <option value="">- Pilih Blok -</option>
                        <?php foreach ($blok as $b) : ?>
                            <option value="<?= $b['id'] ?>"><?= $b['blok'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group ddd" style="display: none;">
                    <label for="kioz">Pilih Kios</label>
                    <select class="form-control" name="kios" id="kioz">
                        <option value="">- Pilih Kios -</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Beli</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>