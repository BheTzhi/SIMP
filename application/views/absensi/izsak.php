<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title . ' Tanggal : ' . date('d F Y'); ?></h1>
    </div>

    <!-- DataTales Example -->
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
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($pegawai as $p) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/img/') . $p['foto']; ?>" class="img-thumbnail">
                                </td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['nip'] ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning"> Sakit</a>
                                    <a href="" class="btn btn-sm btn-success"> Izin</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->