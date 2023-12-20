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
        <?php
        foreach ($abc as $k) : ?>
            <div class="card mr-4 ml-2 mb-2 mt-2" style="width: 10rem;">

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

                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <div class="container pagging text-center">
        <?php
        echo $this->pagination->create_links();
        ?>
    </div>
</div>
<!-- /.container-fluid -->