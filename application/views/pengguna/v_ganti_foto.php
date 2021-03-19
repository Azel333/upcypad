<body>
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/about.css') ?>">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/jasny/docs/dist/css/jasny-bootstrap.min.css') ?>">

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url('assets/jasny/docs/dist/js/jasny-bootstrap.min.js') ?>"></script>
	
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
							<li>
								<i class="fas fa-lock"></i>
								<a href="<?php echo base_url('pengguna/ubah-password') ?>">Ganti Password</a>
							</li>
							<li class="active">
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
						
						<div class="edit-profile-container">
							<div class="block-title">
								<h4 class="grey">
									<i class="fas fa-image"></i> Ganti Foto
								</h4>
								<hr>
							</div>
							<div class="edit-block">

								<?php echo form_open_multipart('pengguna/upload-foto');?>
									<div class="form-group row">
										<div class="col-sm-12">
											<div class="row profil fileinput-new"  data-provides="fileinput">
												<div class="col-sm-3 fileinput-new">
													<label>Foto Profil</label>
													<img src="<?php echo base_url('assets/img/profile/').$user['image'] ?>" class="img-thumbnail rounded-circle">
												</div>
												<div class="col-sm-3 fileinput-exists">
													<label>Foto Profil</label>
													<div class="fileinput-preview"></div>
												</div>
												<div class="col-sm-9">
													<div class="custom-file">
														<label class="fileinput-new custom-file-label margin" for="image">Pilih Foto Profil</label>
														<label class="fileinput-exists custom-file-label margin" for="image">Ganti Pilihan</label>
														<input type="file" class="custom-file-input" id="image" name="image">
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="form-group row">
										<div class="mt-5">
											<label class="col-sm-12">Foto Sampul</label>
											<div class="fileinput fileinput-new col-sm-12" data-provides="fileinput">
												<div class="fileinput-new">
													<img src="<?php echo base_url('assets/img/background/').$data_user['back_image'] ?>" class="img-thumbnail">
												</div>
												<div class="fileinput-preview fileinput-exists img-thumbnail image_back"></div>
												<div>
													<span class="custom-file">
														<label class="fileinput-new custom-file-label" for="image">Pilih Foto Sampul</label>
														<label class="fileinput-exists custom-file-label" for="image">Ganti Foto Sampul</label>
														<input type="file" class="custom-file-input" id="back_image" name="back_image">
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group row justify-content-end">
										<div class="col-sm-12">
											<button class="btn btn-raised btn-info btn-block" type="submit" name="edit">
												Perbaharui Foto
											</button>
										</div>
									</div>
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
	</div>
</body>