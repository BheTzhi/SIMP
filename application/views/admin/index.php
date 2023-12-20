<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">
        <div class="col-lg-12">
            <?= form_open_multipart('admin/add/gabung') ?>
            <div class="row">

                <div class="form-group col-md-4">
                    <h6>Blok</h6>
                </div>

                <div class="form-group col-md-4">
                    <h6>Nomor</h6>
                </div>

                <div class="form-group col-md-4">
                    <h6>Dengan Kios</h6>
                </div>

                <div class="form-group col-md-4">
                    <select name="blok" id="blok" class="custom-select">
                        <option value="" selected>- Blok -</option>
                        <?php foreach ($blok as $b) : ?>
                            <option value="<?= $b['id'] ?>"><?= $b['blok'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-4 zzz" style="display: none;">
                    <select name="nomor" id="nomor" class="custom-select">
                    </select>
                </div>

                <div class="form-group col-md-2 zzz" style="display: none;">
                    <select name="blok2" id="blok2" class="custom-select">
                        <option value="" selected>- Blok -</option>
                        <?php foreach ($blok as $b) : ?>
                            <option value="<?= $b['id'] ?>"><?= $b['blok'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-2 zzz" style="display: none;">
                    <select name="nomor2" id="nomor2" class="custom-select">
                    </select>
                </div>

                <div class="form-group col-md-12 zzz" style="display: none;">
                    <center>
                        <button type="submit" class="btn btn-primary col-md-5">Gabung</button>
                    </center>
                </div>

            </div>
            <?= form_close() ?>
        </div>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-4">Lepas Gabung</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= form_open_multipart('admin/add/pisah') ?>
            <div class="row">

                <div class="form-group col-md-4">
                    <h6>Blok</h6>
                </div>

                <div class="form-group col-md-4">
                    <h6>Nomor</h6>
                </div>

                <div class="form-group col-md-4">
                    <h6>Dengan Kios</h6>
                </div>

                <div class="form-group col-md-4">
                    <select name="pblok" id="pblok" class="custom-select">
                        <option value="" selected>- Blok -</option>
                        <?php foreach ($blok as $b) : ?>
                            <option value="<?= $b['id'] ?>"><?= $b['blok'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-4 xxx" style="display: none;">
                    <select name="pnomor" id="pnomor" class="custom-select">
                    </select>
                </div>

                <div class="form-group col-md-2 xxx" style="display: none;">
                    <select name="pblok2" id="pblok2" class="custom-select">
                        <option value="" selected>- Blok -</option>
                        <?php foreach ($blok as $b) : ?>
                            <option value="<?= $b['id'] ?>"><?= $b['blok'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-2 xxx" style="display: none;">
                    <select name="pnomor2" id="pnomor2" class="custom-select">
                    </select>
                </div>

                <div class="form-group col-md-12 xxx" style="display: none;">
                    <center>
                        <button type="submit" class="btn btn-primary col-md-5">Sekat</button>
                    </center>
                </div>

            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->