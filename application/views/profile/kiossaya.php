<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> yang anda miliki ada : <?= count($kios) ?> Kios / Los</h1>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">
        <?php foreach ($kios as $k) : ?>
            <div class="card mr-4 ml-2 mb-2 mt-2" style="width: 17rem;">

                <img class="card-img-top" src="<?= base_url('assets/kioss/' . $k['foto']) ?>" style="height:5cm; weight:5cm;" alt="Card image cap">
                <div class="card-body">

                    <h5 class="mt-1 mb-1 ml-1 mr-1"><b>Blok :<?= $k['blok'] ?> </b></h5>
                    <p style="font-style: italic;">Nomor : <?= $k['nomor'] ?> </p>
                    <p style="font-style: italic;">Ukuran :<?= $k['ukuran'] ?> </p>

                    <?php if ($k['lantai'] > 0) : ?>
                        <p style="font-style: italic;">Lantai : Satu</p>
                    <?php else : ?>
                        <p style="font-style: italic;">Lantai : Dasar</p>
                    <?php endif; ?>

                    <p style="font-style: italic;">Harga : Rp. <?= number_format($k['harga']) ?> ,-</p>

                    <?php if ($k['bayar'] != 0) : ?>
                        <p style="font-style: italic;">Bayar : Rp. <?= number_format($k['bayar']) ?> ,-</p>
                    <?php else : ?>
                        <p style="font-style: italic;">Bayar : Belum bayar </p>
                    <?php endif; ?>

                    <!-- Sisa Pembayaran -->
                    <?php
                    $a = $k['harga'];
                    $b = $k['bayar'];
                    $sisa = $a - $b;
                    $c = $k['n_diskon'];
                    $d = $a - $c;
                    $sd = $sisa - $c;
                    ?>

                    <!-- jika sudah bayar -->
                    <?php if ($k['bayar'] > 0) : ?>
                        <!-- jika ada diskon Cash Sisa Pembayaran -->
                        <?php if ($k['diskon'] == true) : ?>
                            <?php if ($k['pembayaran_id'] == 5 && $sisa == $c) : $status = 'Lunas'; ?>
                                <p style="font-style: italic;">Sisa : <b> Lunas Dengan Diskon <?= $k['diskon'] . '% Dari Sisa Pembayaran'; ?></p>
                            <?php elseif ($k['pembayaran_id'] == 2) : ?>
                                <?php if ($c + $b == $a) : $status = 'Lunas';  ?>
                                    <p style="font-style: italic;">Sisa : <b> Lunas Dengan Cash Keras Dengan Diskon <?= $k['diskon']; ?>%</b></p>
                                <?php endif; ?>
                            <?php else : $status = 'Belum Lunas'; ?>
                                <p style="font-style: italic;">Sisa : Rp. <?= number_format($sd) ?> ,-</p>
                            <?php endif; ?>
                        <?php elseif (!$a == $sisa) : $status = 'Lunas';  ?>
                            <p style="font-style: italic;">Sisa : <b>Lunas 100%</b></p>
                        <?php else : $status = 'Belum Lunas'; ?>
                            <p style="font-style: italic;">Sisa : Rp. <?= number_format($sisa) ?> ,-</p>
                        <?php endif; ?>
                        <!-- jika ada diskon -->
                    <?php elseif ($k['diskon'] == true) : $status = 'Belum Lunas'; ?>
                        <p style="font-style: italic;">Sisa : Rp. <?= number_format($d) ?> ,-</p>
                    <?php else : $status = 'Belum Lunas'; ?>
                        <p style="font-style: italic;">Sisa : Rp. <?= number_format($a) ?> ,-</p>
                    <?php endif; ?>
                    <!-- jika sudah bayar -->

                    <p style="font-style: italic;">Status : <?= $status ?> </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</div>
<!-- /.container-fluid -->