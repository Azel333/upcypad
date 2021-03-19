<link href="<?= base_url('assets/style_css/pengunjung/auth.css'); ?>" rel="stylesheet">
<body>
	<div class="container-fluid auth">
		<div class="row justify-content-center">
			<div class="col-md-4 mt-5">
				<div class="card border border-info">
					<form class="p-5" method="post" action="<?php echo base_url('auth/forgot_password') ?>">
						<h5 class="card-header info-color white-text text-center py-4">
							<strong>LUPA PASSWORD</strong>
						</h5>
						<p class="text-center">
							Masukkan alamat email kamu dan kami akan mengirimkan sebuah link untuk mengganti kata sandi kamu.
						</p>
						<?php echo $this->session->flashdata('cek_reset'); ?>
						<?php echo $this->session->flashdata('aktivasi'); ?>
						<div class="form-group">
							<label for="password" class="bmd-label-floating">Masukan Email</label>
							<input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>">
								<?php echo form_error('email','<small class="text-danger">','</small>'); ?>
						</div>
						<button class="btn btn-raised btn-block btn-info" type="submit" name="reset">
							Reset Password
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>