<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title . ' Tanggal : ' . date('d F Y'); ?></h1>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Masuk</th>
                            <th>Pulang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($absensi as $a) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/img/') . $a['foto']; ?>" class="img-thumbnail">
                                </td>
                                <td><?= $a['nama'] ?></td>
                                <td><?= $a['nip'] ?></td>
                                <td><?= $a['masuk'] ?></td>
                                <td><?= $a['pulang'] ?></td>
                                <td><?= $a['keterangan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->