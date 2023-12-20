<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-800"><?= $title; ?></h1>
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
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning"><i class="fas fa-fw fa-search"></i> Cari Data</button>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>

    <?php if ($this->input->post('bulan') == true && $this->input->post('tahun') == true && $pegawai != null) : ?>
        <div class="card shadow mb-4 mt-2">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="row">Nomor</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Pokok</th>
                                <th>Tunjangan</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                                <th>Alpa</th>
                                <th>Potongan</th>
                                <th>Gaji</th>
                                <th>Aski</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1;
                            foreach ($pegawai as $p) :

                                $sakit = $sak['nominal'] * $p['sakit'];
                                $izin = $izi['nominal'] * $p['izin'];
                                $alpa = $alp['nominal'] * $p['alpa'];
                                $total = $sakit + $izin + $alpa;

                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/img/') . $p['foto']; ?>" class="img-thumbnail">
                                    </td>
                                    <td><?= $p['nama'] ?></td>
                                    <td>Rp. <?= number_format($p['pokok']) ?>,-</td>
                                    <td>Rp. <?= number_format($p['tunjangan']) ?>,-</td>
                                    <td><?= $p['sakit'] ?></td>
                                    <td><?= $p['izin'] ?></td>
                                    <td><?= $p['alpa'] ?></td>
                                    <td>Rp. <?= number_format($total) ?></td>
                                    <td>Rp. <?= number_format(($p['pokok'] + $p['tunjangan']) - $total) ?>,-</td>
                                    <td>
                                        <a href="<?= base_url('keuangan/cetak/' . encrypt_url($p['id'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-print"></i> Cetak Slip</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php elseif ($pegawai == null) : ?>
    <?php endif; ?>


</div>
<!-- /.container-fluid -->