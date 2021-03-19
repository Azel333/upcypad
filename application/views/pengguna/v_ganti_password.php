<body>
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/about.css') ?>">
	<div class="container-fluid">
		<div class="timeline">
			<div id="page-contents">
				<div class="row">
					<div class="col-lg-3">
						<!--Edit Profile Menu-->
						<ul class="edit-menu menu">
							<li>
								<i class="fas fa-user"></i>
								<a href="<?php echo base_url('pengguna/informasi-dasar') ?>">Informasi Dasar</a>
							</li>
							<li class="active">
								<i class="fas fa-lock"></i>
								<a href="<?php echo base_url('pengguna/ubah-password') ?>">Ganti Password</a>
							</li>
							<li>
								<i class="fas fa-image"></i>
								<a href="<?php echo base_url('pengguna/ganti-foto') ?>">Ganti Foto</a>
							</li>
							<li>
								<i class="fas fa-map-marker-alt"></i>
								<a href="<?php echo base_url('pengguna/alamat') ?>">Alamat</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-7">

						<!-- Change Password -->
						<div class="edit-profile-container">
							<div class="block-title">
								<h4 class="grey">
									<i class="fa fa-lock"></i>Ganti Password
								</h4>
								<hr>
								<p>
									Pastikan Anda memasukkan password baru setidaknya minimal 6 karakter dan terdiri dari kombinasi karakter, angka dan simbol agar password lebih aman
								</p>
								<hr>
							</div>
							<?php echo $this->session->flashdata('password_sudah_pernah'); ?>
							<?php echo $this->session->flashdata('ganti_password_berhasil'); ?>
							<?php echo $this->session->flashdata('password_lama_salah'); ?>
							<div class="edit-block">
								<form method="post" action="<?php echo base_url('pengguna/ubah-password') ?>">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="password" class="bmd-label-floating">Password Lama</label>
												<input id="my-password" class="form-control" type="password" name="password_lama" title="Enter password" required="" />
												<?php echo form_error('password_lama'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="bmd-label-floating">Password Baru</label>
												<input class="form-control" minlength="6" type="password" name="password_baru1" title="Enter password">
												<?php echo form_error('password_baru1'); ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="bmd-label-floating">Konfirmasi password</label>
												<input class="form-control" minlength="6" type="password" name="password_baru2" title="Enter password">
												<?php echo form_error('password_baru2'); ?>
											</div>
										</div>
									</div>
									<button class="btn btn-primary">Ganti Password</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-2 static">
						<!--Sticky Timeline Activity Sidebar-->
						<div id="sticky-sidebar">
							<h4 class="grey text-center">Halaman</h4>
							<ul class="edit-menu halaman">
								<li>
									<a href="<?php echo base_url('pengguna/profile-saya') ?>"><i class="fas fa-user"></i> Tentang</a>
								</li>
								<li class="active">
									<a href="<?php echo base_url('pengguna/informasi-dasar') ?>"><i class="fas fa-user-edit"></i> Edit Data</a>
								</li>
							</ul>
						</div>
					</div>
			</div>
		</div>
	</div>
</body>