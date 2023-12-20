<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

        <?php if ($this->input->get('jenis')) : ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url($this->uri->segment(1)) ?>"><?= $this->uri->segment(1) ?></a> &nbsp;/&nbsp; <?= $this->input->get('jenis') ?> </div>
        <?php endif; ?>
    </div>

    <!-- Kios -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemilik</th>
                            <th>Blok</th>
                            <th>Nomor</th>
                            <th>Lantai</th>
                            <th>Bulan</th>
                            <th>Tarif</th>
                            <th>St Awal</th>
                            <th>St Akhir</th>
                            <th>M B Lalu</th>
                            <th>M B Ini</th>
                            <th>Pemakaian</th>
                            <th>Kelebihan</th>
                            <th>Kekurangan</th>
                            <th>Biaya Pemakaian</th>
                            <th>Terbilang</th>
                            <th>Batas Akhir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $tarif = 10000;
                        foreach ($kios as $k) :
                            $bulantahun = substr($k['bulantahun'], 1, 4) . '-' . substr($k['bulantahun'], 0, -4);
                            $biaya = ($k['pemakaian'] * $tarif) - $k['kblalu'] + $k['kbbl'];

                            if ($k['blok_id'] == 8) :
                                $noms = getUtility($k['nomor']);
                            else :
                                $noms = $k['nomor'];
                            endif;

                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $k['nama'] ?></td>
                                <td><?= $k['blok'] ?></td>
                                <td><?= $noms ?></td>
                                <td><?= getLantai($k['lantai']) ?></td>
                                <td><?= tgl_indo(date('m-Y', strtotime($bulantahun))) ?></td>
                                <td><?= number_format($tarif) ?>/ <i>M<sup>3</sup></i></td>
                                <td><?= $k['awal'] ?></td>
                                <td><?= $k['akhir'] ?></td>
                                <td><?= $k['blalu'] ?></td>
                                <td><?= $k['bini'] ?></td>
                                <td><?= $k['pemakaian'] ?></td>
                                <td><?= number_format($k['kblalu']) ?></td>
                                <td><?= number_format($k['kbbl']) ?></td>
                                <td><?= number_format($biaya) ?></td>
                                <td><?= number_to_words($biaya) ?></td>
                                <td>17 <?= $bulan['bulan'] . ' ' . $tahun ?></td>
                                <td><?= getStatus($k['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->