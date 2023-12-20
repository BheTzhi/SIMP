<html>

<head>
    <title><?= $title ?></title>
</head>
<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<style>
    @page {
        size: landscape;
    }

    img.tengah {
        width: 400px;

        height: 100px;
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

<body>

    <img class="tengah" src="<?= base_url('assets/img/logo2.jpg'); ?>">

    <hr width="90%" style="background-color: black;" />

    <div class="left" style="text-align: end; margin-right:1cm;">
        <p class="card-text">Cetak : <small class=" text-muted"><?= date('d, F Y'); ?></small></p>
    </div>

    <!-- Isi -->
    <div class="card shadow mb-2 mt-2">
        <div class="card-body">
            <div class="row">

                <img style="height: 250px; width:200px" src="<?= base_url('assets/img/') . $pegawai['foto']; ?>" class="card-img ml-2">

                <div class="card-body ml-4">
                    <div class="row">
                        <div class="column ml-4 mr-4">

                            <h4 class="card-title">Nama : <?= $pegawai['nama']; ?></h4>
                            <p class="card-text">Nip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['nip']; ?><br>

                                <!-- kondisi -->
                                Masuk &nbsp;: <?= $pegawai['masuk']; ?> Hari <br>
                                Izin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['izin']; ?> Hari <br>
                                Sakit &nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['sakit']; ?> Hari <br>
                                Alfa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['alpa']; ?> Hari</p>

                        </div>

                        <div class="column ml-4">
                            <h4> Jabatan : <?= $pegawai['role']; ?> <br></h4>
                            Gaji Pokok : Rp.<?= number_format($pegawai['pokok']); ?>,- <br>
                            Tunjangan : Rp.<?= number_format($pegawai['tunjangan']); ?>,- <br>

                            <?php
                            $sakit = $sak['nominal'] * $pegawai['sakit'];
                            $izin = $izi['nominal'] * $pegawai['izin'];
                            $alpa = $alp['nominal'] * $pegawai['alpa'];
                            $total = $sakit + $izin + $alpa;
                            ?>

                            <!-- hitung izin -->
                            Izin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?= number_format($izin); ?>,- <br>
                            <!-- hitung sakit -->

                            Sakit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?= number_format($sakit); ?>,- <br>
                            <!-- hitung alpa -->

                            Alpa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?= number_format($alpa); ?>,-</h6>

                            <!-- hitung total gaji -->
                            <?php $totalga = ($pegawai['pokok'] + $pegawai['tunjangan']) - $total; ?>

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

    <h4 style="text-align: right; margin: bottom 2px;"> TTD,</h4>
    <h5 style="text-align: right;"> <u>PT. Mukti Sarana Abadi</u></h5>

    <footer class="bg-white">
        <div style="text-align: center; line-height: 70%;">
            <h3><b> Office: </b></h3>
            <p>Ruko Pom Bensin No.5 Jl. Raya Jati Asih, Jatiasih - Kota Bekasi </p>
            <p> No. Telpon : 081255446633 </p>
            <p> Email : muktisaranaabadiofficial@yahoo.com</p>
        </div>
        <script type="text/javascript">
            window.print();
        </script>

    </footer>

</body>

</html>