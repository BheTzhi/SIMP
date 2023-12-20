<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?php if ($retribusi != false) : ?>

        <?php if ($this->input->post('tanggal')) : ?>
            <div class="content">
                <h4>Pasar Jatiasih, <?= date('d F Y', strtotime($this->input->post('tanggal'))) ?></h4>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kios</th>
                                    <th>Tagihan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($retribusi as $r) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $r['nama'] ?></td>
                                        <td><?= $r['blok'] . '.' . $r['nomor'] ?></td>
                                        <td>Rp. <?= number_format($r['tagihan']) ?></td>
                                        <td><?= date('d, F Y', $r['tglblnthn']) ?></td>
                                        <td><?= getStatus($r['status']) ?></td>
                                        <td>
                                            <?php if ($r['status'] != 1) : ?>
                                                <a href="<?= base_url('retribusi/bayar/' . encrypt_url($r['id'])) ?>" class="btn btn-sm btn-success" onclick="return confirm('Yakin sudah membayar.?')"><i class="fas fa-fw fa-check"></i> Bayar</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php if ($retribusi != null) : // Data nantinya 
            ?>
            <?php else : ?>
                <script>
                    alert('Silahkan pilih data yang tersedia')
                </script>
                &nbsp;&nbsp;&nbsp;<span><i class="fas fa-fw fa-exclamation-triangle"></i><b> Silahkan Pilih tanggal</b></span>
            <?php endif; ?>
        <?php else : ?>
            &nbsp;&nbsp;&nbsp;<span><i class="fas fa-fw fa-exclamation-triangle"></i><b> Silahkan Pilih tanggal</b></span>
            <?= form_open_multipart(); ?>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>

                        <div class="form-group col-lg-4">
                            <button type="submit" name="cari" class="btn btn-warning caris"><i class="fas fa-fw fa-search"></i> Cari Data</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


    <?php else : ?>
        <a href="<?= base_url('retribusi/cetaktagihan') ?>" class="btn btn-secondary mb-3"><i class="fas fa-fw fa-file"></i> Cetak Tagihan Retribusi</a>
    <?php endif ?>
</div>
<!-- /.container-fluid -->