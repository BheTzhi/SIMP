<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <?php if ($role != 4) : ?>

                    <img src="<?= base_url('assets/img/') . $user['foto']; ?>" class="card-img mt-4">

                <?php else : ?>

                    <img src="<?= base_url('assets/pedagang/') . $user['foto']; ?>" class="card-img mt-4">
                    <img src="<?= base_url('assets/pedagang/') . $user['ktp']; ?>" class="card-img mt-4">
                    <img src="<?= base_url('assets/pedagang/') . $user['npwp']; ?>" class="card-img mt-4">
                    <img src="<?= base_url('assets/pedagang/') . $user['kk']; ?>" class="card-img mt-4">

                <?php endif; ?>

            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <?php if ($role != 4) : ?>

                        <h5 class="card-title"><?= $user['nama']; ?></h5>
                        <p class="card-text"><?= $user['nip']; ?></p>
                        <p class="card-text"><?= $user['username']; ?></p>
                        <p class="card-text"><small class="text-muted">Terdaftar Sejak : <?= date('d F Y', strtotime($user['date_join'])) ?></small></p>

                    <?php else : ?>

                        <h5 class="card-title"><b>Nama :</b> <?= $user['nama']; ?></h5>
                        <p class="card-text"><b>NIK :</b> <?= $user['nik']; ?></p>
                        <p class="card-text"><b>Alamat :</b> <?= $user['alamat']; ?></p>
                        <p class="card-text"><b>Jenis Usaha :</b> <?= $user['jenis_usaha']; ?></p>
                        <h5 class="card-title"><b>Username :</b> <?= $user['username']; ?></h5>

                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->