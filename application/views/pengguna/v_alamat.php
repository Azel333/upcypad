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
							<li>
								<i class="fas fa-lock"></i>
								<a href="<?php echo base_url('pengguna/ubah-password') ?>">Ganti Password</a>
							</li>
							<li>
								<i class="fas fa-image"></i>
								<a href="<?php echo base_url('pengguna/ganti-foto') ?>">Ganti Foto</a>
							</li>
							<li class="active">
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
									<i class="fas fa-map-marker-alt"></i> Alamat
								</h4>
								<hr>
							</div>
							<?php echo $this->session->flashdata('alamat'); ?>
							<div class="edit-block">
								<form method="post" action="<?php echo base_url('pengguna/alamat') ?>">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="my-provinsi" class="bmd-label-floating">Provinsi</label>
												<select name="provinsi" id="provinsi" class="form-control input-lg">
													
													<option selected disabled="">Select Provinsi</option>
													<?php
													foreach($provinsi as $row)
													{
														echo '<option value="'.$row->id.'">'.$row->name.'</option>';
													}
													?>
												</select>
												<?php echo form_error('provinsi'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="my-kota" class="bmd-label-floating">Kota</label>
												<select name="kota" id="kota" class="form-control input-lg">
													<option value="" selected disabled="">Select Kota</option>
												</select>
												<?php echo form_error('kota'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="my-kecamatan" class="bmd-label-floating">Kecamatan</label>
												<select name="distrik" id="distrik" class="form-control input-lg">
													<option value="" selected disabled="">Select Kecamatan</option>
												</select>
												<?php echo form_error('distrik'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group">
												<label for="my-kelurahan" class="bmd-label-floating">Kelurahan</label>
												<select name="kelurahan" id="kelurahan" class="form-control input-lg">
													<option value="" selected disabled="">Select Kelurahan</option>
												</select>
												<?php echo form_error('kelurahan'); ?>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="my-kode" class="bmd-label-floating">Kode pos</label>
												<input id="kode" class="form-control" type="text" name="kode" value="<?php echo $alamat_user['kode_pos'];?>">
												<?php echo form_error('kode'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group">
												<label for="my-jalan" class="bmd-label-floating">Nama Jalan</label>
												<input id="jalan" class="form-control" type="text" name="jalan"value="<?php echo $alamat_user['nama_jalan'];?>">
												<?php echo form_error('jalan','<small>','</small>'); ?>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="my-no-jalan" class="bmd-label-floating">Nomor Jalan</label>
												<input id="no_jalan" class="form-control" type="text" name="no_jalan" value="<?php echo $alamat_user['nomor_jalan'];?>">
												<?php echo form_error('no_jalan','<small>','</small>'); ?>
											</div>
										</div>
										<div class="col-lg-2" class="bmd-label-floating">
											<div class="form-group">
												<label for="my-rt" class="bmd-label-floating">RT</label>
												<input id="rt" class="form-control" type="text" name="rt" value="<?php echo $alamat_user['rt'];?>">
												<?php echo form_error('rt','<small>','</small>'); ?>
											</div>
										</div>
										<div class="col-lg-2" class="bmd-label-floating">
											<div class="form-group">
												<label for="my-jrw" class="bmd-label-floating">RW</label>
												<input id="rw" class="form-control" type="text" name="rw" value="<?php echo $alamat_user['rw'];?>">
												<?php echo form_error('rw','<small>','</small>'); ?>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Perbaharui Alamat</button>
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

<script src="<?php echo base_url('assets/jquery/jquery-3.4.0.js') ?>"></script>
<script>
	$(document).ready(function()
	{
		$('#provinsi').change(function()
		{
			var id = $('#provinsi').val();
			if(id != '')
			{
				$.ajax(
				{
					url:"<?php echo base_url('pengguna/regencies'); ?>",
					method:"POST",
					data:{province_id:id},
					success:function(data)
					{
						$('#kota').html(data);
						$('#distrik').html('<option value="" selected disabled="">Select Kecamatan</option>');
						$('#kelurahan').html('<option value="" selected disabled="">Select Kelurahan</option>');
					}
				});
			}
			else
			{
				$('#kota').html('<option value="" selected disabled="">Select Kota</option>');
				$('#distrik').html('<option value="" selected disabled="">Select Kecamatan</option>');
				$('#kelurahan').html('<option value="" selected disabled="">Select Kelurahan</option>');
			}
		});

		$('#kota').change(function()
		{
			var id = $('#kota').val();
			if(id != '')
			{
				$.ajax({
					url:"<?php echo base_url('pengguna/distrik'); ?>",
					method:"POST",
					data:{regency_id:id},
					success:function(data)
					{
						console.log(data);
						$('#distrik').html(data);
						$('#kelurahan').html('<option value="" selected disabled="">Select Kelurahan</option>');
					}
				});
			}
			else
			{
				$('#distrik').html('<option value="" selected disabled="">Select Kecamatan</option>');
				$('#kelurahan').html('<option value="" selected disabled="">Select Kelurahan</option>');
			}
		});

		$('#distrik').change(function()
		{
			var id = $('#distrik').val();
			if(id != '')
			{
				$.ajax({
					url:"<?php echo base_url('pengguna/villages'); ?>",
					method:"POST",
					data:{district_id:id},
					success:function(data)
					{
						$('#kelurahan').html(data);
					}
				});
			}
			else
			{
				$('#kelurahan').html('<option value="" selected disabled="">Select Kelurahan</option>');
			}
		});
	});
</script>