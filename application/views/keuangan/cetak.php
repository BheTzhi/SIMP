<html>

<head>
    <title><?= $title . ' ' . $pegawai['nama'] ?></title>
</head>
<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?= base_url('assets/'); ?>css/paper.css" rel="stylesheet">
<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<style>
    @page {
        size: A5 landscape
    }

    img.tengah {
        width: 325px;

        height: 50px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    hr {
        height: 5px;
        background-color: black;
        box-shadow: 0 5px 5px -5px #8c8c8c inset;

    }
</style>

<body class="A5">

    <img class="tengah" src="<?= base_url('assets/img/logo2.jpg'); ?>">

    <hr width="90%" style="background-color: black;" />

    <div class="left" style="text-align: end; margin-right:1cm;">
        <p class="card-text">Cetak : <small class=" text-muted"><?= date('d, F Y'); ?></small></p>
    </div>

    <!-- Isi -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-md-2">
                    <img style="height: 6cm;" style="width: 4cm;" src="<?= base_url('assets/img/') . $pegawai['foto']; ?>" class="card-img">
                </div>

                <div class="col-md-10">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Nama : <?= $pegawai['nama']; ?></h4>
                                <h5 class="card-text">Nip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['nip']; ?></h5>
                                <!-- kondisi -->

                                <h5 class="card-text">Masuk &nbsp;: <?= $pegawai['masuk']; ?> Hari</h5>
                                <h5 class="card-text">Izin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['izin']; ?> Hari</h5>
                                <h5 class="card-text">Sakit &nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['sakit']; ?> Hari</h5>
                                <h5 class="card-text">Alfa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['alpa']; ?> Hari</h5>
                            </div>

                            <div class="col-md-5">
                                <h4 class="card-title">Golongan : <?= $pegawai['role']; ?></h4>
                                <h6 class="card-text">Gaji Pokok : Rp.<?= number_format($pegawai['pokok']); ?>,-</h6>
                                <h6 class="card-text">Tunjangan : Rp.<?= number_format($pegawai['tunjangan']); ?>,-</h6>

                                <?php
                                foreach ($potongan as $pot) :
                                    if ($pot['keterangan'] == 'Sakit') :
                                        $sakit = $pot['nominal'];
                                    elseif ($pot['keterangan'] == 'Izin') :
                                        $izin = $pot['nominal'];
                                    elseif ($pot['keterangan'] == 'Alpa') :
                                        $alpa = $pot['nominal'];
                                    endif;
                                endforeach;

                                $sakit = $pegawai['sakit'] * $sakit;
                                $izin = $pegawai['izin'] * $izin;
                                $apla = $pegawai['alpa'] * $alpa;

                                ?>

                                <!-- hitung izin -->
                                <h6 class="card-text">Izin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?= number_format($izin); ?>,-</h6>
                                <!-- hitung sakit -->

                                <h6 class="card-text">Sakit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?= number_format($sakit); ?>,-</h6>
                                <!-- hitung alfa -->

                                <h6 class="card-text">Alfa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?= number_format($alpa); ?>,-</h6>
                                <!-- hitung total gaji -->
                                <?php $totalga = ($pegawai['pokok'] + $pegawai['tunjangan']) - ($izin + $sakit + $alpa); ?>

                                <hr class="sidebar-divider mt-3">

                                <?php
                                $kata =  $pegawai['bulantahun'];
                                $bulan = substr($kata, 0, 2);
                                $tahun = substr($kata, 2, 6);
                                $bulantahun = mktime($bulan, $tahun);

                                ?>
                                <h5 class="card-text">Gaji Bulan <?= date('F Y', $bulantahun) . " : Rp." . number_format($totalga); ?>,-</h5>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer class="sticky-footer bg-white">
        <div style="text-align: center; line-height: 70%; margin-top:15px;">
            <h3><b> Office: </b></h3>
            <p>Ruko Pom Bensin No.5 Jl. Raya Jati Asih, Jatiasih - Kota Bekasi</p>
            <p>No. Telpon : 081255446633</p>
            <p>Email : muktisaranaabadiofficial@yahoo.com</p>
        </div>
        <script type="text/javascript">
            window.print();
        </script>

    </footer>

</body>

</html>