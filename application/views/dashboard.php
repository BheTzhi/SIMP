<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	</div>

	<!-- Pegawai  -->
	<?php if ($role != 4 && $role != 7 && $role != 10) : ?>
		<div class="row">
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">

								<?php if ($role != 4) : ?>

									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Data Pegawai</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($pegawai) ?> Orang</div>

								<?php else : ?>

									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Data Pedagang</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($pedagang) ?> Orang</div>

								<?php endif; ?>

							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
								</div>
								<div class="row no-gutters align-items-center">
									<div class="col-auto">
										<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
									</div>
									<div class="col">
										<div class="progress progress-sm mr-2">
											<div class="progress-bar bg-info" role="progressbar" style="width: 15%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Pending Requests</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-comments fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($role != 4 && $role != 8 && $role != 9 && $role != 10) : ?>
		<!-- Kios Total Laku & Belum Laku -->
		<div class="row">
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
									Total Kios</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($kios) ?> Kios</div>
							</div>
							<div class="col-auto">
								100%
								<i class="fas fa-building fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Kios Laku -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Kios Laku</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($laku) ?> Kios</div>
							</div>
							<div class="col-auto">
								<?= round((count($laku) / count($kios)) * 100); ?> %
								<i class="fas fa-home fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Belum Laku -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Kios Belom Laku</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($belumlaku) ?> Kios</div>
							</div>
							<div class="col-auto">
								<?= round((count($belumlaku) / count($kios)) * 100); ?> %
								<i class="fas fa-home fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Nilai Aset -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Nilai Aset</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($total['harga']) ?>,-</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- REKAP KIOS PENJUALAN -->
		<div class="row mt-2">
			<?php foreach ($blok as $b) : ?>
				<div class="card mr-3 ml-3 mt-3 mb-3" style="width: 21rem;">

					<div class="card-body">
						<?php
						if ($b['type'] != 'Kios') :
							$type = $b['type'];
						else :
							$type = $b['type'];
						endif;
						?>
						<h5 class="card-title"><?= $b['type'] . ' Blok : ' .  $b['blok'] ?></h5>
						<p class="card-text">
							<?php

							// total
							$this->db->where('blok_id', $b['id']);
							$ttl = $this->db->get('kios')->result_array();

							$this->db->select_sum('harga', 'ttl');
							$this->db->where('blok_id', $b['id']);
							$nttl = $this->db->get('kios')->row_array();

							// laku
							$this->db->where('blok_id', $b['id']);
							$this->db->where('status', 1);
							$lk = $this->db->get('kios')->result_array();

							$this->db->select_sum('harga', 'ttl');
							$this->db->where('blok_id', $b['id']);
							$this->db->where('status', 1);
							$ntl = $this->db->get('kios')->row_array();

							// Di bayar
							$this->db->select_sum('bayar', 'ttl');
							$this->db->where('blok_id', $b['id']);
							$this->db->where('status', 1);
							$byr = $this->db->get('kios')->row_array();

							// Diskon
							$this->db->select_sum('n_diskon', 'ttl');
							$this->db->where('blok_id', $b['id']);
							$this->db->where('status', 1);
							$diskon = $this->db->get('kios')->row_array();

							// belum laku
							$this->db->where('blok_id', $b['id']);
							$this->db->where('status', 0);
							$blk = $this->db->get('kios')->result_array();

							$this->db->select_sum('harga', 'ttl');
							$this->db->where('blok_id', $b['id']);
							$this->db->where('status', 0);
							$ntb = $this->db->get('kios')->row_array();
							?>

							Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= count($ttl) . ' ' . $b['type'] ?> <br>
							Laku &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= count($lk) . ' ' . $b['type'] ?> <br>
							Belum Laku &nbsp; : <?= count($blk) . ' ' . $b['type'] ?> <br>
							<hr>
							<?php if ($role != 1 && $role != 5) : ?>
							<?php else : ?>
						<h5 class="card-title">Nilai Property Blok : <?= $b['blok'] ?></h5>
						Nilai Laku &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp. <?= number_format($ntl['ttl']) ?>,-<br>
						Di Bayar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; : Rp. <?= number_format($byr['ttl']) ?>,-<br>
						Diskon &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; : Rp. <?= number_format($diskon['ttl']) ?>,-<br>
						Nilai Belum Laku : Rp. <?= number_format($ntb['ttl']) ?>,-<br>
						<hr>
						Nilai Semua &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp. <?= number_format($nttl['ttl']) ?>,-<br>
						<hr>
						</p>

					<?php endif; ?>
					<?php if ($role != 5) : ?>
						<a href="<?= base_url('pasar/kios/' . encrypt_url($b['id'])) ?>" class="btn btn-primary">Lihat Blok <?= $b['blok'] ?></a>
					<?php else : ?>
					<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

</div>
<!-- /.container-fluid -->