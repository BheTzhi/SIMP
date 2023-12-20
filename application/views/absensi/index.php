<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>


    <?php if ($this->input->post('bulan') == true && $this->input->post('tahun') == true) : ?>
        <?php if ($pegawai != null) : ?>
        <?php else : ?>
            <script>
                alert('Silahkan pilih data bulan tahun yang tersedia')
            </script>
            &nbsp;&nbsp;&nbsp;<span><i class="fas fa-fw fa-exclamation-triangle"></i><b> Silahkan Pilih Bulan Tahun</b></span>
        <?php endif; ?>
    <?php else : ?>
        &nbsp;&nbsp;&nbsp;<span><i class="fas fa-fw fa-exclamation-triangle"></i><b> Silahkan Pilih Bulan Tahun</b></span>
    <?php endif; ?>


    <?= form_open_multipart(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="form-group col-md-5">
                    <select name="bulan" id="bulan" class="custom-select">
                        <option value="" selected>- Bulan -</option>
                        <?php foreach ($bulan as $b) : ?>
                            <option value="<?= $b['id']; ?>"><?= $b['bulan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <select name="tahun" id="tahun" class="custom-select">
                        <option value="" selected>- Tahun -</option>
                        <?php for ($i = 2020; $i <= date('Y'); $i++) : ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" name="cari" class="btn btn-warning caris"><i class="fas fa-fw fa-search"></i> Cari Data</button>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary inp-pop" style="display: inline-block;"><i class="fas fa-fw fa-plus"></i> Input Absen</a>
                    <button type="submit" class="btn btn-success smpn-pop" name="simpan" style="display: none;"><i class="fas fa-fw fa-plus"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Input Absen Example -->
    <div class="card shadow mb-4">

        <div class="card-body tbl" style="display: none;">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Masuk</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pegawai as $p) :
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/img/') . $p['foto']; ?>" class="img-thumbnail">
                                </td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['role'] ?></td>
                                <td>
                                    <input class="form-control" type="hidden" name="pegawai[]" id="pegawai[]" value="<?= $p['id'] ?>">
                                    <input class="form-control" type="text" name="masuk[]" id="masuk[]">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="izin[]" id="izin[]">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="sakit[]" id="sakit[]">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="alpa[]" id="alpa[]">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php if ($this->input->post('bulan') == true && $this->input->post('tahun') == true) : ?>
        <!-- Input Absen Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Masuk</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Alpa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($bybulan as $pgw) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/img/') . $pgw['foto']; ?>" class="img-thumbnail">
                                    </td>
                                    <td><?= $pgw['nama'] ?></td>
                                    <td><?= $pgw['role'] ?></td>
                                    <td><?= $pgw['masuk'] ?></td>
                                    <td><?= $pgw['izin'] ?></td>
                                    <td><?= $pgw['sakit'] ?></td>
                                    <td><?= $pgw['alpa'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    <?php endif; ?>

    <?= form_close(); ?>
</div>
<!-- /.container-fluid -->