<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

        <?php if ($this->uri->segment('5') == 'edit') : ?>
            <?php if ($kios['blok_id'] == 8) :
                $nomor = getUtility($kios['nomor']);
            else : $nomor = 'Nomor ' . $kios['nomor'];
            endif; ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url('air') ?>"> air</a> &nbsp;/&nbsp; <a href="<?= base_url('air/' . $this->uri->segment(2)) ?>"> <?= $this->uri->segment(2) ?></a> &nbsp;/&nbsp; <a href="<?= base_url('air/' . $this->uri->segment(2) . '/' . $this->uri->segment(3)) ?>"> Blok <?= $blok['blok'] ?></a> &nbsp;/&nbsp; <a href="<?= base_url('air/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>"> <?= $nomor ?></a> &nbsp;/&nbsp; <?= $this->uri->segment(5) ?> </div>
        <?php elseif ($this->uri->segment('4') == true) : ?>
            <?php if ($kios['blok_id'] == 8) :
                $nomor = getUtility($kios['nomor']);
            else : $nomor = 'Nomor ' . $kios['nomor'];
            endif; ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url('air') ?>"> air</a> &nbsp;/&nbsp; <a href="<?= base_url('air/' . $this->uri->segment(2)) ?>"> <?= $this->uri->segment(2) ?></a> &nbsp;/&nbsp; <a href="<?= base_url('air/' . $this->uri->segment(2) . '/' . $this->uri->segment(3)) ?>"> Blok <?= $blok['blok'] ?></a> &nbsp;/&nbsp; <?= $nomor ?> </div>
        <?php elseif ($this->uri->segment('3') == true) : ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url('air') ?>"> air</a> &nbsp;/&nbsp; <a href="<?= base_url('air/' . $this->uri->segment(2)) ?>"> <?= $this->uri->segment(2) ?></a> &nbsp;/&nbsp; Blok <?= $blok['blok'] ?> </div>
        <?php else : ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url('air') ?>"> air</a> &nbsp;/&nbsp; <?= $this->uri->segment(2); ?> </div>
        <?php endif; ?>

    </div>

    <!-- Edit Pemakaian -->
    <?php if ($this->uri->segment('5') == 'edit') : ?>
        <a href="<?= base_url('air/meteran/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
        <?= $this->session->flashdata('pesan'); ?>

        <?= form_open_multipart('air/edit/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>

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
                                <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- End Bulan Tahun -->

                    <!-- Pemakaian Kwh -->
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

                    <!-- Pemakaian -->
                    <div class="form-group col-md-6 sss" style="display: none;">
                        <label for="pemakaian">Pemakaian Bulan Ini</label>
                        <input type="text" name="pemakaian" id="pemakaian" class="form-control" readonly>
                    </div>
                    <!-- End Pemakaian -->

                    <!-- Foto -->
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
                    <!-- End Foto -->


                </div>

                <div class="form-group sss mt-4" style="display: none;">
                    <button class="btn btn-success form-control" type="submit" onclick="return confirm('Yakin ingin mengubah data?');">Ubah</button>
                </div>


            </div>
        </div>

        <?= form_close() ?>
        <!-- Input Pemakaian -->
    <?php elseif ($this->uri->segment('4') == true) : ?>
        <a href="<?= base_url('air/meteran/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>

        <?= $this->session->flashdata('pesan'); ?>

        <div class="row mt-4 start" style="display: block;">

            <div class="col-lg-12">
                <div class="row">

                    <div class="form-group col-md-6 mt-4">
                        <a class="btn btn-primary form-control" id="add"><i class="fas fa-fw fa-plus"></i> Input Pemakaian</a>
                    </div>

                    <div class="form-group col-md-6 mt-4">
                        <a id="edit" href="<?= base_url('air/meteran/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/edit') ?>" class="btn btn-success form-control"><i class="fas fa-fw fa-edit"></i> Edit Kwh</a>
                    </div>

                </div>
            </div>
        </div>

        <?= form_open_multipart('air/add/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>

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

                    <!-- Pemakaian -->
                    <div class="form-group col-md-6 sss" style="display: none;">
                        <label for="pemakaian">Pemakaian Bulan Ini</label>
                        <input type="text" name="pemakaian" id="pemakaian" class="form-control" readonly>
                    </div>
                    <!-- End Pemakaian -->

                    <!-- Foto -->
                    <div class="form-group col-md-6 sss" style="display: none;">
                        <label for="bini">Foto Water Meter Bulan Ini</label>
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
                    <!-- End Foto -->


                </div>


                <div class="form-group sss mt-4" style="display: none;">
                    <button class="btn btn-primary form-control" type="submit" onclick="return confirm('Yakin data yang di masukan sudah benar?');">Simpan</button>
                </div>


            </div>
        </div>

        <?= form_close() ?>

        <!-- Kios By Blok -->
    <?php elseif ($this->uri->segment('3') == true) : ?>
        <a href="<?= base_url('air/meteran/') ?>" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>

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
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($kios as $k) :
                                if ($k['a_status'] == Null) {
                                    $status = 'Tidak Terinstal';
                                } else {
                                    $status = 'Terpasang';
                                }

                                if ($k['blok_id'] == 8) : $nomor = getUtility($k['nomor']);
                                else : $nomor = $k['nomor'];
                                endif;

                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $k['blok'] ?></td>
                                    <td><?= $nomor ?></td>
                                    <td><?= $status ?></td>
                                    <td>
                                        <?php if ($k['a_status'] == Null) : ?>
                                            <?php if ($user['role_id'] != 1) : ?>
                                            <?php else : ?>
                                                <a href="<?= base_url('air/status/' . encrypt_url(1) . '/' . encrypt_url($k['id']) . '/' . encrypt_url($k['blok_id'])) ?>" class="btn btn-sm btn-primary" onclick="return confirm('Yakin ingin memasang Istalasi air kios <?= $k['blok'] . $k['nomor'] ?> ?');"><i class="fas fa-fw fa-hand-holding-water"></i> Pasang Instalasi</a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?php if ($user['role_id'] != 1) : ?>
                                            <?php else : ?>
                                                <a href="<?= base_url('air/status/' . encrypt_url(0) . '/' . encrypt_url($k['id']) . '/' . encrypt_url($k['blok_id'])) ?>" class="btn btn-sm btn-danger mati" onclick="return confirm('Yakin ingin mematikan Istalasi air kios <?= $k['blok'] . $k['nomor'] ?> ?');"><i class="fas fa-fw fa-hand-holding-water"></i> Buka Instalasi</a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('air/meteran/' . encrypt_url($k['blok_id']) . '/' . encrypt_url($k['id'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-map-pin"></i> Input Pemakaian</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Blok -->
    <?php else : ?>
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
                                        <a href="<?= base_url('air/meteran/' . encrypt_url($b['id'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i> Lihat</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Kios -->

</div>
<!-- /.container-fluid -->