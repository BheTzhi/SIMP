<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if ($kios['nomor'] == 001) : ?>
    <?php else : ?>
        <a href="<?= base_url('pasar/detailkios/' . encrypt_url($prev['id']) . '/' . encrypt_url($prev['blok_id'])) ?>" class="btn btn-sm btn-secondary mb-2" style="float: left;"><i class="fas fa-fw fa-arrow-left"></i> Prev</a>
    <?php endif; ?>
    <?php if ($kios['nomor'] == $terakhir['nomor']) : ?>
    <?php else : ?>
        <a href="<?= base_url('pasar/detailkios/' . encrypt_url($next['id']) . '/' . encrypt_url($next['blok_id'])) ?>" class="btn btn-sm btn-secondary mb-2" style="float: right;">Next <i class="fas fa-fw fa-arrow-right"></i></a>
    <?php endif; ?>

    <div class="col-md-12 row">
        <!-- Data Kios -->
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= base_url('assets/kioss/') . $kios['foto']; ?>">
                <div class="card-body">
                    <h5 class="card-title">Blok : <?= $kios['blok']; ?></h5>
                    <p class="card-text mt-2">Nomor : <?= $kios['nomor']; ?></br>
                        Type :
                        <?php if ($kios['blok'] == 'B') : ?>
                            <?php if ($kios['nomor'] < 297 && $kios['nomor'] > 278) : ?>
                                Kios <em>Foodcourt</em>
                            <?php else : ?>
                                <?= $kios['type']; ?>
                            <?php endif; ?>
                        <?php else : ?>
                            <?= $kios['type']; ?>
                        <?php endif; ?>
                        </br>

                        <!-- Ukuran Kios -->
                        <?php if ($kios['blok'] == "F" && $kios['nomor'] < 037) : ?>
                            Ukuran : 2 x 2</br>
                        <?php elseif ($kios['blok'] == 'G' && $kios['nomor'] < 003) : ?>
                            Ukuran : 3.4 x 3</br>
                        <?php elseif ($kios['blok'] == 'G' && $kios['nomor'] == 003) : ?>
                            Ukuran : 3.6 x 3</br>
                        <?php elseif ($kios['blok'] == 'G' && $kios['nomor'] == 004) : ?>
                            Ukuran : 3.8 x 3</br>
                        <?php elseif ($kios['blok'] == 'G' && $kios['nomor'] >= 005) : ?>
                            Ukuran : 4 x 3</br>
                        <?php elseif ($kios['blok'] != "F") : ?>
                            Ukuran : <?= $kios['ukuran']; ?></br>
                        <?php else : ?>
                            Ukuran : 3 x 3</br>
                        <?php endif; ?>

                        <!-- Lantai -->
                        <?php if ($kios['lantai'] < 1) : $lantai = 'Dasar';
                        else : $lantai = 'Satu';
                        endif; ?>
                        Lantai : <?= $lantai ?></br>

                        <!-- Harga -->
                        Harga : Rp. <?= number_format($kios['harga']); ?></br>

                        <!-- Bayar -->
                        <?php if (!$kios['status'] == 1) : ?>
                        <?php else : ?>
                            <?php $p = ($kios['bayar'] / $kios['harga']) * 100 / 100; ?>
                            Bayar : Rp. <?= number_format($kios['bayar']) . " ( " . round($p, 2) * 100; ?>% )</br>

                            <!-- Diskon -->
                            <?php if ($kios['diskon'] == true) : ?>
                                Diskon : <?= $kios['diskon']; ?>% ( Rp. <?= number_format($kios['n_diskon']); ?> )</br>
                            <?php else : ?>
                            <?php endif; ?>

                            <!-- Sisa Pembayaran 40% -->
                            <?php if ($empatpuluh <= $kios['bayar']) : ?>
                                Sisa 40% : <b>Lunas</b>
                            <?php else : ?>
                                <?php $sisas = $empatpuluh - $kios['bayar'] ?>
                                Sisa 40% : Rp. <?= number_format($sisas); ?>
                            <?php endif; ?></br>

                            <!-- Sisa Pembayaran -->
                            <?php
                            $a = $kios['harga'];
                            $b = $kios['bayar'];
                            $sisa = $a - $b;
                            $c = $kios['n_diskon'];
                            $d = $a - $c;
                            $sd = $sisa - $c;
                            ?>

                            <!-- jika sudah bayar -->
                            <?php if ($kios['bayar'] > 0) : ?>

                                <!-- jika ada diskon Cash Sisa Pembayaran -->
                                <?php if ($kios['diskon'] == true) : ?>
                                    <?php if ($kios['pembayaran_id'] == 5 && $sisa == $c) : ?>
                                        Sisa : <b> Lunas Dengan Diskon <?= $kios['diskon'] . '% Dari Sisa Pembayaran'; ?></b>
                                    <?php elseif ($kios['pembayaran_id'] == 2) : ?>
                                        <?php if ($c + $b == $a) : ?>
                                            Sisa : <b> Lunas Dengan Cash Keras Dengan Diskon <?= $kios['diskon']; ?>%</b>
                                        <?php endif; ?>

                                    <?php else : ?>
                                        Sisa : Rp. <?= number_format($sd); ?>
                                    <?php endif; ?>

                                <?php elseif (!$a == $sisa) : ?>
                                    Sisa : <b>Lunas 100%</b>
                                <?php else : ?>
                                    Sisa : Rp. <?= number_format($sisa); ?>
                                <?php endif; ?>
                                <!-- jika ada diskon -->
                            <?php elseif ($kios['diskon'] == true) : ?>

                                Sisa : Rp. <?= number_format($d); ?>

                            <?php else : ?>
                                Sisa : Rp. <?= number_format($a); ?>
                            <?php endif; ?>
                            <!-- jika sudah bayar -->
                            </br>
                        <?php endif; ?>
                        <!-- Status Kios -->
                        Status : <?php if ($kios['status'] == 1) {
                                        echo "Terjual";
                                    } else {
                                        echo "Kosong";
                                    } ?>
                    </p>

                    <!-- ======================================================================================================================================= -->
                    <!-- Cek Status -->
                    <?php if ($kios['status'] != 0) : ?>
                        <!-- Cek Lunas -->
                        <?php if ($kios['bayar'] != $kios['harga']) : ?>

                            <!-- ======================================================================================================================================= -->
                            <!-- Tombol Hilang ketika 40% & pelunasan masih 0 -->
                            <?php $asd = ($kios['bayar'] / $kios['harga']) * 100; ?>
                            <?php if ($asd == 40 && $kios['pembayaran_id'] == 0) : ?>
                                <script>
                                    alert('silahkan pilih metode pelunasan')
                                </script>
                                <!-- Tombol Bayar -->
                            <?php else : ?>
                                <a data-toggle="modal" data-target="#bayarKios" class="btn btn-primary mb-2"> <i class="fas fa-fw fa-dollar-sign"></i> Bayar</a>
                            <?php endif; ?>
                            <!-- ======================================================================================================================================= -->
                            <!-- Cek sudah pilih jenis pelunasan -->
                            <?php if ($kios['pembayaran_id'] != 0) : ?>
                            <?php else : ?>
                                <!-- ======================================================================================================================================= -->
                                <!-- Tombol Metode Pelunasan 60% -->
                                <a data-toggle="modal" data-target="#pembayaranKios" class="btn btn-primary mb-2"> <i class="fas fa-fw fa-euro-sign"></i> Pelunasan</a>
                            <?php endif; ?>
                        <?php else : ?>
                        <?php endif; ?>

                        <!-- ======================================================================================================================================= -->
                        <!-- Kondisi Diskon -->
                        <?php if ($kios['diskon'] == 0) : ?>
                            <?php if ($kios['harga'] == $kios['bayar']) : ?>
                            <?php else : ?>
                                <!-- Tombol Diskon -->
                                <a data-toggle="modal" data-target="#diskonKios" data-sisa="<?= $sisa ?>" class="btn btn-secondary mb-2 dis"> <i class="fas fa-fw fa-percent"></i> Diskon</a>
                            <?php endif; ?>
                        <?php else : ?>
                        <?php endif; ?>

                        <a href="<?= base_url('pasar/batalbeli/' . encrypt_url($kios['id']) . '/' . encrypt_url($kios['blok_id'])) ?>" class="btn btn-danger mb-2" onclick="return confirm('Yakin ingin membatalkan pembelian Kios <?= $kios['blok'] . '.' . $kios['nomor'] . ' milik ' . $kios['nama'] ?> ?')"> <i class="fas fa-fw fa-trash"></i> Batal Beli</a>
                    <?php else : ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <!-- Data Pemilik Kios -->
        <?php if (!$kios['status'] == 0) : ?>
            <div class="col-md-6">
                <h5>Nama : <?= $kios['nama']; ?></h5>
                <div class="row">
                    <div class="col-sm-2 mb-3">FOTO</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/pedagang/') . $kios['fotos']; ?>" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 mb-3">KTP</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/pedagang/') . $kios['ktp']; ?>" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 mb-3">NPWP</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/pedagang/') . $kios['npwp']; ?>" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 mb-3">KK</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/pedagang/') . $kios['kk']; ?>" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 mb-3">Status HPTD</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3 mt-2">
                                <a href="https://silat.bekasikota.go.id/silat_v2/info/cek_status?no_permohonan=<?= $kios['hptd'] ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-fw fa-eye"></i> Lihat</a>
                                <!-- <a href="https://silat.bekasikota.go.id/silat_v2/permohonan/detail_permohonan?no_permohonan=<?= $kios['hptd'] ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-fw fa-eye"></i> Lihat 2</a> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php else : ?>
            <div class="col-md-6">
                <h5><?= $kios['nama']; ?></h5>
            </div>
        <?php endif; ?>

        <?php if ($kios['status'] == 0) : ?>

            <?php if ($user['role_id'] != 1 && $user['role_id'] != 5 && $user['role_id'] != 7) : ?>

            <?php else : ?>

                <a href="" data-toggle="modal" data-target="#jualKios" class="btn btn-primary mt-2 jual"><i class="fas fa-fw fa-check"></i> Jual</a>

            <?php endif; ?>

        <?php else : ?>

        <?php endif; ?>

    </div>

    <!-- use link -->
    <a style="float: right;" href="<?= base_url('/pasar/kios/' . encrypt_url($kios['blok_id'])); ?>" class="btn btn-sm btn-warning"> Kembali</a>

</div>
<!-- /.container-fluid -->

<!-- Jual Kios Modal -->
<div class="modal fade" id="jualKios" tabindex="-1" role="dialog" aria-labelledby="jualKiosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jualKiosLabel">Pilih Pedagang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('pasar/jual/' . encrypt_url($kios['id']) . '/' . encrypt_url($kios['blok_id'])); ?>
            <div class="modal-body abc">

                <div class="form-group">
                    <select name="pedagang" id="pedagang" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php foreach ($pedagang as $ped) : ?>
                            <option value="<?= $ped['id'] ?>"><?= $ped['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="jual" name="jual" class="btn btn-primary" value="jual">Jual</button>
            </div>
            <?= form_close(); ?>

        </div>
    </div>
</div>

<!-- Bayar Kios Modal -->
<div class="modal fade" id="bayarKios" tabindex="-1" role="dialog" aria-labelledby="bayarKiosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarKiosLabel">Bayar Kios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('pasar/bayar/' . encrypt_url($kios['id']) . '/' . encrypt_url($kios['blok_id'])); ?>
            <div class="modal-body abc">

                <div class="form-group">
                    <input type="text" class="form-control" name="bayar" id="bayarss" placeholder=". . ." onkeypress="return isNumber(event)">
                </div>

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            <?= form_close(); ?>

        </div>
    </div>
</div>

<!-- Metode pelunasan Modal -->
<div class="modal fade" id="pembayaranKios" tabindex="-1" role="dialog" aria-labelledby="pembayaranKiosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pembayaranKiosLabel">Bayar Kios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('pasar/pelunasan/' . encrypt_url($kios['id']) . '/' . encrypt_url($kios['blok_id'])); ?>
            <div class="modal-body abc">

                <div class="form-group">
                    <select name="pembayaran" class="form-control" id="pembayaran">
                        <option value="">- Pilih -</option>
                        <?php foreach ($pembayaran as $pem) : ?>
                            <option value="<?= $pem['id'] ?>"><?= $pem['pembayaran'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="pilih" name="pilih" class="btn btn-primary" value="pilih">Pilih</button>
            </div>
            <?= form_close(); ?>

        </div>
    </div>
</div>

<!-- Diskon Kios Modal -->
<div class="modal fade" id="diskonKios" tabindex="-1" role="dialog" aria-labelledby="diskonKiosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="diskonKiosLabel">Diskon Kios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('pasar/diskonkios/' . encrypt_url($kios['id']) . '/' . encrypt_url($kios['blok_id'])); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <input type="text" class="form-control" name="diskon" id="diskon" placeholder=". . .">
                </div>

                <div class="form-group">
                    <label for="sisa">Sisa Pembayaran</label>
                    <input type="text" class="form-control" name="sisa" id="sisa" readonly value="Rp. <?= number_format($sisa) ?>">
                </div>

                <div class="form-group">
                    <label for="n_diskon">Nilai Diskon</label>
                    <input type="text" class="form-control" name="n_diskon" id="n_diskon" readonly>
                </div>

                <div class="form-group">
                    <label for="yhl">Yang Harus di Lunasi</label>
                    <input type="text" class="form-control" name="yhl" id="yhl" readonly>
                </div>

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="pilih" name="pilih" class="btn btn-primary" value="pilih">Diskon</button>
            </div>
            <?= form_close(); ?>

        </div>
    </div>
</div>