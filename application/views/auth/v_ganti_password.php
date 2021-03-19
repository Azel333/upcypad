<link href="<?= base_url('assets/style_css/pengunjung/auth.css'); ?>" rel="stylesheet">
<body>
	<div class="container-fluid auth">
		<div class="row justify-content-center">
			<div class="col-md-4 mt-5">
				<div class="card border border-info">
					<form class="p-5" method="post" action="<?php echo base_url('auth/change_password') ?>">
						<h5 class="card-header info-color white-text text-center py-4">
							<strong>Reset Password</strong>
						</h5>
						<p class="text-center">
							<?php $this->session->userdata('reset_email'); ?>
						</p>
						<?php echo $this->session->flashdata('aktivasi'); ?>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<input id="password_baru1" name="password_baru1" type="password" class="form-control" placeholder="Masukan Password Baru">
								<?php echo form_error('password_baru1','<div class="alert alert-warning alert-dismissible fade show" role="alert">','</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<input id="password_baru2" name="password_baru2" type="password" class="form-control" placeholder="Ulangi Password Baru">
								<?php echo form_error('password_baru2','<div class="alert alert-warning alert-dismissible fade show" role="alert">','</div>'); ?>
							</div>
						</div>
						
						<button class="btn btn-raised btn-block btn-info" type="submit" name="daftar">
							Ganti Password
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>