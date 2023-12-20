<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Blok</th>
                            <th>Nomor</th>
                            <th>Pemilik</th>
                            <th>PHN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kios as $k) :

                            if ($k['hptd'] == 'Null') :
                                $hptd = 'Belum terdaftar';
                                $tombol = '<a data-toggle="modal" data-id="' . $k['id'] . '" data-target="#tambahModal" class="btn btn-sm btn-primary add"><i class="fas fa-fw fa-plus"></i> Masukan PHN</a>';
                            else :
                                $hptd = $k['hptd'];
                                $tombol = '<a data-toggle="modal" data-phn="' . $hptd . '" data-id="' . $k['id'] . '" data-target="#editModal" class="btn btn-sm btn-warning edit"><i class="fas fa-fw fa-edit"></i> Ubah PHN</a>';
                            endif;
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['blok'] ?></td>
                                <td><?= $k['nomor'] ?></td>
                                <td><?= $k['nama'] ?></td>
                                <td><?= $hptd; ?></td>

                                <!-- Versi Silat -->
                                <td>
                                    <?= $tombol ?>
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

<!-- Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Tambah phn</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('hptd/phn') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="phn">PHN</label>
                        <input type="text" name="phn" id="phn" class="form-control" placeholder="....">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" name="edit" value="true">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah phn</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('hptd/phn') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="ids">
                        <label for="phn">PHN</label>
                        <input type="text" name="phn" id="phn" class="form-control" placeholder="....">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" name="add" value="true">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>