<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Sub Menu</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($submenu as $sm) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $sm['menu'] ?></td>
                                <td><?= $sm['title'] ?></td>
                                <td><?= $sm['url'] ?></td>
                                <td><?= $sm['icon'] ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?= $sm['id'] ?>"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('submenu/delet/' . encrypt_url($sm['id'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data <?= $sm['menu'] ?> ?');"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Sub Menu</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('submenu/edit/' . encrypt_url($sm['id'])) ?>" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="umenu">Menu</label>
                                                    <select class="form-control" name="umenu" id="umenu">
                                                        <?php foreach ($menu as $m) : ?>
                                                            <?php
                                                            if ($sm['menu_id'] == $m['id']) :
                                                                $selected = 'selected';
                                                            else :
                                                                $selected = '';
                                                            endif;
                                                            ?>
                                                            <option <?= $selected; ?> value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="utitle">Title</label>
                                                    <input type="text" name="utitle" id="utitle" class="form-control" value="<?= $sm['title'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="uurl">Url</label>
                                                    <input type="text" name="uurl" id="uurl" class="form-control" value="<?= $sm['url'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="uicon">Icon</label>
                                                    <input type="text" name="uicon" id="uicon" class="form-control" value="<?= $sm['icon'] ?>">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-warning" type="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

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
                <h5 class="modal-title" id="tambahModalLabel">Tambah Sub Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('submenu/add') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <select class="form-control" name="menu" id="menu">
                            <option value="">- Pilih -</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control" placeholder="...">
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