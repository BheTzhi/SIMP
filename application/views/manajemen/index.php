<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">

        <div class="col-lg-3">
            <div class="d-sm-flex align-items-center justify-content-center mr-4 ml-3 mb-2 mt-2">
                <a href="<?= base_url('manajemen/inventaris') ?>" class="btn btn-lg btn-primary"><i class="fas fa-cube"></i>&nbsp; Inventaris</a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="d-sm-flex align-items-center justify-content-center mr-4 ml-3 mb-2 mt-2">
                <a href="<?= base_url('manajemen/kondisi') ?>" class="btn btn-lg btn-info"><i class="fas fa-heartbeat"></i>&nbsp; Kondisi</a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="d-sm-flex align-items-center justify-content-center mr-4 ml-3 mb-2 mt-2">
                <a href="<?= base_url('manajemen/jenis') ?>" class="btn btn-lg btn-success"><i class="fas fa-cog"></i>&nbsp; Jenis</a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="d-sm-flex align-items-center justify-content-center mr-4 ml-3 mb-2 mt-2">
                <a href="<?= base_url('manajemen/ruang') ?>" class="btn btn-lg btn-secondary"><i class="fas fa-building"></i>&nbsp; Ruang</a>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->