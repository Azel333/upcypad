<link href="<?= base_url('assets/style_css/pengunjung/auth.css'); ?>" rel="stylesheet">
<div class="container-fluid auth">
	<div class="row justify-content-center">
		<div class="col-md-4 p-5">
			<div class="card border border-info">
				<form class="p-5" method="post" action="<?php echo base_url('auth') ?>">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none;">
					<h5 class="card-header info-color white-text text-center">
						<strong>MASUK</strong>
					</h5>
					<?php echo $this->session->flashdata('email_belum_teraktivasi'); ?>
					<div class="form-group">
						<label for="email" class="bmd-label-floating">Email Atau Username</label>
						<input id="email" name="email" type="text" class="form-control"  value="<?php echo set_value('email'); ?>" required>

						<?php if ($this->session->flashdata('email_salah')): ?>
							<div class="alert alert-warning" role="alert">
							  <?php echo $this->session->flashdata('email_salah'); ?>
							</div>
						<?php endif; ?>

						<?php echo form_error('email','<small class="text-danger">','</small>'); ?>
					</div>
					<div class="form-group">
						<label for="password" class="bmd-label-floating">Masukan Password</label>
						<input id="password" name="password" type="password" class="form-control" required>

						<?php if ($this->session->flashdata('password_salah')): ?>
							<div class="alert alert-warning" role="alert">
							  <?php echo $this->session->flashdata('password_salah'); ?>
							</div>
						<?php endif; ?>
						
						<?php echo form_error('password','<small class="text-danger">','</small>'); ?>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="checkbox">
								<label class="custom-label checkbox-inline">
									<input type="checkbox" name="rememberme"> <small><p class="text-dark">Ingat Saya</p></small>
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="text-right">
								<small><a href="<?php echo base_url('auth/forgot_password') ?>">Lupa Password?</a></small>
							</div>
						</div>
					</div>
					<button class="btn btn-raised btn-block btn-info" type="submit" name="masuk">
						Masuk
					</button>
				</form>
			</div>
		</div>
	</div>
</div>