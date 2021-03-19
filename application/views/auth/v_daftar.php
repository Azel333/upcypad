<link href="<?= base_url('assets/style_css/pengunjung/auth.css'); ?>" rel="stylesheet">
<body>
	<div class="container-fluid auth">
		<div class="row justify-content-center">
			<div class="col-md-4 mt-5">
				<div class="card border border-info">
					<form class="p-5" method="post" action="<?php echo base_url('auth/daftar') ?>">
						<h5 class="card-header info-color white-text text-center py-4">
							<strong>DAFTAR</strong>
						</h5>
						<div class="form-group">
							<label for="username" class="bmd-label-floating">Username</label>
							<input id="username" name="username" type="text" class="form-control" value="<?php echo set_value('username'); ?>" required>
							<?php echo form_error('username','<small class="text-danger">','</small>'); ?>
						</div>
						<div class="form-group">
							<label for="email" class="bmd-label-floating">Email</label>
							<input id="email" name="email" type="email" class="form-control" value="<?php echo set_value('email'); ?>" required>
							<?php echo form_error('email','<small class="text-danger">','</small>'); ?>
						</div>
						<div class="form-group">
							<label for="password" class="bmd-label-floating">Masukan Password</label>
							<input id="password1" name="password1"  type="password" class="form-control" required>
							<?php echo form_error('password1','<small class="text-danger">','</small>'); ?>
							<span class="bmd-help">Masukan password minimal 6 karakter.</span>
						</div>
						<div class="form-group">
							<label for="password" class="bmd-label-floating">Ulangi Password</label>
							<input id="password2" name="password2" type="password" class="form-control" required>
						</div>
						<div class="was-validated">
							<div class="custom-control custom-checkbox mb-3">
								<input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
								<label class="custom-control-label" for="customControlValidation1">Saya Menyetutujui <a href="">Syarat dan Ketentuan</a> </label>
								<div class="invalid-feedback">Dengan mengklik tombol anda menyetujui kebijakan kami</div>
							</div>
						</div>
						<button class="btn btn-raised btn-block btn-info" type="submit" name="daftar">
							Daftar
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>