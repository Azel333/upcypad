<body>
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/about.css') ?>">
	<div class="container-fluid">
		<div class="timeline col-lg-12">
			<div id="page-contents">
				<div class="row justify-content-end">
					<div class="col-lg-7">
						<div class="edit-profile-container">
							<div class="block-title">
								<h4 class="grey">
									<i class="fas fa-info-circle"></i> Informasi Pribadi
								</h4>
								<hr>
								<div class="row">
									<div class="col-lg-4">
										<p>Nama</p>
										<p>Username</p>
										<p>Email</p>
										<p>Kelamin</p>
										<p>No. Handphone</p>
										<p>Tempat,Tanggal Lahir</p>
										<p>Usia</p>
									</div>
									<div class="col-lg-8">
										<p class="text-capitalize">
											:
											<?php echo $data_user['nama_depan'];?>
											<?php echo $data_user['nama_belakang'];?>
										</p>
										<p>
											:
											<?php echo $user['username'];?>
										</p>
										<p>
											:
											<?php echo $user['email'];?>
										</p>
										<p>
											:
											<?php echo $data_user['kelamin'];?>
										</p>
										<p>
											:
											<?php echo $data_user['nomor_hp'];?>
										</p>
										<p>
											:
											<?php echo $data_user['tempat_lahir'];
											if ($data_user['tempat_lahir'] && $data_user['tgl_lahir'])
											{
												echo ", ";
											}
											if ($data_user['tgl_lahir'] != '')
											{
												echo date('d M Y', strtotime($data_user['tgl_lahir']));
											}?>
										</p>
										<p>
											:
											<?php
												if ($data_user['tgl_lahir'] != '')
												{
													$awal  = date_create($data_user['tgl_lahir']);
													$akhir = date_create(); // waktu sekarang
													$diff  = date_diff( $awal, $akhir );
													echo $diff->y . ' tahun';
												}
											?>
										</p>
									</div>
								</div>
								<hr>
							</div>
						</div>
						<div class="edit-profile-container">
							<div class="block-title">
								<h4 class="grey">
									<i class="far fa-map"></i> Alamat
								</h4>
								<hr>
								<div class="row">
									<div class="col-lg-4">
										<p>Alamat</p>
										<p>Kelurahan</p>
										<p>Kecamatan</p>
										<p>Kota</p>
										<p>Provinsi</p>
									</div>
									<div class="col-lg-8">
										<p>
											<div class="text-uppercase">
												:
												<?php echo $alamat_user['nama_jalan'];?>
												<?php echo $alamat_user['nomor_jalan'];?>
												<?php if ($alamat_user['rt'])
												{
													echo "RT"; echo $alamat_user['rt']; echo "/";
												} ?>
												<?php if ($alamat_user['rw'])
												{
													echo "RW"; echo $alamat_user['rw'];
												} ?>
											</div>
										<p>
											:
											<?php if ($alamat_user['kelurahan'])
											{
												echo $kelurahan[0]['name'];
											}?>
										</p>
										<p>
											:
											<?php if ($alamat_user['kelurahan'])
											{
												echo $kecamatan[0]['name'];
											}?>
										</p>
										<p>
											:
											<?php if ($alamat_user['kelurahan'])
											{
												echo $kota[0]['name'];
											}?>
										</p>
										<p>
											:
											<?php if ($alamat_user['kelurahan'])
											{
												echo $provinsi[0]['name'];
											}?>
										</p>
									</div>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<div class="col-md-2 static">
						<!--Sticky Timeline Activity Sidebar-->
						<div id="sticky-sidebar">
							<h4 class="grey text-center">Halaman</h4>
							<ul class="edit-menu halaman">
								<li class="active">
									<a href="<?php echo base_url('pengguna/profile-saya') ?>"><i class="fas fa-user"></i> Tentang</a>
								</li>
								<li>
									<a href="<?php echo base_url('pengguna/informasi-dasar') ?>"><i class="fas fa-user-edit"></i> Edit Data</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>