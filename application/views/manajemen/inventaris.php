<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title . ' Inventaris' ?> </h1>
    </div>

    <!-- Inventaris Seleruhan -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="mb-4 ml-1">
            <a data-toggle="modal" data-target="#tambahModal" class="btn btn-outline-primary addinven"><i class="fa far fa-plus"></i> Tambah Data</a>
        </div>
        <div class="mb-4 ml-1">
            <a href="<?= base_url('manajemen') ?>" class="btn btn-outline-secondary"><i class="fa far fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kondisi</th>
                            <th>Harga</th>
                            <th>Tanggal Beli</th>
                            <th>Jenis</th>
                            <th>Ruang</th>
                            <th>Terakhir Di Cek</th>
                            <th>Foto</th>
                            <th>QR</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($inventaris as $i) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $i->kode ?></td>
                                <td><?= $i->nama ?></td>
                                <td><?= $i->kondisi ?></td>
                                <td>Rp. <?= number_format($i->harga) ?></td>
                                <td><?= date('d F Y', $i->tanggal_beli) ?></td>
                                <td><?= $i->jenis ?></td>
                                <td><?= $i->ruang ?></td>
                                <td><?= date('d F Y', $i->tanggal_pengecekan) ?></td>
                                <td>
                                    <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/inventaris/') . $i->foto; ?>" class="img-thumbnail">
                                </td>
                                <td>
                                    <?php if ($i->qr) : ?>
                                        <img id="qr" data-url="<?= base_url('assets/qr/') . $i->qr; ?>?>" style="height: 2cm; weight:2cm;" src="<?= base_url('assets/qr/') . $i->qr; ?>" class="img-thumbnail">
                                    <?php else : ?>
                                        <div id="gmb<?= $i->id ?>" style="display: none;"></div>
                                        <a class="btn btn-sm btn-success generate" data-id="<?= $i->id ?>" data-kode="<?= $i->kode ?>"> Generate</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a data-toggle="dropdown" class="btn btn-sm btn-info"><i class="fas fa-fw fa-cog"></i></a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        <a data-kode="<?= $i->kode ?>" data-toggle="modal" data-target="#editModal" class="dropdown-item editinven">
                                            <div class="media-body"><i class="fas fa-fw fa-edit"></i> Edit
                                        </a>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?= base_url('manajemen/delete/' . encrypt_url($i->id)) ?>" class="dropdown-item" onclick="return confirm('Yaking ingin menghapus <?= $i->nama ?>.?');">
                                        <div class="media-body"><i class="fas fa-fw fa-trash"></i> Delete
                                    </a>
                                    <div class="dropdown-divider"></div>
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
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="hidden" name="id" id="id" class="form-control">
                        <input type="text" name="kode" id="kode1" class="form-control" readonly>
                        <input type="hidden" name="pegawai" value="<?= $user['id'] ?>">
                        <input type="hidden" name="edit" value="true">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" name="nama" id="nama1" class="form-control" placeholder="....">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group kon">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi1" class="form-control">
                            <?php foreach ($kondisi as $k) : ?>
                                <option value="<?= $k['id'] ?>"><?= $k['kondisi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group jen">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis1" class="form-control">
                            <?php foreach ($jenis as $j) : ?>
                                <option value="<?= $j['kode'] ?>"><?= $j['jenis'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group rug">
                        <label for="ruang">Ruang</label>
                        <select name="ruang" id="ruang1" class="form-control">
                            <?php foreach ($ruang as $r) : ?>
                                <option value="<?= $r->kode ?>"><?= $r->ruang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_beli">Tanggal Beli</label>
                        <input type="date" name="tanggal_beli" id="tanggal_beli1" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="fotos1" src="" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto1" name="foto" onchange="document.getElementById('fotos1').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga Beli</label>
                        <input type="text" name="harga" id="harga1" class="form-control">
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control" readonly>
                        <input type="hidden" name="pegawai" value="<?= $user['id'] ?>">
                        <input type="hidden" name="add" value="true">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="....">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($kondisi as $k) : ?>
                                <option value="<?= $k['id'] ?>"><?= $k['kondisi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($jenis as $j) : ?>
                                <option value="<?= $j['kode'] ?>"><?= $j['jenis'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ruang">Ruang</label>
                        <select name="ruang" id="ruang" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($ruang as $r) : ?>
                                <option value="<?= $r->kode ?>"><?= $r->ruang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_beli">Tanggal Beli</label>
                        <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <img id="fotos" src="" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('fotos').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga Beli</label>
                        <input type="text" name="harga" id="harga" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" onclick="return confirm('Yakin ingin menambah data.?');">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>