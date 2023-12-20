<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3 add"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>

    <?= $this->session->flashdata('pesan'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Blok</th>
                            <th>Nomor</th>
                            <th>Periode Kontrak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kontrak as $k) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['nama'] ?></td>
                                <td><?= $k['blok'] ?></td>
                                <td><?= $k['nomor'] ?></td>
                                <td><?= date('d F Y', strtotime($k['start'])) . ' s/d ' . date('d F Y', strtotime($k['end'])) ?></td>
                                <td>
                                    <a href="<?= base_url('kontrak/detail/' . encrypt_url($k['id'])) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-fw fa-eye"></i></a>
                                    <!-- <a href="" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a> -->
                                    <a href="<?= base_url('kontrak/delete/' . encrypt_url($k['id'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yaking ingin menghapus data.?');"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('kontrak/add') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <select name="nama" id="nama" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($pedagang as $p) : ?>
                                <option value="<?= $p['id'] ?>"><?= $p['id'] . ' - ' . $p['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="blok">Blok</label>
                        <select name="blok" id="blok" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($blok as $b) : ?>
                                <option value="<?= $b['id'] ?>"><?= $b['id'] . ' - ' . $b['blok'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kios">Kios</label>
                        <select name="kios" id="kios" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nominal">Nilai Kontrak</label>
                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="1.000.000">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start">Periode</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="start">Awal</label>
                                <input type="date" name="start" id="start" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="end">Akhir</label>
                                <input type="date" name="end" id="end" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>