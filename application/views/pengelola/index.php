<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <?php if ($this->uri->segment(4) == true) : ?>
        <?php elseif ($this->uri->segment(3) == true) : ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <a href="<?= base_url('pengelola/listrik/') ?>"><?= $title ?></a> &nbsp;/&nbsp; Blok <?= $blok['blok'] ?> </div>
        <?php else : ?>
            <div class="row"><a href="<?= base_url() ?>">Dashboard</a> &nbsp;/&nbsp; <?= $title ?> </div>
        <?php endif; ?>

    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?php if ($this->uri->segment(4) == true) : ?>
    <?php elseif ($this->uri->segment(3) == true) : ?>

        <?php if ($this->input->get('bulan') == 'null' && $this->input->get('tahun') == 'null') : ?>
        <?php elseif ($this->input->get('bulan') == true && $this->input->get('tahun') == true) : ?>
        <?php else : ?>
            &nbsp;&nbsp;&nbsp;<span><i class="fas fa-fw fa-exclamation-triangle"></i><b> Silahkan Pilih Bulan Tahun</b></span>
        <?php endif; ?>

        <form action="" method="get">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <select name="bulan" id="bulan" class="custom-select">
                                <option value="null" selected>- Bulan -</option>
                                <?php foreach ($bulans as $b) : ?>
                                    <option value="<?= $b['id']; ?>"><?= $b['bulan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="tahun" id="tahun" class="custom-select">
                                <option value="null" selected>- Tahun -</option>
                                <?php foreach ($tahuns as $t) : ?>
                                    <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-warning caris"><i class="fas fa-fw fa-search"></i> Cari Data</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <?php if ($this->input->get('bulan') == 'null' && $this->input->get('tahun') == 'null') : ?>

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
                                    <?php if ($role == 1 || $role == 7 || $role == 10) : ?>
                                        <th>Foto</th>
                                    <?php endif; ?>
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

                                    $bulan = substr($k['bulantahun'], 0, -4);
                                    $tahun = date('Y');
                                    if ($bulan == 12) :
                                        $tahun = date('Y') + 1;
                                        $bulan = 1;
                                    else : $bulan = $bulan + 1;
                                        $tahun = $tahun;
                                    endif;

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
                                        <td>17 <?= $this->db->get_where('bulan', ['id' => $bulan])->row_array()['bulan'] . ' ' . $tahun ?></td>
                                        <td>
                                            <img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/kwh/') . $k['foto']; ?>" class="img-thumbnail">
                                        </td>
                                        <td>
                                            <?= getStatus($k['status']) ?>
                                            <?php if ($k['status'] == 0) : ?>
                                                <a href="<?= base_url('pengelola/bayar/lst/' . encrypt_url($k['id'])) ?>" class="btn btn-sm btn-success" onclick="return confirm('Yakin sudah kios <?= $k['blok'] . $k['nomor'] ?> bayar tagihan listrik ?');"><i class="fas fa-fw fa-check"></i></a>
                                            <?php else :
                                            endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        <?php elseif ($this->input->get('bulan') == true && $this->input->get('tahun') == true) : ?>

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
                                    <?php if ($role == 1 || $role == 7 || $role == 10) : ?>
                                        <th>Foto</th>
                                    <?php endif; ?>
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
                                        <td>
                                            <?= getStatus($k['status']) ?>
                                            <?php if ($k['status'] == 0) : ?>
                                                <a href="<?= base_url('pengelola/bayar/lst/' . encrypt_url($k['id'])) ?>" class="btn btn-sm btn-success" onclick="return confirm('Yakin sudah kios <?= $k['blok'] . $k['nomor'] ?> bayar tagihan listrik ?');"><i class="fas fa-fw fa-check"></i></a>
                                            <?php else :
                                            endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php else : ?>
        <?php endif; ?>
    <?php else : ?>
        <!-- Blok -->
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
                                        <a href="<?= base_url('pengelola/listrik/' . encrypt_url($b['id'])) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i> Lihat</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->