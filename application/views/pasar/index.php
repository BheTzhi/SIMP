<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3 ml-1"><i class="fas fa-fw fa-plus"></i> Tambah Blok</a>

    <div class="row ml-1">
        <?php foreach ($blok as $b) : ?>
            <div class="card mr-4 ml-2 mb-2 mt-2" style="width: 18rem;">
                <img class="card-img-top" src="<?= base_url('assets/blok/' . $b['gambar']) ?>" alt="Card image cap" style="width:288px; height:200px">
                <div class="card-body">
                    <h5 class="card-title">Blok <?= $b['blok'] ?></h5>
                    <p class="card-text">
                        Type : <?= $b['type'] ?><br>
                        Ukuran : <?= $b['ukuran'] ?><br>
                    </p>
                    <a href="<?= base_url('pasar/kios/' . encrypt_url($b['id'])) ?>" class="btn btn-success"><i class="fas fa-fw fa-eye"></i> Lihat</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Blok</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('pasar/addblok'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="blok">Blok</label>
                    <input type="text" name="blok" id="blok" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="....">
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" placeholder="....">
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