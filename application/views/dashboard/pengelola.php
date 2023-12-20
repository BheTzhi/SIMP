<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h class="h3 mb-0 text-gray-800"><?= $title; ?></h>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form action="" method="get">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="bulan">Pilih Bulan</label>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="tahun">Pilih Tahun</label>
                    </div>
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
                                <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
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
    <?php elseif ($this->input->get('bulan') && $this->input->get('tahun')) : ?>

        <!-- Listrik -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                <h6 class="m-0 font-weight-bold text-dark">Tagihan Listrik Bulan <?= $bulan ?></h6>
            </div>
            <div class="row" style="padding: 10px;">

                <!-- Lantai Dasar -->
                <div class="col-lg-6">
                    <div class="card shadow mb-4 mt-2">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Lantai Dasar</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Lunas
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-danger"></i> Belum Lunas
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Lantai Satu -->
                <div class="col-lg-6">
                    <div class="card shadow mb-4 mt-2">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Lantai Satu</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart1"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Lunas
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-danger"></i> Belum Lunas
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Air -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                <h6 class="m-0 font-weight-bold text-dark">Tagihan Air Bulan <?= $bulan ?></h6>
            </div>
            <div class="row" style="padding: 10px;">

                <!-- Lantai Dasar -->
                <div class="col-lg-6">
                    <div class="card shadow mb-4 mt-2">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Lantai Dasar</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart2"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Lunas
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-danger"></i> Belum Lunas
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Lantai Satu -->
                <div class="col-lg-6">
                    <div class="card shadow mb-4 mt-2">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Lantai Satu</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart3"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Lunas
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-danger"></i> Belum Lunas
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Retribusi -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                <h6 class="m-0 font-weight-bold text-dark">Tagihan Retribusi <?= date('d F Y') ?></h6>
            </div>
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-3 d-flex flex-row align-items-center justify-content-end">
                <a href="<?= base_url('retribusi/cetaktagihan') ?>" class="btn btn-secondary"><i class="fas fa-fw fa-eye"></i> Lihat Detail</a>
            </div>
        </div>

    <?php else : ?>
    <?php endif ?>
</div>
<!-- /.container-fluid -->