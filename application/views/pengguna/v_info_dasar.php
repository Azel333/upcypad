<body>
	<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.css') ?>">
	<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery.mask.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/about.css') ?>">
	<div class="container-fluid">
		<div class="timeline">
			<div id="page-contents">
				<div class="row">
					<div class="col-lg-3">
						<!--Edit Profile Menu-->
						<ul class="edit-menu menu">
							<li class="active">
								<i class="fas fa-user"></i>
								<a href="<?php echo base_url('pengguna/informasi-dasar') ?>">Informasi Dasar</a>
							</li>
							<li>
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
									<i class="fa fa-user"></i>Informasi Dasar
								</h4>
								<hr>
							</div>
							<?php echo $this->session->flashdata('info_dasar'); ?>
							<div class="edit-block">
								<form method="post" action="<?php echo base_url('pengguna/informasi-dasar') ?>">
									<div class="form-group">
										<label for="email" class="bmd-label-floating">Email</label>
										<input id="email" class="form-control input-group-lg" type="text" name="email" value="<?php echo $user['email'] ?>" readonly>
											<?php echo form_error('email','<small>','</small>'); ?>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="first_name" class="bmd-label-floating">Nama Depan</label>
												<input type="text" class="form-control text-capitalize" id="first_name" name="nama_depan" value="<?php echo $data_user['nama_depan'] ?>" required>
												<?php echo form_error('nama_depan','<small>','</small>'); ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="lastname" class="bmd-label-floating">Nama Belakang</label>
												<input type="text" class="form-control text-capitalize" id="last_name" name="nama_belakang" value="<?php echo $data_user['nama_belakang'] ?>" required>
												<?php echo form_error('nama_belakang','<small>','</small>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label for="my-password" class="bmd-label-floating">Nomor Handphone</label>
												<input id="nomor_hp" class="form-control" type="text" name="nomor_hp" value="<?php echo $data_user['nomor_hp'] ?>">
												<?php echo form_error('nomor_hp','<small>','</small>'); ?>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="tempat_lahir" class="bmd-label-floating">Tempat Lahir</label>
												<input id="tempat_lahir" list="tempat_lahir_list" class="form-control input-group-lg" type="text" name="tempat_lahir" value="<?php echo $data_user['tempat_lahir'] ?>">
												<datalist id="tempat_lahir_list">
													<option>Jakarta</option>
													<option>Bandung</option>
												</datalist>
												<?php echo form_error('tempat_lahir','<small>','</small>'); ?>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label  class="bmd-label-floating">Tanggal Lahir</label>
												<input type="text" name="tgl_lahir" class="form-control tgl_lahir" value="<?php if ($data_user['tgl_lahir'] != ''){ echo date('d-m-Y', strtotime($data_user['tgl_lahir'])); }?>" />
											</div>
										</div>
									</div>
									<div class="form-group kelamin">
										<label class="text-muted">Saya :</label>
										<div class="custom-control custom-radio custom-control-inline">
											<input class="custom-control-input" id="inlineRadio1" type="radio" name="kelamin" value="laki-laki" <?php if (($data_user['kelamin']) == 'laki-laki') {echo "checked";} ?>>
											<label class="custom-control-label mt-1" for="inlineRadio1">Laki-laki</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input class="custom-control-input" id="inlineRadio2" type="radio" name="kelamin" value="perempuan" <?php if (($data_user['kelamin']) == 'perempuan') {echo "checked";} ?>>
											<label class="custom-control-label mt-1" for="inlineRadio2">Perempuan</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label class="bmd-label-floating" for="my-info">Tentang Saya</label>
												<textarea id="my-info" name="deskripsi" class="form-control" rows="4"><?php echo $data_user['deskripsi'] ?></textarea>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

	<script type="text/javascript">
		$('.form-control.tgl_lahir').datepicker(
		{
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd-mm-yy',
			yearRange: '-60y:c+nn',
			maxDate: '-3y'
		});

		$( '#nomor_hp' ).mask('0000−0000−00000');
</script>
</body>