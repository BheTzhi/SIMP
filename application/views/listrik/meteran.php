<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

        <?php if ($this->uri->segment(5)) : ?>
            <?php if ($kios['blok_id'] == 8) :
                $nomor = getUtility($kios['nomor']);
            else : $nomor = 'Nomor ' . $kios['nomor'];
            endif; ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url($this->uri->segment(1)) ?>"><?= $this->uri->segment(1) ?></a> &nbsp;/&nbsp; <a href="<?= base_url('listrik/' . $this->uri->segment(2)) ?>"><?= $this->uri->segment(2) ?></a> &nbsp;/&nbsp; <a href="<?= base_url('listrik/meteran/' . $this->uri->segment(3)) ?>">Blok <?= $blok['blok'] ?></a> &nbsp;/&nbsp; <a href="<?= base_url('listrik/meteran/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>"><?= $nomor ?></a> &nbsp;/&nbsp; Edit </div>
        <?php elseif ($this->uri->segment(4)) : ?>
            <?php if ($kios['blok_id'] == 8) :
                $nomor = getUtility($kios['nomor']);
            else : $nomor = 'Nomor ' . $kios['nomor'];
            endif; ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url($this->uri->segment(1)) ?>"><?= $this->uri->segment(1) ?></a> &nbsp;/&nbsp; <a href="<?= base_url('listrik/' . $this->uri->segment(2)) ?>"><?= $this->uri->segment(2) ?></a> &nbsp;/&nbsp; <a href="<?= base_url('listrik/meteran/' . $this->uri->segment(3)) ?>">Blok <?= $blok['blok'] ?></a> &nbsp;/&nbsp; <?= $nomor ?> </div>
        <?php elseif ($this->uri->segment(3)) : ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url($this->uri->segment(1)) ?>"><?= $this->uri->segment(1) ?></a> &nbsp;/&nbsp; <a href="<?= base_url('listrik/' . $this->uri->segment(2)) ?>"><?= $this->uri->segment(2) ?></a> &nbsp;/&nbsp; Blok <?= $blok['blok'] ?> </div>
        <?php elseif ($this->uri->segment(2)) : ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url($this->uri->segment(1)) ?>"><?= $this->uri->segment(1) ?></a> &nbsp;/&nbsp; <?= $this->uri->segment(2) ?> </div>
        <?php endif; ?>
    </div>

    <!-- Blok -->
    <?php if ($this->uri->segment(3) == false && $this->uri->segment(4) == false) : ?>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Blok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($blok as $b) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $b['blok'] ?></td>
                                    <td>
                                        <a href="<?= base_url('listrik/meteran/' . encrypt_url($b['id'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i> Lihat</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Kios -->
    <?php elseif ($this->uri->segment(4) == false) : ?>
        <a href="<?= base_url('listrik/meteran/') ?>" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>

        <?= $this->session->flashdata('pesan'); ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Blok</th>
                                <th>Nomor</th>
                                <th>Daya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($kios as $k) :
                                if ($k['l_status'] == Null) {
                                    $status = 'Mati';
                                } else {
                                    $status = 'Nyala';
                                }

                                if ($k['blok_id'] == 8) : $nomor = getUtility($k['nomor']);
                                else : $nomor = $k['nomor'];
                                endif;

                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $k['blok'] ?></td>
                                    <td><?= $nomor ?></td>
                                    <td><?= number_format($k['daya']) ?> Watt</td>
                                    <td><?= $status ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editDaya" data-id="<?= $k['listrik_id'] ?>" data-kios="<?= $k['id'] ?>" class="btn btn-sm btn-success lst"><i class="fas fa-fw fa-edit"></i> Ubah Daya</a>
                                        <?php if ($k['l_status'] == Null) : ?>
                                            <a href="<?= base_url('listrik/status/' . encrypt_url(1) . '/' . encrypt_url($k['id']) . '/' . encrypt_url($k['blok_id'])) ?>" class="btn btn-sm btn-warning" onclick="return confirm('Yakin ingin menyalahkan Meteran Listrik kios <?= $k['blok'] . $k['nomor'] ?> ?');"><i class="fas fa-fw fa-bolt"></i> Nyalakan</a>
                                        <?php else : ?>
                                            <a href="<?= base_url('listrik/status/' . encrypt_url(0) . '/' . encrypt_url($k['id']) . '/' . encrypt_url($k['blok_id'])) ?>" class="btn btn-sm btn-danger mati" onclick="return confirm('Yakin ingin mematikan Meteran Listrik kios <?= $k['blok'] . $k['nomor'] ?> ?');"><i class="fas fa-fw fa-bolt"></i> Matikan</a>
                                        <?php endif; ?>
                                        <?php if ($k['l_status'] == Null) : ?>
                                        <?php else : ?>
                                            <a href="<?= base_url('listrik/meteran/' . encrypt_url($k['blok_id']) . '/' . encrypt_url($k['id'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i> Input Kwh</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Detail Kios -->
    <?php elseif ($this->uri->segment(4) == true && $this->uri->segment(5) == false) : ?>
        <a href="<?= base_url('listrik/meteran/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>

        <?= $this->session->flashdata('pesan'); ?>

        <div class="row mt-4 start" style="display: block;">

            <div class="col-lg-12">
                <div class="row">

                    <div class="form-group col-md-6 mt-4">
                        <a class="btn btn-primary form-control" id="add"><i class="fas fa-fw fa-plus"></i> Input Kwh</a>
                    </div>

                    <div class="form-group col-md-6 mt-4">
                        <a id="edit" href="<?= base_url('listrik/meteran/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/edit') ?>" class="btn btn-success form-control"><i class="fas fa-fw fa-edit"></i> Edit Kwh</a>
                    </div>

                </div>
            </div>
        </div>

        <?= form_open_multipart('listrik/addkwh/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>

        <div class="row mt-4 add" style="display: none;">

            <div class="col-lg-12">


                <div class="row">
                    <!-- Bulan Tahun -->
                    <div class="form-group col-md-6">
                        <label for="bulan">Pilih Bulan</label>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tahun">Pilih Tahun</label>
                    </div>

                    <div class="form-group col-md-6">
                        <select name="bulan" id="bulan" class="custom-select">
                            <option value="" selected>- Bulan -</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select name="tahun" id="tahun" class="custom-select">
                            <option value="" selected>- Tahun -</option>
                            <?php for ($i = 2023; $i <= date('Y'); $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <!-- End Bulan Tahun -->

                    <!-- Pemakaian Kwh -->
                    <div class="form-group col-md-12 sss" style="display: none;">
                        <center><label for="bini"><i>Pemakaian Kwh</i></label></center>
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <input type="hidden" name="kid" id="kid" value="<?= $kios['id'] ?>" class="form-control">
                        <label for="blalu">Bulan Lalu</label>
                        <input type="text" name="blalu" id="blalu" class="form-control" readonly>
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="awal">St Awal</label>
                        <input type="date" name="awal" id="awal" class="form-control">
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="bini">Bulan Ini</label>
                        <input type="text" name="bini" id="bini" class="form-control" minlength="1" maxlength="8" onkeypress="return isNumberKey(event)">
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="akhir">St Akhir</label>
                        <input type="date" name="akhir" id="akhir" class="form-control">
                    </div>
                    <!-- End Pemakaian Kwh -->

                    <!-- Kelebihan Bulan Lalu -->
                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="kblalu"><i>Kelebihan Bayar Bulan Lalu</i></label>
                        <a class="btn btn-sm btn-primary" id="kbl">Klik Me</a>
                        <div class="input-group input-group-md">
                            <div class="input-group-prepend">
                                <span class="input-group-text s1" style="display: none;">Rp.</i></span>
                            </div>
                            <input style="display: none;" type="text" class="form-control s1" name="kblalu" id="kblalu" onkeypress="return isNumberKey(event)" value="0">
                        </div>
                    </div>
                    <!-- End Kelebihan Bulan Lalu -->

                    <!-- Kekurangan Bulan Lalu -->
                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="kbbl"><i>Kekurangan Bayar Bulan Lalu</i></label>
                        <a class="btn btn-sm btn-primary" id="kbbls">Klik Me</a>
                        <div class="input-group input-group-md">
                            <div class="input-group-prepend">
                                <span class="input-group-text s2" style="display: none;">Rp.</i></span>
                            </div>
                            <input style="display: none;" type="text" class="form-control s2" name="kbbl" id="kbbl" onkeypress="return isNumberKey(event)" value="0">
                        </div>
                    </div>
                    <!-- End Kekurangan Bulan Lalu -->

                    <!-- Beban % -->
                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="beban">Beban Bulan Ini</label>
                        <div class="input-group input-group-md">
                            <input type="text" name="beban" id="beban" class="form-control col-md-3" minlength="1" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-percent"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Beban % -->

                    <!-- Pemakaian -->
                    <div class="form-group col-md-2 sss" style="display: none;">
                        <label for="pemakaian">Pemakaian Bulan Ini</label>
                        <div class="input-group input-group-md">
                            <input type="text" name="pemakaian" id="pemakaian" class="form-control" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-bolt"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Pemakaian -->

                    <!-- Foto Kwh -->
                    <div class="form-group col-md-6 sss" style="display: none;">
                        <label for="bini">Foto Kwh Bulan Ini</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img id="gmb" src="" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('gmb').src = window.URL.createObjectURL(this.files[0])">
                                        <span style="font-style: italic; font-size:10px">* Max 1 MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Foto Kwh -->

                </div>

                <!-- Button Confirm -->
                <div class="form-group sss mt-4" style="display: none;">
                    <button class="btn btn-primary form-control" type="submit" onclick="return confirm('Yakin data yang di masukan sudah benar?');">Simpan</button>
                </div>
                <!-- End of Button Confirm -->

            </div>
        </div>

        <?= form_close() ?>

        <!-- Edit -->
    <?php elseif ($this->uri->segment(4) == true && $this->uri->segment(5) == 'edit') : ?>
        <a href="<?= base_url('listrik/meteran/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
        <?= $this->session->flashdata('pesan'); ?>

        <?= form_open_multipart('listrik/editkwh/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>

        <div class="row mt-4">

            <h4 class="ml-2 mb-4">Ubah Data Kwh Meter</h4>

            <div class="col-lg-12">

                <div class="row">

                    <!-- Bulan Tahun -->
                    <div class="form-group col-md-6">
                        <label for="bulan">Pilih Bulan</label>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tahun">Pilih Tahun</label>
                    </div>

                    <div class="form-group col-md-6">
                        <select name="bulan" id="bulan" class="custom-select">
                            <option value="" selected>- Bulan -</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select name="tahun" id="tahun" class="custom-select">
                            <option value="" selected>- Tahun -</option>
                            <?php foreach ($tahun as $t) : ?>
                                <option value="<?php echo $t['tahun']; ?>"><?php echo $t['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- End Bulan Tahun -->

                    <!-- Pemakaian Kwh -->
                    <div class="form-group col-md-12 sss" style="display: none;">
                        <center><label for="bini"><i>Pemakaian Kwh</i></label></center>
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <input type="hidden" name="kid" id="kid" value="<?= $kios['id'] ?>" class="form-control">
                        <label for="blalu">Bulan Lalu</label>
                        <input type="text" name="blalu" id="blalu" class="form-control" readonly>
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="awal">St Awal</label>
                        <input type="date" name="awal" id="awal" class="form-control">
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="bini">Bulan Ini</label>
                        <input type="text" name="bini" id="bini" class="form-control" minlength="1" maxlength="8" onkeypress="return isNumberKey(event)">
                    </div>

                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="akhir">St Akhir</label>
                        <input type="date" name="akhir" id="akhir" class="form-control">
                    </div>
                    <!-- End Pemakaian Kwh -->

                    <!-- Kelebihan Bulan Lalu -->
                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="kblalu"><i>Kelebihan Bayar Bulan Lalu</i></label>
                        <a class="btn btn-sm btn-primary" id="kbl">Klik Me</a>
                        <div class="input-group input-group-md">
                            <div class="input-group-prepend">
                                <span class="input-group-text s1" style="display: none;">Rp.</i></span>
                            </div>
                            <input style="display: none;" type="text" class="form-control s1" name="kblalu" id="kblalu" onkeypress="return isNumberKey(event)" value="0">
                        </div>
                    </div>
                    <!-- End Kelebihan Bulan Lalu -->

                    <!-- Kekurangan Bulan Lalu -->
                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="kbbl"><i>Kekurangan Bayar Bulan Lalu</i></label>
                        <a class="btn btn-sm btn-primary" id="kbbls">Klik Me</a>
                        <div class="input-group input-group-md">
                            <div class="input-group-prepend">
                                <span class="input-group-text s2" style="display: none;">Rp.</i></span>
                            </div>
                            <input style="display: none;" type="text" class="form-control s2" name="kbbl" id="kbbl" onkeypress="return isNumberKey(event)" value="0">
                        </div>
                    </div>
                    <!-- End Kekurangan Bulan Lalu -->

                    <!-- Beban % -->
                    <div class="form-group col-md-3 sss" style="display: none;">
                        <label for="beban">Beban Bulan Ini</label>
                        <div class="input-group input-group-md">
                            <input type="text" name="beban" id="beban" class="form-control col-md-3" minlength="1" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-percent"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Beban % -->

                    <!-- Pemakaian -->
                    <div class="form-group col-md-2 sss" style="display: none;">
                        <label for="pemakaian">Pemakaian Bulan Ini</label>
                        <div class="input-group input-group-md">
                            <input type="text" name="pemakaian" id="pemakaian" class="form-control" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-bolt"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Pemakaian -->

                    <!-- Foto Kwh -->
                    <div class="form-group col-md-6 sss" style="display: none;">
                        <label for="bini">Foto Kwh Bulan Ini</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img id="gmb" src="" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="foto" name="foto" onchange="document.getElementById('gmb').src = window.URL.createObjectURL(this.files[0])">
                                        <span style="font-style: italic; font-size:10px">* Max 1 MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Foto Kwh -->

                </div>

                <div class="form-group sss mt-4" style="display: none;">
                    <button class="btn btn-success form-control" type="submit" onclick="return confirm('Yakin ingin mengubah data?');">Ubah</button>
                </div>


            </div>
        </div>

        <?= form_close() ?>

    <?php endif; ?>

</div>
<!-- /.container-fluid -->

<!-- Edit -->
<div class="modal fade" id="editDaya" tabindex="-1" role="dialog" aria-labelledby="editDayaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDayaLabel">Tambah List Listrik</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('listrik/ubahdaya/') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group sel">
                        <label for="daya">Daya</label>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="blok" value="<?= $this->uri->segment(3); ?>">
                        <select name="daya" id="daya" class="form-control">
                            <?php foreach ($listrik as $l) : ?>
                                <option value="<?= $l['id'] ?>"><?= number_format($l['daya']) ?> Watt</option>
                            <?php endforeach; ?>
                        </select>
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