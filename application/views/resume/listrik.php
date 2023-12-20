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
                            <th>No Meteran</th>
                            <th>Nama Pemilik</th>
                            <th>Blok</th>
                            <th>Nomor</th>
                            <th>Lantai</th>
                            <th>Bulan</th>
                            <th>St Awal</th>
                            <th>St Akhir</th>
                            <th>Daya</th>
                            <th>Kwh Bulan Lalu</th>
                            <th>Kwh Bulan Ini</th>
                            <th>Pemakaian</th>
                            <th>Per Kwh</th>
                            <th>Penyesuaian</th>
                            <th>Rp</th>
                            <th>Tarif</th>
                            <th>Total</th>
                            <th>Abudemen</th>
                            <th>Kelebihan</th>
                            <th>Kekurangan</th>
                            <th>Grand Total</th>
                            <th>Tagihan</th>
                            <th>Terbilang</th>
                            <th>Batas Akhir</th>
                            <th>Foto</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kios as $k) :
                            $persen = $k['beban'] / 100;
                            $beban = $k['pkwh'] * $persen;
                            $tarif = $beban + (float)$k['pkwh'];
                            $total = $tarif * $k['pemakaian'];
                            $gt =  round($total + $k['harga'] - $k['kblalu'] + $k['kbbl']);
                            $pembulatan = pembulatan($gt);
                            $bulantahun =  substr($k['bulantahun'], 1, 4) . '-' . substr($k['bulantahun'], 0, -4);

                            $nomor = preg_replace("/[^0-9]/", "", $k['nomor']);
                            $hsl = str_replace("0", "", $nomor);

                            if ($k['blok_id'] == 8) :
                                $tno = getUtilityCode($k['nomor']);
                                $noms = getUtility($k['nomor']);
                            else :
                                $tno = $hsl;
                                $noms = $k['nomor'];
                            endif;
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= sprintf('%03d', $k['blok_id']) . $tno . '-' . $k['daya'] ?></td>
                                <td><?= $k['nama'] ?></td>
                                <td><?= $k['blok'] ?></td>
                                <td><?= $noms ?></td>
                                <td><?= getLantai($k['lantai']) ?></td>
                                <td><?= tgl_indo(date('m-Y', strtotime($bulantahun))) ?></td>
                                <td><?= date('d-m-Y', strtotime($k['awal'])) ?></td>
                                <td><?= date('d-m-Y', strtotime($k['akhir'])) ?></td>
                                <td><?= getAmper($k['daya']) . '/' . $k['daya'] ?></td>
                                <td><?= $k['blalu'] ?></td>
                                <td><?= $k['bini'] ?></td>
                                <td><?= round($k['pemakaian']) ?></td>
                                <td><?= $k['pkwh'] ?></td>
                                <td><?= $persen * 100 ?>%</td>
                                <td><?= number_format(round($beban)) ?></td>
                                <td><?= round($tarif, 2) ?></td>
                                <td><?= number_format(round($total)) ?></td>
                                <td><?= number_format($k['harga']) ?></td>
                                <td><?= number_format($k['kblalu']) ?></td>
                                <td><?= number_format($k['kbbl']) ?></td>
                                <td><?= number_format($gt) ?></td>
                                <td><?= number_format($pembulatan) ?></td>
                                <td><?= number_to_words($pembulatan) ?></td>
                                <td>17 <?= $bulan['bulan'] . ' ' . $tahun ?></td>
                                <td>
                                    <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/kwh/') . $k['foto']; ?>" class="img-thumbnail">
                                </td>
                                <td> <?= getStatus($k['status']) ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->